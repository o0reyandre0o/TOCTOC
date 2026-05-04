<?php
/**
 * TOCTOC - Image Uploader via WordPress REST API (multipart)
 * Run via browser: https://toctoc.ky/wp-content/themes/TOCTOC-1/upload-portfolio.php
 * 
 * This script fetches images from a remote URL and registers them
 * directly in the WordPress media library, bypassing the upload temp folder.
 */

define('WP_USE_THEMES', false);
require_once(dirname(__FILE__) . '/../../../wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Run as admin user (webtoctoc)
$user = get_user_by('login', 'webtoctoc');
if ($user) {
    wp_set_current_user($user->ID);
}

$images = [
    'toctoc-adventura-cayman' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/photo-5156922354653924700-y.webp',
        'title' => 'Adventura Cayman - Portfolio',
        'alt'   => 'Adventura Cayman website design'
    ],
    'toctoc-coconut-room' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-48-25.webp',
        'title' => 'Coconut Room - Portfolio',
        'alt'   => 'Coconut Room website design'
    ],
    'toctoc-prospect-center' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-47-02.webp',
        'title' => 'Prospect Center - Portfolio',
        'alt'   => 'Prospect Center website design'
    ],
    'toctoc-uncle-liu' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-49-04.webp',
        'title' => 'Uncle Liu - Portfolio',
        'alt'   => 'Uncle Liu website design'
    ],
    'toctoc-brisana' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-47-38.webp',
        'title' => 'Brisana Insulation - Portfolio',
        'alt'   => 'Brisana Insulation website design'
    ],
    'toctoc-proptics' => [
        'url'   => 'https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-56-45.webp',
        'title' => 'Pr-Optics - Portfolio',
        'alt'   => 'Pr-Optics website design'
    ],
];

echo '<html><body style="font-family:monospace;padding:20px;">';
echo '<h1>TOCTOC - Portfolio Image Registrar</h1>';
echo '<p>Registering portfolio images in the Media Library...</p>';

$results = [];

foreach ($images as $slug => $data) {
    echo "<p>Processing <strong>{$slug}</strong>...</p>";
    flush();

    // Use media_sideload_image to copy the webp from uploads into media library
    $attachment_id = media_sideload_image($data['url'], 0, $data['title'], 'id');

    if (is_wp_error($attachment_id)) {
        $error = $attachment_id->get_error_message();
        echo "<p style='color:red;'>❌ Failed: $error</p>";
        $results[$slug] = ['error' => $error];
    } else {
        // Update alt text
        update_post_meta($attachment_id, '_wp_attachment_image_alt', $data['alt']);
        
        // Get the URL
        $url = wp_get_attachment_url($attachment_id);
        echo "<p style='color:green;'>✅ ID: <strong>{$attachment_id}</strong> → {$url}</p>";
        $results[$slug] = ['id' => $attachment_id, 'url' => $url];
    }
    flush();
}

echo '<hr>';
echo '<h2>Summary (copy these URLs):</h2><pre>';
foreach ($results as $slug => $data) {
    if (isset($data['url'])) {
        echo "{$slug}: {$data['url']}\n";
    } else {
        echo "{$slug}: ERROR - {$data['error']}\n";
    }
}
echo '</pre>';
echo '<p style="color:orange;"><strong>⚠️ Delete this script after use: /wp-content/themes/TOCTOC-1/upload-portfolio.php</strong></p>';
echo '</body></html>';
