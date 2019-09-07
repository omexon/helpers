<?php

declare(strict_types=1);

namespace Omexon\Helpers\Traits;

trait DataPublicTrait
{
    use DataPrivateTrait;

    /**
     * Clear data.
     */
    public function clear(): void
    {
        $this->dataClear();
    }

    /**
     * Get.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->dataGet($key, $default);
    }

    /**
     * Set.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set(string $key, $value): self
    {
        $this->dataSet($key, $value);
        return $this;
    }

    /**
     * Set array.
     *
     * @param mixed[] $data
     * @param bool $merge
     * @return $this
     */
    public function setArray(array $data, bool $merge = false): self
    {
        $this->dataSetArray($data, $merge);
        return $this;
    }

    /**
     * get string.
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    public function getString(string $key, string $default = ''): string
    {
        return $this->dataGetString($key, $default);
    }

    /**
     * Get string null.
     *
     * @param string $key
     * @param string|null $default
     * @return string|null
     */
    public function getStringNull(string $key, ?string $default = null): ?string
    {
        return $this->dataGetStringNull($key, $default);
    }

    /**
     * Set string.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setString(string $key, $value): self
    {
        $this->dataSetString($key, $value);
        return $this;
    }

    /**
     * Get int.
     *
     * @param string $key
     * @param int $default
     * @return int
     */
    public function getInt(string $key, int $default = 0): int
    {
        return $this->dataGetInt($key, $default);
    }

    /**
     * Get int null.
     *
     * @param string $key
     * @param int|null $default
     * @return int|null
     */
    public function getIntNull(string $key, ?int $default = null): ?int
    {
        return $this->dataGetIntNull($key, $default);
    }

    /**
     * Set int.
     *
     * @param string $key
     * @param int $value
     * @return $this
     */
    public function setInt(string $key, int $value): self
    {
        $this->dataSetInt($key, $value);
        return $this;
    }

    /**
     * Get bool (translate: 1, true, '1', 'true', 'yes', 'on'). Otherwise false.
     *
     * @param string $key
     * @param bool $default
     * @return bool
     */
    public function getBool(string $key, bool $default = false): bool
    {
        return $this->dataGetBool($key, $default);
    }

    /**
     * Get bool null.
     *
     * @param string $key
     * @param bool|null $default
     * @return bool|null
     */
    public function getBoolNull(string $key, ?bool $default = null): ?bool
    {
        return $this->dataGetBoolNull($key, $default);
    }

    /**
     * Set bool.
     *
     * @param string $key
     * @param mixed $value Supported values: 1, true, '1', 'true', 'yes', 'on'. Otherwise false.
     * @return $this
     */
    public function setBool(string $key, $value)
    {
        $this->dataSetBool($key, $value);
        return $this;
    }

    /**
     * Set null.
     *
     * @param string $key
     * @return $this
     */
    public function setNull(string $key): self
    {
        $this->dataSetNull($key);
        return $this;
    }

    /**
     * Remove.
     *
     * @param string $key
     * @return $this
     */
    public function remove(string $key): self
    {
        $this->dataRemove($key);
        return $this;
    }

    /**
     * Has.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return $this->dataHas($key);
    }

    /**
     * To array.
     *
     * @param string[] $keyOrder
     * @return mixed[]
     */
    public function toArray(array $keyOrder = []): array
    {
        return $this->dataToArray($keyOrder);
    }
}