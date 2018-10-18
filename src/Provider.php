<?php

namespace Moquyun\Module;

use Moquyun\Module\Traits\ConfigService;
use Moquyun\Module\Traits\MenusService;
use Moquyun\Module\Traits\ModuleService;
use Moquyun\Module\Traits\PermissionService;

/**
 * Class Facade
 *
 * @package Moquyun\Module
 */
class Provider
{
    use ConfigService, PermissionService, MenusService,ModuleService;
}
