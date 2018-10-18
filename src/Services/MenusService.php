<?php
namespace Moquyun\Module\Services;
#已不使用
class MenusService
{
    public function all()
    {
        foreach (\Module::getOrdered() as $module) {
            $path                   = config('modules.paths.modules')."/{$module->name}/Config";
            $config                 = include "{$path}/config.php";
            $menus[$config['name']] = include "{$path}/menus.php";
        }

        return $menus;
    }
}
