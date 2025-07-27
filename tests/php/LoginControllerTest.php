<?php

declare(strict_types=1);

namespace Tests\App\controller;

use PHPUnit\Framework\TestCase;
use App\controller\LoginController;
use Src\Recaptcha;
use Src\Exceptions\NotFoundException;
use Src\Limiter;
use Src\CorsHandler;
use Src\LoginUtility;
use Src\Utility;
use Src\CheckToken;
use Src\Sanitise\CheckSanitise;
use App\controller\BaseController;

class LoginControllerTest extends TestCase
{
    private $loginController;
    private $mockRecaptcha;
    private $mockLimiter;
    private $mockCorsHandler;
    private $mockLoginUtility;
    private $mockUtility;
    private $mockCheckToken;
    private $mockCheckSanitise;
    private $mockBaseController;

    protected function setUp(): void
    {
        // Initialize mocks
        // $this->mockRecaptcha = $this->createMock(Recaptcha::class);
        $this->mockLimiter = $this->createMock(Limiter::class);
        $this->mockCorsHandler = $this->createMock(CorsHandler::class);
        $this->mockLoginUtility = $this->createMock(LoginUtility::class);
        $this->mockUtility = $this->createMock(Utility::class);
        $this->mockCheckToken = $this->createMock(CheckToken::class);
        $this->mockCheckSanitise = $this->createMock(CheckSanitise::class);
        $this->mockBaseController = $this->createMock(BaseController::class);

        // Assign mocks to static properties
        Limiter::$argLimiter = $this->mockLimiter;
        Limiter::$ipLimiter = $this->mockLimiter;

        // Instantiate LoginController without dependency injection
        $this->loginController = $this->getMockBuilder(LoginController::class)
            ->onlyMethods([])
            ->getMock();
    }

    public function testShowRendersLoginView(): void
    {
        // Mock BaseController::viewWithCsp as a static method
        $this->mockBaseController
            ->expects($this->once())
            ->method('viewWithCsp')
            ->with('login');

        // Call show method
        $this->loginController->show();
    }

    public function testShowHandlesException(): void
    {
        $exception = new \Exception('View error');

        // Mock BaseController::viewWithCsp to throw exception
        $this->mockBaseController
            ->expects($this->once())
            ->method('viewWithCsp')
            ->with('login')
            ->willThrowException($exception);

        // Mock Utility::showError
        $this->mockUtility
            ->expects($this->once())
            ->method('showError')
            ->with($exception);

        // Call show method
        $this->loginController->show();
    }

    public function testLoginThrowsExceptionOnEmptyPostData(): void
    {
        // Simulate empty $_POST
        $_POST = [];

        // Mock CorsHandler::setHeaders
        $this->mockCorsHandler
            ->expects($this->once())
            ->method('setHeaders');

        // Mock Recaptcha::verifyCaptcha
        $this->mockRecaptcha
            ->expects($this->once())
            ->method('verifyCaptcha')
            ->with('login');

        // Expect NotFoundException
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('There was no post data');

        // Call login method
        $this->loginController->login();
    }

    public function testLoginSuccessful(): void
    {
        // Mock $_POST data
        $_POST = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'rememberMe' => 'on'
        ];

        // Mock session
        $_SESSION = [];

        // Mock dependencies
        $this->mockCorsHandler
            ->expects($this->once())
            ->method('setHeaders');

        $this->mockRecaptcha
            ->expects($this->once())
            ->method('verifyCaptcha')
            ->with('login');

        $this->mockUtility
            ->expects($this->once())
            ->method('cleanSession')
            ->with('test@example.com')
            ->willReturn('test@example.com');

        $this->mockLimiter
            ->expects($this->once())
            ->method('limit')
            ->with('test@example.com');

        $sanitisedData = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $this->mockCheckSanitise
            ->expects($this->once())
            ->method('getSanitisedInputData')
            ->with(
                $_POST,
                [
                    'data' => ['email', 'password'],
                    'min' => [5, 5],
                    'max' => [30, 100]
                ]
            )
            ->willReturn($sanitisedData);

        $userData = ['id' => 123, 'password' => 'hashed_password'];

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('useEmailToFindData')
            ->with($sanitisedData)
            ->willReturn($userData);

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('checkPassword')
            ->with($sanitisedData, $userData)
            ->willReturn(true);

        $this->mockLimiter
            ->expects($this->exactly(2))
            ->method('reset');

        $this->mockCheckToken
            ->expects($this->once())
            ->method('tokenCheck');

        // Call login method
        $this->loginController->login();

        // Assert session variables
        $this->assertEquals(123, $_SESSION['ID']);
        $this->assertArrayNotHasKey('REMEMBER_ME', $_SESSION);
    }

    public function testLoginFailsWithInvalidPassword(): void
    {
        // Mock $_POST data
        $_POST = [
            'email' => 'test@example.com',
            'password' => 'wrong_password'
        ];

        // Mock dependencies
        $this->mockCorsHandler
            ->expects($this->once())
            ->method('setHeaders');

        $this->mockRecaptcha
            ->expects($this->once())
            ->method('verifyCaptcha')
            ->with('login');

        $this->mockUtility
            ->expects($this->once())
            ->method('cleanSession')
            ->with('test@example.com')
            ->willReturn('test@example.com');

        $this->mockLimiter
            ->expects($this->once())
            ->method('limit')
            ->with('test@example.com');

        $sanitisedData = [
            'email' => 'test@example.com',
            'password' => 'wrong_password'
        ];

        $this->mockCheckSanitise
            ->expects($this->once())
            ->method('getSanitisedInputData')
            ->with(
                $_POST,
                [
                    'data' => ['email', 'password'],
                    'min' => [5, 5],
                    'max' => [30, 100]
                ]
            )
            ->willReturn($sanitisedData);

        $userData = ['id' => 123, 'password' => 'hashed_password'];

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('useEmailToFindData')
            ->with($sanitisedData)
            ->willReturn($userData);

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('checkPassword')
            ->with($sanitisedData, $userData)
            ->willReturn(false);

        // Expect NotFoundException
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Invalid password');

        // Call login method
        $this->loginController->login();
    }

    public function testLoginSetsRememberMeSessionWhenNotChecked(): void
    {
        // Mock $_POST data without rememberMe
        $_POST = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        // Mock session
        $_SESSION = [];

        // Mock dependencies
        $this->mockCorsHandler
            ->expects($this->once())
            ->method('setHeaders');

        $this->mockRecaptcha
            ->expects($this->once())
            ->method('verifyCaptcha')
            ->with('login');

        $this->mockUtility
            ->expects($this->once())
            ->method('cleanSession')
            ->with('test@example.com')
            ->willReturn('test@example.com');

        $this->mockLimiter
            ->expects($this->once())
            ->method('limit')
            ->with('test@example.com');

        $sanitisedData = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $this->mockCheckSanitise
            ->expects($this->once())
            ->method('getSanitisedInputData')
            ->with(
                $_POST,
                [
                    'data' => ['email', 'password'],
                    'min' => [5, 5],
                    'max' => [30, 100]
                ]
            )
            ->willReturn($sanitisedData);

        $userData = ['id' => 123, 'password' => 'hashed_password'];

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('useEmailToFindData')
            ->with($sanitisedData)
            ->willReturn($userData);

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('checkPassword')
            ->with($sanitisedData, $userData)
            ->willReturn(true);

        $this->mockLimiter
            ->expects($this->exactly(2))
            ->method('reset');

        $this->mockCheckToken
            ->expects($this->once())
            ->method('tokenCheck');

        // Call login method
        $this->loginController->login();

        // Assert session variables
        $this->assertEquals(123, $_SESSION['ID']);
        $this->assertEquals('true', $_SESSION['REMEMBER_ME']);
    }

    public function testLoginThrowsExceptionWhenUserNotFound(): void
    {
        // Mock $_POST data
        $_POST = [
            'email' => 'nonexistent@example.com',
            'password' => 'password123'
        ];

        // Mock dependencies
        $this->mockCorsHandler
            ->expects($this->once())
            ->method('setHeaders');

        $this->mockRecaptcha
            ->expects($this->once())
            ->method('verifyCaptcha')
            ->with('login');

        $this->mockUtility
            ->expects($this->once())
            ->method('cleanSession')
            ->with('nonexistent@example.com')
            ->willReturn('nonexistent@example.com');

        $this->mockLimiter
            ->expects($this->once())
            ->method('limit')
            ->with('nonexistent@example.com');

        $sanitisedData = [
            'email' => 'nonexistent@example.com',
            'password' => 'password123'
        ];

        $this->mockCheckSanitise
            ->expects($this->once())
            ->method('getSanitisedInputData')
            ->with(
                $_POST,
                [
                    'data' => ['email', 'password'],
                    'min' => [5, 5],
                    'max' => [30, 100]
                ]
            )
            ->willReturn($sanitisedData);

        $this->mockLoginUtility
            ->expects($this->once())
            ->method('useEmailToFindData')
            ->with($sanitisedData)
            ->willReturn([]);

        // Expect NotFoundException
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('User not found');

        // Call login method
        $this->loginController->login();
    }

    protected function tearDown(): void
    {
        // Clean up globals
        $_POST = [];
        $_SESSION = [];
        Limiter::$argLimiter = null;
        Limiter::$ipLimiter = null;
    }
}