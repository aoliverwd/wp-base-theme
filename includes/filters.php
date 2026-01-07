<?php

namespace AOWD\BaseTheme\Filters;


/**
 * Add SVG support to WordPress media uploads.
 *
 * @param array<string, string> $mimes Array of allowed mime types.
 * @return array<string, string> Modified array of allowed mime types.
 */
function mimeTypes(array $mimes): array
{
    $mimes["svg"] = "image/svg+xml";
    return $mimes;
}

add_filter("upload_mimes", __NAMESPACE__ . "\mimeTypes");


/**
 * Settings update to the gutenberg editor for non-admins
 *
 * @param array<mixed> $settings Array of block editor settings.
 * @return array<mixed> Modified array of block editor settings.
 */
function guttenbergEditorSettings(array $settings): array
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $current_user_roles = $user->roles;
        $add_to_roles = ["editor", "author"];

        if (in_array($add_to_roles, $current_user_roles) && !in_array("administrator", $current_user_roles)) {
            $settings = array_merge($settings, [
                "canLockBlocks" => false, // Disable locking/unlocking of blocks for non-admins
                "codeEditingEnabled" => false, // Disable code editing in the gutenberg editor for non-admins
            ]);
        }
    }

    return $settings;
}

add_filter("block_editor_settings_all", __NAMESPACE__ . "\guttenbergEditorSettings");
