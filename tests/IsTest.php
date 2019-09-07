<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers;

use Omexon\Helpers\Is;
use PHPUnit\Framework\TestCase;

class IsTest extends TestCase
{
    /** @var string */
    private $pascalCase = 'TestClass';

    /** @var string */
    private $camelCase = 'testClass';

    /** @var string */
    private $snakeCase = 'test_class';

    /** @var string */
    private $kebabCase = 'test-class';

    /**
     * Test is camel case.
     */
    public function testCamelCase(): void
    {
        $this->assertFalse(Is::camelCase($this->pascalCase), 'CASE: pascal');
        $this->assertTrue(Is::camelCase($this->camelCase), 'CASE: camel');
        $this->assertFalse(Is::camelCase($this->snakeCase), 'CASE: snake');
        $this->assertFalse(Is::camelCase($this->kebabCase), 'CASE: kebab');
    }

    /**
     * Test is kebab case.
     */
    public function testIsKebabCase(): void
    {
        $this->assertFalse(Is::kebabCase($this->pascalCase), 'CASE: pascal');
        $this->assertFalse(Is::kebabCase($this->camelCase), 'CASE: camel');
        $this->assertFalse(Is::kebabCase($this->snakeCase), 'CASE: snake');
        $this->assertTrue(Is::kebabCase($this->kebabCase), 'CASE: kebab');
    }

    /**
     * Test is pascal case.
     */
    public function testPascalCase(): void
    {
        $this->assertTrue(Is::pascalCase($this->pascalCase), 'CASE: pascal');
        $this->assertFalse(Is::pascalCase($this->camelCase), 'CASE: camel');
        $this->assertFalse(Is::pascalCase($this->snakeCase), 'CASE: snake');
        $this->assertFalse(Is::pascalCase($this->kebabCase), 'CASE: kebab');
    }

    /**
     * Test is snake case.
     */
    public function testSnakeCase(): void
    {
        $this->assertFalse(Is::snakeCase($this->pascalCase), 'CASE: pascal');
        $this->assertFalse(Is::snakeCase($this->camelCase), 'CASE: camel');
        $this->assertTrue(Is::snakeCase($this->snakeCase), 'CASE: snake');
        $this->assertFalse(Is::snakeCase($this->kebabCase), 'CASE: kebab');
    }

    /**
     * Test date.
     */
    public function testDate(): void
    {
        $this->assertTrue(Is::date(date('Y-m-d')));
        $this->assertFalse(Is::date(date('H:i:s')));
    }

    /**
     * Test time.
     */
    public function testTime(): void
    {
        $this->assertTrue(Is::time(date('H:i:s')));
        $this->assertFalse(Is::time(date('Y-m-d')));
    }

    /**
     * Test datetime.
     */
    public function testDatetime(): void
    {
        $this->assertTrue(Is::datetime(date('Y-m-d H:i:s')));
        $this->assertFalse(Is::datetime(date('H:i:s Y-m-d')));
    }

    /**
     * Test email.
     */
    public function testEmail(): void
    {
        $this->assertTrue(Is::email('nobody@host.com'));
        $this->assertFalse(Is::email('nobody@host'));
    }

    /**
     * Test url.
     */
    public function testUrl(): void
    {
        $this->assertTrue(Is::url('http://host.com'));
        $this->assertFalse(Is::url('host.com'));
    }

    /**
     * Test ip.
     */
    public function testIp(): void
    {
        $this->assertTrue(Is::ip('8.8.8.8'));
        $this->assertTrue(Is::ip('fe80::725b:115f:11c8:5e90'));
        $this->assertFalse(Is::ip('not.an.ip'));
    }

    /**
     * Test mac-address.
     */
    public function testMacAddress(): void
    {
        $this->assertTrue(Is::macAddress('02:42:3b:4f:44:34'));
        $this->assertFalse(Is::macAddress('Not a mac-address'));
    }

    /**
     * Test timezone.
     */
    public function testTimezone(): void
    {
        $this->assertTrue(Is::timezone('America/Phoenix'));
        $this->assertTrue(Is::timezone('Asia/Qatar'));
        $this->assertTrue(Is::timezone('Europe/Copenhagen'));
        $this->assertTrue(Is::timezone('Europe/Rome'));
        $this->assertTrue(Is::timezone('UTC'));
        $this->assertTrue(Is::timezone('Pacific/Honolulu'));
        $this->assertFalse(Is::timezone('No/Timezone'));
    }
}
