<?php

namespace Moquyun\Module;

use Moquyun\Module\Services\ConfigService;
use Illuminate\Support\Facades\Facade;

/**
 * Class Facade
 *
 * @package Moquyun\Module
 */
class Factory extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'MQModule';
    }
}
