<?php

namespace WSW\LocalX;

class ApiTest extends \PHPUnit_Framework_TestCase
{

	public function testVerificaTipoClasse()
	{
		$class = new Api(123123123, 'ewewewewewewewewewewewwewewewewe');

		$this->assertInstanceOf('\WSW\LocalX\Api', $class);
	}
}