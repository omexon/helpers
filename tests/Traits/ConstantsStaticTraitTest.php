<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Traits;

use Omexon\Helpers\Obj;
use PHPUnit\Framework\TestCase;
use Tests\Omexon\Helpers\Helpers\ConstantsStatic;

class ConstantsStaticTraitTest extends TestCase
{
    /**
     * Test getClassConstants.
     *
     * @throws \ReflectionException
     */
    public function testGetClassConstants(): void
    {
        $constants = $this->callMethod('getClassConstants');
        $this->assertEquals(Obj::getConstants(ConstantsStatic::class), $constants);
    }

    /**
     * Test getClassConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testGetClassConstantByValue(): void
    {
        $this->assertEquals(
            'ACTOR_LASTNAME',
            $this->callMethod('getClassConstantByValue', ['value' => ConstantsStatic::ACTOR_LASTNAME])
        );
        $this->assertNull($this->callMethod('getClassConstantByValue', ['value' => 'unknown']));
    }

    /**
     * Test getPublicClassConstants.
     *
     * @throws \ReflectionException
     */
    public function testGetPublicClassConstants(): void
    {
        $constants = $this->callMethod('getPublicClassConstants');
        $this->assertEquals(Obj::getPublicConstants(ConstantsStatic::class), $constants);
    }

    /**
     * Test getPublicClassConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testGetPublicClassConstantByValue(): void
    {
        $this->assertEquals(
            'ACTOR_LASTNAME',
            $this->callMethod('getPublicClassConstantByValue', ['value' => ConstantsStatic::ACTOR_LASTNAME])
        );
        $this->assertNull($this->callMethod('getPublicClassConstantByValue', ['value' => 'unknown']));
    }

    /**
     * Test getPrivateClassConstants.
     *
     * @throws \ReflectionException
     */
    public function testGetPrivateClassConstants(): void
    {
        $constants = $this->callMethod('getPrivateClassConstants');
        $this->assertEquals(Obj::getPrivateConstants(ConstantsStatic::class), $constants);
    }

    /**
     * Test getPrivateClassConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testGetPrivateClassConstantByValue(): void
    {
        $this->assertEquals(
            'PRIVATE_LASTNAME',
            $this->callMethod('getPrivateClassConstantByValue', ['value' => 'Connery'])
        );
        $this->assertNull($this->callMethod('getPrivateClassConstantByValue', ['value' => 'unknown']));
    }

    /**
     * Test hasConstant.
     *
     * @throws \ReflectionException
     */
    public function testHasConstant(): void
    {
        $this->assertFalse($this->callMethod('hasClassConstant', ['constantName' => 'unknown']));
        $this->assertTrue($this->callMethod('hasClassConstant', ['constantName' => 'ACTOR_FIRSTNAME']));
        $this->assertTrue($this->callMethod('hasClassConstant', ['constantName' => 'PRIVATE_FIRSTNAME']));
    }

    /**
     * Test hasConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testHasConstantByValue(): void
    {
        $this->assertFalse($this->callMethod('hasClassConstantByValue', ['constantName' => 'unknown']));
        $this->assertTrue($this->callMethod('hasClassConstantByValue', [
            'constantName' => ConstantsStatic::ACTOR_FIRSTNAME
        ]));
        $this->assertTrue($this->callMethod('hasClassConstantByValue', ['constantName' => 'Connery']));
    }

    /**
     * Test hasPublicConstant.
     *
     * @throws \ReflectionException
     */
    public function testHasPublicConstant(): void
    {
        $this->assertFalse($this->callMethod('hasPublicClassConstant', ['constantName' => 'unknown']));
        $this->assertTrue($this->callMethod('hasPublicClassConstant', ['constantName' => 'ACTOR_FIRSTNAME']));
        $this->assertFalse($this->callMethod('hasPublicClassConstant', ['constantName' => 'PRIVATE_FIRSTNAME']));
    }

    /**
     * Test hasPublicConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testHasPublicConstantByValue(): void
    {
        $this->assertFalse($this->callMethod('hasPublicClassConstantByValue', ['constantName' => 'unknown']));
        $this->assertTrue($this->callMethod('hasPublicClassConstantByValue', [
            'constantName' => ConstantsStatic::ACTOR_FIRSTNAME
        ]));
        $this->assertFalse($this->callMethod('hasPublicClassConstantByValue', ['constantName' => 'Connery']));
    }

    /**
     * Test hasPrivateConstant.
     *
     * @throws \ReflectionException
     */
    public function testHasPrivateConstant(): void
    {
        $this->assertFalse($this->callMethod('hasPrivateClassConstant', ['constantName' => 'unknown']));
        $this->assertFalse($this->callMethod('hasPrivateClassConstant', ['constantName' => 'ACTOR_FIRSTNAME']));
        $this->assertTrue($this->callMethod('hasPrivateClassConstant', ['constantName' => 'PRIVATE_FIRSTNAME']));
    }

    /**
     * Test hasPrivateConstantByValue.
     *
     * @throws \ReflectionException
     */
    public function testHasPrivateConstantByValue(): void
    {
        $this->assertFalse($this->callMethod('hasPrivateClassConstantByValue', ['constantName' => 'unknown']));
        $this->assertFalse($this->callMethod('hasPrivateClassConstantByValue', [
            'constantName' => ConstantsStatic::ACTOR_FIRSTNAME
        ]));
        $this->assertTrue($this->callMethod('hasPrivateClassConstantByValue', ['constantName' => 'Connery']));
    }

    /**
     * Call method.
     *
     * @param string $method
     * @param string[] $arguments
     * @return mixed
     * @throws \ReflectionException
     */
    private function callMethod(string $method, array $arguments = [])
    {
        return Obj::callMethod($method, null, $arguments, ConstantsStatic::class);
    }
}