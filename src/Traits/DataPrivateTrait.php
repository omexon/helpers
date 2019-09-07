<?php

declare(strict_types=1);

namespace Omexon\Helpers\Traits;

use Omexon\Helpers\Arr;

trait DataPrivateTrait
{
    /** @var mixed[] */
    private $data = [];

    /**
     * Data clear.
     */
    private function dataClear(): void
    {
        $this->data = [];
    }

    /**
     * Data get.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    private function dataGet(string $key, $default = null)
    {
        return Arr::get($this->data, $key, $default);
    }

    /**
     * Data set.
     *
     * @param string $key
     * @param mixed $value
     */
    private function dataSet(string $key, $value): void
    {
        Arr::set($this->data, $key, $value, true);
    }

    /**
     * Data set array.
     *
     * @param mixed[] $data
     * @param bool $merge
     */
    private function dataSetArray(array $data, bool $merge = false): void
    {
        if ($merge) {
            foreach ($data as $key => $value) {
                $this->dataSet($key, $value);
            }
        } else {
            $this->data = $data;
        }
    }

    /**
     * Data get string.
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    private function dataGetString(string $key, string $default = ''): string
    {
        return (string)$this->dataGet($key, $default);
    }

    /**
     * Data get string null.
     *
     * @param string $key
     * @param string|null $default
     * @return string|null
     */
    private function dataGetStringNull(string $key, ?string $default = null): ?string
    {
        $result = $this->dataGet($key);
        if ($result !== null) {
            return (string)$result;
        }
        return $default;
    }

    /**
     * Data set string.
     *
     * @param string $key
     * @param mixed $value
     */
    private function dataSetString(string $key, $value): void
    {
        $this->dataSet($key, (string)$value);
    }

    /**
     * Data get int.
     *
     * @param string $key
     * @param int $default
     * @return int
     */
    private function dataGetInt(string $key, int $default = 0): int
    {
        return intval($this->dataGet($key, $default));
    }

    /**
     * Data get int null.
     *
     * @param string $key
     * @param int|null $default
     * @return int|null
     */
    private function dataGetIntNull(string $key, ?int $default = null): ?int
    {
        $result = $this->dataGet($key);
        if ($result !== null) {
            return intval($result);
        }
        return $default;
    }

    /**
     * Data set int.
     *
     * @param string $key
     * @param mixed $value
     */
    private function dataSetInt(string $key, $value): void
    {
        $this->dataSet($key, intval($value));
    }

    /**
     * Data get bool.
     *
     * @param string $key
     * @param bool $default
     * @return bool
     */
    private function dataGetBool(string $key, bool $default = false): bool
    {
        $value = $this->dataGet($key, $default);
        if (is_string($value)) {
            $value = strtolower($value);
        }
        return in_array($value, [1, true, '1', 'true', 'yes', 'on'], true);
    }

    /**
     * Data get bool null.
     *
     * @param string $key
     * @param bool|null $default
     * @return bool|null
     */
    private function dataGetBoolNull(string $key, ?bool $default = null): ?bool
    {
        $result = $this->dataGet($key);
        if ($result !== null) {
            if (is_string($result)) {
                $result = strtolower($result);
            }
            return in_array($result, [1, true, '1', 'true', 'yes', 'on'], true);
        }
        return $default;
    }

    /**
     * Data set bool.
     *
     * @param string $key
     * @param mixed $value
     */
    private function dataSetBool(string $key, $value): void
    {
        if (is_string($value)) {
            $value = strtolower($value);
        }
        $this->dataSet($key, in_array($value, [1, true, '1', 'true', 'yes', 'on'], true));
    }

    /**
     * Data set null.
     *
     * @param string $key
     */
    public function dataSetNull(string $key): void
    {
        $this->dataSet($key, null);
    }

    /**
     * Data remove.
     *
     * @param string $key
     */
    private function dataRemove(string $key): void
    {
        $this->data = Arr::remove($this->data, $key);
    }

    /**
     * Data has.
     *
     * @param string $key
     * @return bool
     */
    private function dataHas(string $key): bool
    {
        return Arr::has($this->data, $key);
    }

    /**
     * To array.
     *
     * @param string[] $keyOrder
     * @return mixed[]
     */
    private function dataToArray(array $keyOrder = []): array
    {
        $result = [];

        // Loop through key-order and set keys.
        if (count($keyOrder) > 0) {
            foreach ($keyOrder as $key) {
                if (array_key_exists($key, $this->data)) {
                    $result[$key] = $this->data[$key];
                }
            }
        }

        // Loop through data and set rest.
        foreach ($this->data as $key => $value) {
            if (!array_key_exists($key, $result)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}