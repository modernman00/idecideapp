<?php

namespace Tests\Unit;

use App\classes\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Clear any existing session data
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Clean up session data after each test
        $_SESSION = [];
    }

    public function testAddSessionWithValidData()
    {
        $result = Session::add('test_key', 'test_value');
        
        $this->assertEquals('test_value', $result);
        $this->assertEquals('test_value', $_SESSION['test_key']);
    }

    public function testAddSessionThrowsExceptionWithEmptyName()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Name and value required');
        
        Session::add('', 'test_value');
    }

    public function testAddSessionThrowsExceptionWithEmptyValue()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Name and value required');
        
        Session::add('test_key', '');
    }

    public function testGetSessionReturnsValue()
    {
        $_SESSION['test_key'] = 'test_value';
        
        $result = Session::get('test_key');
        
        $this->assertEquals('test_value', $result);
    }

    public function testHasSessionReturnsTrueWhenExists()
    {
        $_SESSION['test_key'] = 'test_value';
        
        $result = Session::has('test_key');
        
        $this->assertTrue($result);
    }

    public function testHasSessionReturnsFalseWhenNotExists()
    {
        $result = Session::has('non_existent_key');
        
        $this->assertFalse($result);
    }

    public function testHasSessionThrowsExceptionWithEmptyName()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('session name is required');
        
        Session::has('');
    }

    public function testRemoveSessionRemovesExistingSession()
    {
        $_SESSION['test_key'] = 'test_value';
        
        Session::remove('test_key');
        
        $this->assertArrayNotHasKey('test_key', $_SESSION);
    }

    public function testRemoveSessionWithNonExistentKey()
    {
        // Should not throw an exception
        Session::remove('non_existent_key');
        
        $this->assertArrayNotHasKey('non_existent_key', $_SESSION);
    }
}
