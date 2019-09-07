<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Helpers;

use Omexon\Helpers\Traits\ConstantsTrait;

class Constants
{
    use ConstantsTrait;

    public const ACTOR_FIRSTNAME = 'Roger';
    public const ACTOR_LASTNAME = 'Moore';
    private const PRIVATE_FIRSTNAME = 'Sean';
    private const PRIVATE_LASTNAME = 'Connery';
    const FIRSTNAME = 'Daniel';
    const LASTNAME = 'Craig';
}