<?php
/**
 * @copyright © TMS-Plugins. All rights reserved.
 * @licence   See LICENCE.md for license details.
 */

namespace AmeliaBooking\Infrastructure\WP\Elementor;

use Elementor\AmeliaBookingElementorWidget;
use Elementor\AmeliaCustomerPanelElementorWidget;
use Elementor\AmeliaCatalogElementorWidget;
use Elementor\AmeliaEmployeePanelElementorWidget;
use Elementor\AmeliaEventsElementorWidget;
use Elementor\AmeliaSearchElementorWidget;
use Elementor\Plugin;

/**
 * Class ElementorBlock
 *
 * @package AmeliaBooking\Infrastructure\WP\Elementor
 */
class ElementorBlock
{

    protected static $instance;

    public static function get_instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct()
    {
        add_action('elementor/editor/before_enqueue_scripts', [$this, 'widget_styles']);
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
        add_action('elementor/elements/categories_registered', [$this, 'register_widget_categories']);
    }

    public function includes()
    {
        require_once(AMELIA_PATH . '/src/Infrastructure/WP/Elementor/AmeliaBookingElementorWidget.php');
        require_once(AMELIA_PATH . '/src/Infrastructure/WP/Elementor/AmeliaEventsElementorWidget.php');
    }

    public function register_widgets()
    {
        $this->includes();
        Plugin::instance()->widgets_manager->register_widget_type(new AmeliaBookingElementorWidget());
        Plugin::instance()->widgets_manager->register_widget_type(new AmeliaEventsElementorWidget());
    }

    public function widget_styles()
    {
        wp_register_style('amelia-elementor-widget-font', AMELIA_URL . 'public/css/frontend/elementor.css', array(), AMELIA_VERSION);
        wp_enqueue_style('amelia-elementor-widget-font');
    }

    public function register_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'amelia-elementor',
            [
                'title' => 'Amelia',
                'icon' => 'amelia-logo',
            ], 1);
    }

}
