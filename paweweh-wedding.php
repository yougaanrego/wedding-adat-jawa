<?php
/*
Plugin Name: Paweweh Wedding Adat Jawa
Description: Template undangan pernikahan adat Jawa dengan animasi, aksara Jawa, batik, countdown, RSVP.
Version: 1.0
Author: Luci
*/

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('paweweh-fonts','https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=EB+Garamond&family=Noto+Serif+Javanese:wght@400;600&display=swap',[],'1.0');
    wp_enqueue_style('paweweh-css', plugin_dir_url(__FILE__).'paweweh.css',['paweweh-fonts'],'1.0');
    wp_enqueue_script('paweweh-js', plugin_dir_url(__FILE__).'paweweh.js',[],'1.0',true);
    wp_localize_script('paweweh-js','pawewehData',[
        'akadTimestamp' => get_option('paweweh_akad_timestamp','2026-12-12T08:00:00+07:00'),
        'rsvpEndpoint'  => get_option('paweweh_rsvp_endpoint',''),
    ]);
});

add_filter('theme_page_templates', function($templates){
    $templates['paweweh-template.php'] = 'Paweweh Wedding Adat Jawa';
    return $templates;
});

add_filter('template_include', function($template){
    if (is_page_template('paweweh-template.php')){
        return plugin_dir_path(__FILE__).'paweweh-template.php';
    }
    return $template;
});

add_action('admin_menu', function(){
    add_options_page('Paweweh Settings','Paweweh Wedding','manage_options','paweweh',function(){
        if (isset($_POST['paweweh_save'])){
            update_option('paweweh_akad_timestamp', sanitize_text_field($_POST['akad_timestamp']));
            update_option('paweweh_rsvp_endpoint', esc_url_raw($_POST['rsvp_endpoint']));
            echo '<div class="notice notice-success"><p>Tersimpan.</p></div>';
        }
        $akad = get_option('paweweh_akad_timestamp','2026-12-12T08:00:00+07:00');
        $rsvp = get_option('paweweh_rsvp_endpoint','');
        ?>
        <div class="wrap"><h1>Pengaturan Paweweh Wedding</h1>
        <form method="post">
            <table class="form-table">
                <tr><th><label for="akad_timestamp">Tanggal & Jam Akad (ISO 8601)</label></th>
                    <td><input type="text" name="akad_timestamp" id="akad_timestamp" value="<?php echo esc_attr($akad); ?>" class="regular-text" placeholder="2026-12-12T08:00:00+07:00"><p class="description">Contoh: 2026-12-12T08:00:00+07:00</p></td></tr>
                <tr><th><label for="rsvp_endpoint">RSVP Endpoint (Formspree/Google Forms/WA API)</label></th>
                    <td><input type="url" name="rsvp_endpoint" id="rsvp_endpoint" value="<?php echo esc_attr($rsvp); ?>" class="regular-text" placeholder="https://formspree.io/f/xxxx"><p class="description">Kosongkan = hanya tampil sukses lokal.</p></td></tr>
            </table>
            <input type="hidden" name="paweweh_save" value="1">
            <?php submit_button('Simpan'); ?>
        </form></div>
        <?php
    });
});
