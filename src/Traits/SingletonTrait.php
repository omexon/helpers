<?php

declare(strict_types=1);

namespace Omexon\Helpers\Traits;

use ReflectionClass;
use ReflectionException;

trait SingletonTrait
{
    /** @var mixed[] */
    private $instancesByClass = [];

    /** @var mixed[] */
    private $instancesByName = [];

    /**
     * Instance by class.
     *
     * @param string $className
     * @param mixed[] $parameters
     * @return object
     * @throws ReflectionException
     */
    private function instanceByClass(string $className, array $parameters = []): object
    {
        // Instantiate class.
        if (!array_key_exists($className, $this->instancesByClass)) {
            $reflectionClass = new ReflectionClass($className);
            if (count($parameters) > 0) {
                $object = $reflectionClass->newInstanceArgs($parameters);
            } else {
                $object = $reflectionClass->newInstance();
            }
            $this->instancesByClass[$className] = $object;
        }

        return $this->instancesByClass[$className];
    }

    /**
     * Instance by name.
     *
     * @param string $className
     * @param string $instanceName
     * @param mixed[] $parameters
     * @return object
     * @throws ReflectionException
     */
    private function instanceByName(string $className, string $instanceName, array $parameters = []): object
    {
        // Make sure class array exists.
        if (!array_key_exists($className, $this->instancesByName)) {
            $this->instancesByName[$className] = [];
        }

        // Instantiate class.
        if (!array_key_exists($instanceName, $this->instancesByName[$className])) {
            $reflectionClass = new ReflectionClass($className);
            if (count($parameters) > 0) {
                $object = $reflectionClass->newInstanceArgs($parameters);
            } else {
                $object = $reflectionClass->newInstance();
            }
            $this->instancesByName[$className][$instanceName] = $object;
        }

        return $this->instancesByName[$className][$instanceName];
    }
}