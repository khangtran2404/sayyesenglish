<?php

namespace WP_Rocket\Engine\Optimization\RUCSS\Database\Row;

use WP_Rocket\Dependencies\Database\Row;

/**
 * RUCSS UsedCSS Row.
 */
class UsedCSS extends Row {
	/**
	 * UsedCSS constructor.
	 *
	 * @param mixed $item Object Row.
	 */
	public function __construct( $item ) {
		parent::__construct( $item );

		// Set the type of each column, and prepare.
		$this->id             = (int) $this->id;
		$this->url            = (string) $this->url;
		$this->css            = (string) $this->css;
		$this->unprocessedcss = json_decode( $this->unprocessedcss, true );
		$this->retries        = (int) $this->retries;
		$this->is_mobile      = (bool) $this->is_mobile;
		$this->modified       = false === $this->modified ? 0 : strtotime( $this->modified );
		$this->last_accessed  = false === $this->last_accessed ? 0 : strtotime( $this->last_accessed );
	}
}
