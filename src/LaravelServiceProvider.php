<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/25 下午2:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Module;

use Houdunwang\Module\Commands\BuildCreateCommand;
use Houdunwang\Module\Commands\ModelCreateCommand;
use Houdunwang\Module\Commands\PermissionCreateCommand;
use Houdunwang\Module\Services\MenusService;
use Illuminate\Support\ServiceProvider;
use Houdunwang\Module\Commands\ModuleCreateCommand;
use Houdunwang\Module\Commands\ConfigCreateCommand;

class LaravelServiceProvider extends ServiceProvider
{
    public $singletons = [
        'hd-menu' => MenusService::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModuleCreateCommand::class,
                ConfigCreateCommand::class,
                PermissionCreateCommand::class,
                ModelCreateCommand::class,
                BuildCreateCommand::class,
            ]);
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        //配置文件
        $this->publishes([
            __DIR__.'/hd_module.php' => config_path('hd_module.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('HDModule', function () {
            return new Provider();
        });
    }
}
