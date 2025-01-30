<?php

/**
 * Properly handle jQuery enqueuing
 */
function replace_jquery(): void
{
    // Only modify jQuery on the front-end
    if (!is_admin() && !is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
            [],
            '3.7.1',
            true
        );
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'replace_jquery');

function get_vite_dev_server()
{
    return 'https://localhost:5173';  // Updated to use localhost
}

function should_use_vite_dev_server()
{
    // Check if dev server is running
    $handle = curl_init(get_vite_dev_server());
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);

    // Add SSL verification options
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);

    curl_exec($handle);
    $error = curl_errno($handle);
    curl_close($handle);

    return $error === 0;
}

function enqueue_assets()
{
    $isViteDevServer = get_theme_file_path('/assets/hot');

    if (defined('WP_ENV') && WP_ENV === 'development' && file_exists($isViteDevServer)) {
        // Development with HMR
        $viteDevServer = 'http://localhost:5173';
        wp_enqueue_script('vite-client', $viteDevServer . '/@vite/client', [], null);
        wp_enqueue_script('balefire-scripts', $viteDevServer . '/assets/js/main.js', ['vite-client'], null);
        wp_enqueue_style('balefire-styles', $viteDevServer . '/assets/css/main.css', [], null);

        // Add type="module" to the script tags
        add_filter('script_loader_tag', function ($tag, $handle) {
            if (in_array($handle, ['vite-client', 'balefire-scripts'])) {
                return str_replace('<script ', '<script type="module" ', $tag);
            }
            return $tag;
        }, 10, 2);
    } else {
        // Production
        $manifestPath = get_theme_file_path('/dist/.vite/manifest.json');
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);

            // Enqueue JS
            if (isset($manifest['assets/js/main.js'])) {
                $mainJs = $manifest['assets/js/main.js']['file'];
                wp_enqueue_script('balefire-scripts', get_stylesheet_directory_uri() . '/dist/' . $mainJs, [], null);
            }

            // Enqueue CSS
            if (isset($manifest['assets/css/main.css'])) {
                $mainCss = $manifest['assets/css/main.css']['file'];
                wp_enqueue_style('balefire-styles', get_stylesheet_directory_uri() . '/dist/' . $mainCss, [], null);
            }
        }
    }
}

add_action('wp_enqueue_scripts', 'enqueue_assets');
