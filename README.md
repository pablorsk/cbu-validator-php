Librería PHP para validar CBU (Argentina)
=========================================

Esta es una libería PHP para validar los códigos bancarios uniformes (CBU) utilizados para las cuentas bancarias de Argentina.

-----------

## Instalación

### Composer

#### Instalar Composer

```bash
curl -sS https://getcomposer.org/installer | php
```

#### Agregar CBU Validator via Composer

Agrega a tu archivo composer.json:

```javascript
{
    ...
    "require": {
        ...
        "pablorsk/cbu-validator-php": "dev-master"
    }
    ...
}
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

Copyright (c) 2014 Pablo Gabriel Reyes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.