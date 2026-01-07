<?php

namespace AOWD\BaseTheme\WPFooter;

function footer(): void
{
    //
}


add_action("wp_foot", __NAMESPACE__ . "\footer");
