<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Helpers;

use Omexon\Helpers\Traits\SingletonTrait;
use ReflectionException;

class Instance
{
    use SingletonTrait;

    /**
     * Data by class.
     *
     * @param mixed[] $parameters
     * @return Data|object
     * @throws ReflectionException
     */
    public function dataByClass(array $parameters = []): Data
    {
        return $this->instanceByClass(Data::class, $parameters);
    }

    /**
     * Data by name.
     *
     * @param string $name
     * @param mixed[] $parameters
     * @return Data|object
     * @throws ReflectionException
     */
    public function dataByName(string $name, array $parameters = []): Data
    {
        return $this->instanceByName(Data::class, $name, $parameters);
    }
}