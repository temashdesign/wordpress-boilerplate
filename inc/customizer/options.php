<?php

	// Kill theme modifications
	// remove_theme_mods();

	class TDL_Opt {

		/**
		 * Cache each request to prevent duplicate queries
		 *
		 * @var array
		 */
		protected static $cached = [];

		/**
		 *  We don't need a constructor
		 */
		private function __construct() {}

		/**
		 * Default values for theme options
		 *
		 * @return array
		 */
		private static function theme_defaults() {
			return [	
				// Global
				'main_bg_color' 								=> '#ffffff',				
			];
		} 

		/**
		 * Switch case for options that need post processing
		 *
		 * @param  [string] $key   [name of option]
		 * @param  [string] $value [value]
		 *
		 * @return [string]        [processed value]
		 */
		private static function processOption($key, $value) {
				$opacity_dark           = .75;
			    $opacity_medium         = .5;
			    $opacity_light          = .2;
			    $opacity_ultra_light    = .1;
			    $opacity_ultra_light_plus    = .05;
				switch ($key) {	
				

				}

				return $value;
		}



		/**
		 * Return the theme option from cache; if it isn't cached fetch it and cache it
		 *
		 * @param  string $option_name 
		 * @param  string $default     
		 *
		 * @return string
		 */
		public static function getOption( $option_name, $default= '' ) {
			/* Return cached if possible */
			if ( array_key_exists($option_name, self::$cached) && empty($default) )
				return self::$cached[$option_name];
			/* If no default is given, fetch from theme defaults variable */
			if (empty($default)) {
				$default = array_key_exists($option_name, self::theme_defaults())? self::theme_defaults()[$option_name] : '';
			}

			$opt= get_theme_mod($option_name, $default);
			// echo '<br/>I did a database query<br/>';
			
			/* Cache the result */
			self::$cached[$option_name]= $opt;

			/* Process the variable */
			if ( $opt !== self::processOption($option_name, $opt) ) {
				self::$cached[$option_name]= self::processOption($option_name, $opt);
			}
			

			return self::$cached[$option_name];
		}
	}





?>