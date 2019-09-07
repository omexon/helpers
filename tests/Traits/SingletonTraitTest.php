<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Traits;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Tests\Omexon\Helpers\Helpers\Instance;

class SingletonTraitTest extends TestCase
{
    /**
     * Test instanceClass.
     *
     * @throws ReflectionException
     */
    public function testInstanceClass(): void
    {
        $instance = new Instance();
        $data = $instance->dataByClass();
        $this->assertFalse($data->has('test1'));
        $data->set('test1', 'test1');
        $data = $instance->dataByClass();
        $this->assertTrue($data->has('test1'));
    }

    /**
     * Test instanceClass with parameters.
     *
     * @throws ReflectionException
     */
    public function testInstanceClassWithParameters(): void
    {
        $instance = new Instance();
        $actor = ['firstname' => 'Roger', 'lastname' => 'Moore'];
        $data = $instance->dataByClass($actor);
        $this->assertSame($actor, $data->toArray());
    }

    /**
     * Test instanceName.
     *
     * @throws ReflectionException
     */
    public function testInstanceName(): void
    {
        $instance = new Instance();
        $data1 = $instance->dataByName('data1');
        $data2 = $instance->dataByName('data2');
        $this->assertSame($data1->toArray(), $data2->toArray());
        $data1->set('test1', 'test1');
        $this->assertNotSame($data1->toArray(), $data2->toArray());
        $this->assertTrue($data1->has('test1'));
        $this->assertFalse($data2->has('test1'));
    }

    /**
     * Test instanceName with parameters.
     *
     * @throws ReflectionException
     */
    public function testInstanceNameWithParameters(): void
    {
        $instance = new Instance();
        $actor = ['firstname' => 'Roger', 'lastname' => 'Moore'];
        $data = $instance->dataByName('test1', $actor);
        $this->assertSame($actor, $data->toArray());
    }
}