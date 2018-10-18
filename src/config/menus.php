<?php
/**
 * 后台菜单配置
 * 下面是属性说明：
 * title 菜单栏目
 * icon 图标参考 http://fontawesome.dashgame.com/
 * menus 子菜单
 * permission 权限标识，必须在permission.php配置文件中存在
 */
return [
    '{MODULE}'=>[
        "title"      => "系统管理",
        "icon"       => "fa fa-navicon",
        'permission' => '权限标识',
        "menus"      => [
            ["title" => "网站配置", "permission" => "权限标识", "url" => "链接地址"],
        ],
    ],
];
