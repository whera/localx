# API Local X [![Build Status]https://travis-ci.org/whera/localx.svg?branch=master)](https://travis-ci.org/whera/localx)

API de integração com o Webservice Local X para PHP 5.3+, deve ser utilizado um Autoloader compatível com a PSR-4.

## Instalação

A instalação desta biblioteca pode ser feita utilizando o [Composer](https://packagist.org/packages/wsw/localx).

## Exemplos básicos

Nesta versão é possível gerenciar:

* Buscar produtos por código, descrição, marca ou grupo (Podendo utilizar todoas os campos em conjunto);


### Credenciais de acesso

Para poder realizar requisições ao Webservice você deve configurar as credenciais de acesso.
* Código do cliente (int) 
* Token Secreto (string) 

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use WSW\LocalX\Api;

$Api = new Api('123456', '00000000000000000000000000000000');


```


### Buscar produtos

Efetuar busca de produtos no webservice

```php

<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use WSW\LocalX\Api;

try {

  $api = new WSW\LocalX\Api("00000", '00000000000000000000000000000000');

  $search = array(
    'codigo' => '018795-4',
    'descricao' => 'FONTE SENTEY',
    'marca' => 'SENTEY',
    'grupo' => 'FONTES'
  );

	$result = $api->find($search);

	var_dump(json_decode($result));



} catch (Exception $e) {
	echo $e->getMessage();
}


```

### Retorno

Os dados retornados vem em forma de [JSON](http://json.org/)


### Licença de uso

Esta biblioteca segue os termos de uso da [The MIT License (MIT)](http://opensource.org/licenses/MIT)
