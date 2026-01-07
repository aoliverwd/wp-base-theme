<?php

namespace AOWD\BaseTheme\WPHeader;

function header(): void
{
    //
}


add_action("wp_head", __NAMESPACE__ . "\header");
