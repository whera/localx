# API Local X

API de integração com o Webservice Local X para PHP 5.3+, deve ser utilizado um Autoloader compatível com a PSR-4.

## Instalação

A instalação desta biblioteca pode ser feita utilizando o [Composer](https://packagist.org/packages/wsw/localx).

## Exemplos básicos

Nesta versão é possível gerenciar:

* Buscar produtos por código, descrição, marca ou grupo (Pode usar todoas os campos em conjunto);


### Credenciais de acesso

Para poder realizar requisições ao Webservice você deve configurar as credenciais de acesso.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use WSW\LocalX\Api;

$Api = new Api('123456', '00000000000000000000000000000000');


```
