<?php namespace DieterVyncke\Pages;

use Backend;
use System\Classes\PluginBase;

/**
 * pages Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'pages',
            'description' => 'Pages module using database',
            'author'      => 'DieterVyncke',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'DieterVyncke\Pages\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'DieterVyncke.pages.some_permission' => [
                'tab' => 'pages',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'pages' => [
                'label'       => 'Pages',
                'url'         => Backend::url('dietervyncke/pages/Pages'),
                'icon'        => 'icon-leaf',
                'permissions' => ['DieterVyncke.pages.*'],
                'order'       => 500,
            ],
        ];
    }
}
