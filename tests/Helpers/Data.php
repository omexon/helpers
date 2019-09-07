<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Helpers;

use Omexon\Helpers\Traits\DataPublicTrait;

class Data
{
    use DataPublicTrait;

    /**
     * Data.
     *
     * @param string|null $firstname
     * @param string|null $lastname
     */
    public function __construct(?string $firstname = null, ?string $lastname = null)
    {
        if ($firstname !== null && $lastname !== null) {
            $this->setArray([
                'firstname' => $firstname,
                'lastname' => $lastname
            ]);
        }
    }
}