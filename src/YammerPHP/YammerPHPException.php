<?php

namespace YammerPHP;

/**
 * Yammer Exception Class
 */
class YammerPHPException extends \Exception {
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
