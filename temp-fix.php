<?php
/**
 * TOCTOC - Temporary Folder Fixer
 * This script attempts to create the missing temp folder for WordPress uploads.
 * Visit this script in your browser: https://toctoc.ky/wp-content/themes/TOCTOC/temp-fix.php
 */

define('WP_USE_THEMES', false);

// Try to find wp-load.php by going up levels
$load_path = dirname(__FILE__) . '/../../../wp-load.php';
if (!file_exists($load_path)) {
    // Try another common path
    $load_path = dirname(__FILE__) . '/../../../../wp-load.php';
}

if (file_exists($load_path)) {
    require_once($load_path);
} else {
    echo "<h1>Error: wp-load.php not found.</h1>";
    echo "<p>Please ensure this script is in your theme folder.</p>";
    echo "<p>Path checked: " . htmlspecialchars($load_path) . "</p>";
    exit;
}

echo "<h1>TOCTOC - Upload Temp Fixer</h1>";

// 1. Define the temp path
$temp_path = WP_CONTENT_DIR . '/temp';

echo "<h3>Checking: " . htmlspecialchars($temp_path) . "</h3>";

// 2. Try to create the folder
if (!file_exists($temp_path)) {
    if (mkdir($temp_path, 0777, true)) {
        echo "<p style='color:green;'>✅ Folder 'temp' created successfully in wp-content.</p>";
    } else {
        echo "<p style='color:red;'>❌ Failed to create folder. Please create it manually via FTP/File Manager.</p>";
    }
} else {
    echo "<p style='color:blue;'>ℹ️ Folder 'temp' already exists.</p>";
}

// 3. Try to set permissions
if (chmod($temp_path, 0777)) {
    echo "<p style='color:green;'>✅ Permissions set to 777.</p>";
} else {
    echo "<p style='color:orange;'>⚠️ Could not change permissions. Please set to 777 manually.</p>";
}

// 4. Test write
$test_file = $temp_path . '/test.txt';
if (file_put_contents($test_file, 'test')) {
    echo "<p style='color:green;'>✅ Write test successful!</p>";
    unlink($test_file);
} else {
    echo "<p style='color:red;'>❌ Write test failed. WordPress still won't be able to upload.</p>";
}

// 5. Instruction for wp-config.php
$config_path = ABSPATH . 'wp-config.php';
echo "<hr>";
echo "<h2>Next Step:</h2>";
echo "<p>Add this line to your <b>wp-config.php</b> (before the 'Happy publishing' line):</p>";
echo "<code style='background:#eee; padding:10px; display:block; border-left:5px solid #ccc;'>define('WP_TEMP_DIR', ABSPATH . 'wp-content/temp/');</code>";
echo "<p>Absolute path for reference: <code>" . htmlspecialchars(ABSPATH) . "</code></p>";

echo "<hr>";
echo "<p><i>Delete this script after use for security.</i></p>";
