Librería PHP para validar CBU (Argentina)
=========================================

Esta es una libería PHP para validar los códigos bancarios uniformes (CBU) utilizados para las cuentas bancarias de Argentina.

-----------

## Instalación

Vía Composer

```javascript
composer require pablorsk/cbu-validator-php
```

## Ejemplo

```php
	if (Cbu::isValid('1111111111111'))
		echo 'CBU correcto';
	else
		echo 'CBU incorrecto';

	// print "BANCO SANTANDER RIO S.A."
	echo Cbu::getBankName('0720321188000033530000');
```

## License

The MIT License (MIT)
