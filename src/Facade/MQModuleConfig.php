<?php
namespace Moquyun\Module\Facade;

class MQModuleConfig extends Facade
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
