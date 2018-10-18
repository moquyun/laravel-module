<?php

namespace Moquyun\Module;

use Moquyun\Module\Commands\BuildCreateCommand;
use Moquyun\Module\Commands\ModelCreateCommand;
use Moquyun\Module\Commands\PermissionCreateCommand;
use Moquyun\Module\Services\MenusService;
use Illuminate\Support\ServiceProvider;
use Moquyun\Module\Commands\ModuleCreateCommand;
use Moquyun\Module\Commands\ConfigCreateCommand;

class LaravelServiceProvider extends ServiceProvider
{
    public $singletons = [
        'mq-menu' => MenusService::class,
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
            __DIR__.'/mq_module.php' => config_path('mq_module.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MQModule', function () {
            return new Provider();
        });
    }
}
