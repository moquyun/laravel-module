<?php
namespace Moquyun\Module\Traits;

trait MenusService
{
    /**
     * 获取所有菜单
     *
     * @return mixed
     */
    public function getMenus()
    {
        foreach (\Module::getOrdered() as $module) {
            $path          = config('modules.paths.modules')."/{$module->name}/Config";
            $menusConfig   = include "{$path}/menus.php";
            $title         = \MQModule::config($module->name.'.config.name');
            $menus[$title] = $menusConfig;
        }

        return $menus;
    }

    /**
     * 获取模块菜单
     *
     * @param $module
     *
     * @return mixed
     */
    public function getMenuByModule($module = null)
    {
        $module = $module ?? \MQModule::currentModule();
        $path = config('modules.paths.modules')."/{$module}/Config";

        return include "{$path}/menus.php";
    }
}
