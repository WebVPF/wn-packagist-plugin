<?php namespace WebVPF\Packagist\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use Lang;

class Vendor extends ReportWidgetBase
{
    protected $defaultAlias = 'VendorReportWidget';

    public function defineProperties(): array
    {
        return [
            'vendor' => [
                'title'             => 'webvpf.packagist::lang.prop.vendor',
                'default'           => 'winter',
                'type'              => 'string',
            ],
            'sort' => [
                'title'       => 'webvpf.packagist::lang.prop.sort_by',
                'type'        => 'dropdown',
                'default'     => 'name',
                'placeholder' => 'webvpf.packagist::lang.prop.choose_option',
                'options'     => [
                    'name'         => Lang::get('webvpf.packagist::lang.prop.option_name'),
                    'downloads'    => Lang::get('webvpf.packagist::lang.prop.downloads'),
                    'github_stars' => Lang::get('webvpf.packagist::lang.prop.stars'),
                ],
            ],
            'order' => [
                'title'       => 'webvpf.packagist::lang.prop.order',
                'type'        => 'dropdown',
                'default'     => 'asc',
                'placeholder' => 'webvpf.packagist::lang.prop.choose_option',
                'options'     => [
                    'asc'  => Lang::get('webvpf.packagist::lang.prop.ascending'),
                    'desc' => Lang::get('webvpf.packagist::lang.prop.descending'),
                ],
            ],
        ];
    }

    public function render(): string
    {
        $this->addCss('/plugins/webvpf/packagist/assets/css/style.css', 'WebVPF.Packagist');

        return $this->makePartial('widget');
    }

    public function loadData()
    {
        $url_list = 'https://packagist.org/packages/list.json?vendor=' . $this->property('vendor');

        $list = json_decode(file_get_contents($url_list), true);

        $packages = array();

        foreach ($list['packageNames'] as $package) {
            $url_package = 'https://packagist.org/packages/' . $package . '.json';

            $package_packagist = json_decode(file_get_contents($url_package), true);

            $packages[$package] = $package_packagist['package'];
        }

        if ($this->property('sort') != 'name') {
            $packages = array_values(array_sort($packages, function ($value) {
                return $this->property('sort') == 'github_stars' ? $value['github_stars'] : $value['downloads']['total'];
            }));
        }

        if ($this->property('order') == 'desc') {
            $packages = array_reverse($packages);
        }

        $this->vars['vendor_list'] = $packages;
    }

    public function onLoad()
    {
        try {
            $this->loadData();
        } catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return [
            '#' . $this->alias => $this->makePartial('report')
        ];
    }
}
