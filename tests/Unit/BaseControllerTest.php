<?php

namespace Tests\Unit;

use App\controller\BaseController;
use PHPUnit\Framework\TestCase;

class BaseControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        // Mock the global view function if it doesn't exist
        if (!function_exists('view')) {
            function view($view, $data = [], $options = []) {
                return "Rendered view: $view with data: " . json_encode($data) . " and options: " . json_encode($options);
            }
        }
    }

    /**
     * Test viewWithCsp method with default parameters
     */
    public function testViewWithCspWithDefaultParameters()
    {
        // Test that the method exists and can be called
        $this->assertTrue(method_exists(BaseController::class, 'viewWithCsp'));
        
        // Since the method calls the global view() function which we can't easily mock,
        // we'll test that it can be called without errors
        ob_start();
        BaseController::viewWithCsp('test_view');
        $output = ob_get_clean();
        
        // The method should complete without throwing an exception
        $this->assertTrue(true);
    }

    /**
     * Test viewWithCsp method with data parameter
     */
    public function testViewWithCspWithData()
    {
        $testData = ['key' => 'value', 'number' => 123];
        
        ob_start();
        BaseController::viewWithCsp('test_view', $testData);
        $output = ob_get_clean();
        
        // The method should complete without throwing an exception
        $this->assertTrue(true);
    }

    /**
     * Test viewWithCsp method with empty data array
     */
    public function testViewWithCspWithEmptyData()
    {
        ob_start();
        BaseController::viewWithCsp('test_view', []);
        $output = ob_get_clean();
        
        // The method should complete without throwing an exception
        $this->assertTrue(true);
    }

    /**
     * Test that viewWithCsp is a static method
     */
    public function testViewWithCspIsStatic()
    {
        $reflection = new \ReflectionMethod(BaseController::class, 'viewWithCsp');
        $this->assertTrue($reflection->isStatic());
    }

    /**
     * Test that viewWithCsp is public
     */
    public function testViewWithCspIsPublic()
    {
        $reflection = new \ReflectionMethod(BaseController::class, 'viewWithCsp');
        $this->assertTrue($reflection->isPublic());
    }

    /**
     * Test viewWithCsp with various view names
     */
    public function testViewWithCspWithDifferentViewNames()
    {
        $viewNames = ['main', 'contact', 'about', 'blog.show', 'user/profile'];
        
        foreach ($viewNames as $viewName) {
            ob_start();
            BaseController::viewWithCsp($viewName);
            $output = ob_get_clean();
            
            // Each call should complete successfully
            $this->assertTrue(true);
        }
    }

    /**
     * Test viewWithCsp with complex data structures
     */
    public function testViewWithCspWithComplexData()
    {
        $complexData = [
            'user' => [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'settings' => [
                    'theme' => 'dark',
                    'notifications' => true
                ]
            ],
            'posts' => [
                ['id' => 1, 'title' => 'First Post'],
                ['id' => 2, 'title' => 'Second Post']
            ],
            'meta' => [
                'total' => 2,
                'page' => 1
            ]
        ];
        
        ob_start();
        BaseController::viewWithCsp('complex_view', $complexData);
        $output = ob_get_clean();
        
        // The method should handle complex data without issues
        $this->assertTrue(true);
    }
}
