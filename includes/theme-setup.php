<?php

namespace AOWD\BaseTheme\Setup;

function setup(): void
{
    // Remove core block patterns.
    remove_theme_support("core-block-patterns");
}

add_action("after_setup_theme", __NAMESPACE__ . "\setup");
