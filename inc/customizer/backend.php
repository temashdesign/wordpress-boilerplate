<?php

$path = get_template_directory() . '/inc/customizer/backend/';

if ( WOODSTOCK_KIRKI_IS_ACTIVE ) {

	require_once( $path . 'index.php' );
  require_once( $path . 'themestyles/index.php');
  require_once( $path . 'typography/index.php');

}