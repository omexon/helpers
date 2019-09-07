<?php

declare(strict_types=1);

namespace Tests\Omexon\Helpers\Helpers;

// CodeSniffer will fail on this file on purpose.
class ObjHelperObject
{
    /** @var string */
    private $property1 = 'property 1';

    /** @var string */
    private $property2 = 'property 2';

    /** @var string */
    private $property3 = 'property 3';

    /** @var string */
    private $property4 = 'property 4';

    /**
     * Private method.
     */
    private function privateMethod(): void
    {
    }

    /**
     * Protected method.
     */
    protected function protectedMethod(): void
    {
    }

    /**
     * Public method.
     */
    public function publicMethod(): void
    {
    }
}