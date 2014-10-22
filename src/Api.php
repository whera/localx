<?php

namespace WSW\LocalX;


class Api
{

	use Helpers\Validation;
	use Helpers\Request;

	private $User;
	private $Token;
	private $Data = array();


	public function __construct($user = null, $token = null)
	{
		if(!extension_loaded('curl')){
  			throw new \BadFunctionCallException('Extensão CURL não esta carregada no seu PHP');
		}

		if(!$this->numeric($user)) {
			throw new \InvalidArgumentException('O campo USER deve ser numérico');
		}

		if(!$this->alphaNumeric($token) OR strlen($token) !== 32) {
			throw new \InvalidArgumentException('O campo TOKEN deve ser alfanumérico e conter 32 caracteres');
		}

		$this->User = (int) $user;
		$this->Token = $token; 
	}


	public function find(array $data = array())
	{
		if(count($data) === 0){
			throw new \InvalidArgumentException('Informe os parametros para efetuar a busca');
		}
		$this->Data = $data;

		return $this->_send();
	}


	private function _send(){

		return $this->sendRequest($this->Data, $this->User, $this->Token);
	
	}

}