<?php
/**
 * Plugin Name: Lodin Plugin
 * Description: The first Lodin plugin
 * Plugin URI: http://localhost/checkout/Checkout/
 * Version: 1.0.0
 * Author: Effyis
 * Author URI: http://localhost/checkout/Checkout/
 * Text Domain: Lodin-Plugin
 */

class LodinPlugin
{
    public $plugin;

    public function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=lodin_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function add_admin_pages()
    {
        add_menu_page(
            'Lodin Plugin',
            'Lodin',
            'manage_options',
            'lodin_plugin',
            array($this, 'admin_index'),
            'dashicons-money-alt',
            110
        );

        // Ajout de la sous-page "Paramètres généraux"
        add_submenu_page(
            'lodin_plugin',
            'Paramètres généraux',
            'Paramètres généraux',
            'manage_options',
            'lodin_general_settings',
            array($this, 'general_settings_page')
        );

        // Ajout de la sous-page "Contactez-nous"
        add_submenu_page(
            'lodin_plugin',
            'Contactez-nous',
            'Contactez-nous',
            'manage_options',
            'lodin_contact_us',
            array($this, 'contact_us_page')
        );
    }

    public function admin_index()
    {
        // Contenu de la page d'accueil de l'administration
        require_once plugin_dir_path(__FILE__) . 'templatess/admin.php';
    }

    public function general_settings_page()
    {
        // Contenu de la page "Paramètres généraux"
        echo '<div class="wrap">';
        echo '<h1>Paramètres généraux</h1>';
        // Ajoutez ici le contenu de votre page de paramètres généraux
        echo '</div>';
    }

    public function contact_us_page()
    {
        // Contenu de la page "Contactez-nous"
        echo '<div class="wrap">';
        echo '<h1>Contactez-nous</h1>';
        // Ajoutez ici le contenu de votre page "Contactez-nous"
        echo '</div>';
    }

    public function enqueue()
    {
        // Enqueue all our scripts and styles
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }

    public function activate()
    {
        // Code d'activation du plugin
    }

    public function deactivate()
    {
        // Code de désactivation du plugin
    }
}

$lodinPlugin = new LodinPlugin();
$lodinPlugin->register();








?>