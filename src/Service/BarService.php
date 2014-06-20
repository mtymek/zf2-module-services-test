<?php

namespace MyModule\Service;

class BarService
{
    /**
     * @var FooService
     */
    private $fooService;

    public function __construct(FooService $fooService)
    {
        $this->fooService = $fooService;
    }
}
