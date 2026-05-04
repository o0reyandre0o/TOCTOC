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

// 5. Fix .htaccess with php_value upload_tmp_dir (root cause fix)
echo "<hr>";
echo "<h2>Root Cause Fix — .htaccess (PHP upload_tmp_dir):</h2>";
$htaccess_path = ABSPATH . '.htaccess';
$htaccess_line = "php_value upload_tmp_dir /home/toctoc/public_html/wp-content/temp";

if (file_exists($htaccess_path)) {
    $htaccess_content = file_get_contents($htaccess_path);
    if (strpos($htaccess_content, 'upload_tmp_dir') !== false) {
        echo "<p style='color:blue;'>ℹ️ upload_tmp_dir already set in .htaccess.</p>";
    } else {
        // Insert after the first line (usually # BEGIN WordPress)
        $new_htaccess = $htaccess_line . "\n" . $htaccess_content;
        if (file_put_contents($htaccess_path, $new_htaccess)) {
            echo "<p style='color:green;'>✅ <b>.htaccess updated!</b> PHP will now use /home/toctoc/public_html/wp-content/temp as upload temp dir.</p>";
            echo "<p style='color:green;'>👉 <b>Try uploading your images now in WordPress!</b></p>";
        } else {
            echo "<p style='color:red;'>❌ Could not write to .htaccess. Please add this line manually at the top of your .htaccess:</p>";
            echo "<code style='background:#eee;padding:10px;display:block;'>$htaccess_line</code>";
        }
    }
} else {
    echo "<p style='color:red;'>❌ .htaccess not found at: " . htmlspecialchars($htaccess_path) . "</p>";
}

// 6. Try to auto-update wp-config.php
echo "<hr>";
echo "<h2>wp-config.php (WP_TEMP_DIR):</h2>";
if (file_exists($config_path)) {
    $config_content = file_get_contents($config_path);
    if (strpos($config_content, 'WP_TEMP_DIR') !== false) {
        echo "<p style='color:blue;'>ℹ️ WP_TEMP_DIR is already defined in wp-config.php.</p>";
    } else {
        $insertion_point = "/* That's all, stop editing! Happy publishing. */";
        if (strpos($config_content, $insertion_point) !== false) {
            $new_content = str_replace($insertion_point, "define('WP_TEMP_DIR', ABSPATH . 'wp-content/temp/');\n" . $insertion_point, $config_content);
            if (file_put_contents($config_path, $new_content)) {
                echo "<p style='color:green;'>✅ <b>wp-config.php updated automatically!</b> You can now try uploading your images.</p>";
            } else {
                echo "<p style='color:red;'>❌ Failed to write to wp-config.php (Permission Denied). Please add the line manually.</p>";
            }
        } else {
            echo "<p style='color:orange;'>⚠️ Could not find the standard insertion point in wp-config.php. Please add the line manually.</p>";
        }
    }
} else {
    echo "<p style='color:red;'>❌ wp-config.php not found at: " . htmlspecialchars($config_path) . "</p>";
}

echo "<h2>Manual Step (if auto-fix failed):</h2>";
echo "<p>Add this line to your <b>wp-config.php</b>:</p>";
echo "<code style='background:#eee; padding:10px; display:block; border-left:5px solid #ccc;'>define('WP_TEMP_DIR', ABSPATH . 'wp-content/temp/');</code>";
echo "<p>Absolute path for reference: <code>" . htmlspecialchars(ABSPATH) . "</code></p>";

echo "<hr>";
echo "<p><i>Delete this script after use for security.</i></p>";
