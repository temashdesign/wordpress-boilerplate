<?php

$sep_id = 10;
$section = "global";

Kirki::add_field("woodstock", [
    "type" => "color",
    "settings" => "main_bg_color",
    "label" => esc_attr__("Content Background Color", "woodstock"),
    "transport" => "auto",
    "section" => $section,
    "default" => "#FFFFFF",
    "priority" => 10,
    // 'output' => array(
    //   array(
    //     'element'  => 'body',
    //     'property' => 'background-color',
    //   )
    // ),
]);