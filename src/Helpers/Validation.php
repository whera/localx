<?php

namespace WSW\LocalX\Helpers;


trait Validation
{

	public function numeric($check) {
		return is_numeric($check);
	}

	public function alphaNumeric($check) {
		if (is_array($check)) {
			extract(self::_defaults($check));
		}

		if (empty($check) && $check != '0') {
			return false;
		}
		return self::_check($check, '/^[\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]+$/Du');
	}


	protected static function _check($check, $regex) {
		if (is_string($regex) && preg_match($regex, $check)) {
			return true;
		}
		return false;
	}

	protected static function _defaults($params) {
		self::_reset();
		$defaults = array(
			'check' => null,
			'regex' => null,
			'country' => null,
			'deep' => false,
			'type' => null
		);
		$params = array_merge($defaults, $params);
		if ($params['country'] !== null) {
			$params['country'] = mb_strtolower($params['country']);
		}
		return $params;
	}

	protected static function _reset() {
		self::$errors = array();
	}
}
