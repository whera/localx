<?php

namespace WSW\LocalX\Helpers;

trait Request
{
	private $userAgent = 'API WSW 1.0';
	private $url       = 'https://localx.com.br:555/datasnap/rest/TServicos/ListarProdutos/';

	public function sendRequest(array $arrData = array(), $strClient = null, $strToken = null)
	{
		$cURL = curl_init($this->url."{$strClient}/{$strToken}/");
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURL, CURLOPT_POST, true);
		curl_setopt($cURL, CURLOPT_POSTFIELDS, json_encode($arrData));
		curl_setopt($cURL, CURLOPT_USERAGENT, $this->userAgent." - Cliente: {$strClient}");

		$resultado = curl_exec($cURL);
		$server    = curl_getinfo($cURL, CURLINFO_HTTP_CODE);

		curl_close($cURL);

		if($server <> 200){
			throw new \UnexpectedValueException('Ops!! Web Service Indisponível. Tente novamente mais tarde');
		}

		return $resultado;
	}
}