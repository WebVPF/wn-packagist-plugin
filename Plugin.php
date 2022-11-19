<?php namespace WebVPF\Packagist;

use Backend\Models\UserRole;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'webvpf.packagist::lang.plugin.name',
            'description' => 'webvpf.packagist::lang.plugin.desc',
            'author'      => 'WebVPF',
            'icon'        => 'icon-box'
        ];
    }

    public function boot(): void {}

    public function registerPermissions(): array
    {
        return [
            'webvpf.packagist.vendor' => [
                'tab' => 'webvpf.packagist::lang.plugin.name',
                'label' => 'webvpf.packagist::lang.permissions.vendor_permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    public function registerReportWidgets(): array
    {
        return [
            \WebVPF\Packagist\ReportWidgets\Vendor::class => [
                'label'   => 'Packagist Vendor',
                'context' => 'dashboard',
                'permissions' => [
                    'webvpf.packagist.vendor',
                ],
            ],
        ];
    }
}
