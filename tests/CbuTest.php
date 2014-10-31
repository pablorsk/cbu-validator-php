<?php

/**
 * This class doesn't do much yet..
 *
 * @author Pablo Gabriel Reyes
 * @link https://pabloreyes.com.ar/ Blog
 * @link https://github.com/pablorsk/cbu-validator-php CBU validator on GitHub
 * @version 1.0.0
 */
class CbuTest extends PHPUnit_Framework_TestCase
{
    protected $person = null;

    public function	testValidar()
	{
        $this->assertEquals(false, Cbu::validar('111111111'));
        $this->assertEquals(false, Cbu::validar('AAAAA0000'));
        $this->assertEquals(false, Cbu::validar('0720262188000036092117'));
        $this->assertEquals(true,  Cbu::validar('0720262188000036092118'));
	}
	
}