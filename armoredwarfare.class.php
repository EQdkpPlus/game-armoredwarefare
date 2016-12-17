<?php

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('armoredwarfare')) {
	class armoredwarfare extends game_generic {
		protected static $apiLevel = 20;
		public $version			= '0.18';
		protected $this_game	= 'armoredwarfare';
		public $author			= "Strange_thing";
		protected $types		= array('classes', 'filters', 'roles');
		public $langs			= array('german');
		protected $classes			= array();


		protected $class_dependencies = array(
			array(
				'name'		=> 'class',
				'type'		=> 'classes',
				'admin'		=> false,
				'decorate'	=> true,
				'primary'	=> true,
				'colorize'	=> true,
				'roster'	=> true,
				'recruitment' => true,
				'parent'	=> false,
			),

		);

	public $default_roles = array(
			1 	=> array(0,1,2,3,4,5),			# Heiler
			2 	=> array(0,1,2,3,4,5),			# DPS
			3	=> array(0,1,2,3,4,5),			# Support
			4 	=> array(0,1,2,3,4,5),			# Tank
		);

		protected $class_colors = array(
			1	=> '#00FF00', 	# grün
			2	=> '#FF0000', 	# rot
			3	=> '#0000FF',	# blau
			4	=> '#000000',	# schwarz
			5	=> '#FFFFFF',	# weiß
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path		= '';
		protected $filters		= array();
		public $lang			= false;


		/* Constructor */
		public function __construct() {
			parent::__construct();
		}

		/* Install or Game Change Information */
		public function install($install=false){
			$info = array();
			return $info;


			//Links
			//$this->game->addLink('EQDKP Webseite', 'http://eqdkp-plus.eu/');

			//Ranks
			$this->game->addRank(0, "Guildmaster");
			$this->game->addRank(1, "Officer");
			$this->game->addRank(2, "Veteran");
			$this->game->addRank(3, "Member", true);
			$this->game->addRank(4, "Buddy" );
			$this->game->addRank(5, "Dummy Rank #1");
		}

		/**
		* Initialises filters
		*
		* @param array $langs
		*/
		protected function load_filters($langs){
			if(!$this->classes) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$this->lang];
				$this->filters[$lang][] = array('name' => '-----------', 'value' => false);
				foreach($names as $id => $name) {
					$this->filters[$lang][] = array('name' => $name, 'value' => 'class:'.$id);
				}
			}
		}

	}#class
}
?>