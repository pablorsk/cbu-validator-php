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

    public function	testisValid()
	{
        $this->assertEquals(false, Cbu::isValid('111111111'));
        $this->assertEquals(false, Cbu::isValid('AAAAA0000'));
        $this->assertEquals(false, Cbu::isValid('0720262188000036092117'));
        $this->assertEquals(true,  Cbu::isValid('0720262188000036092118'));
	}
	
    public function	testBankName()
	{
        $this->assertEquals('BANCO SANTANDER RIO S.A.', Cbu::getBankName('0720321188000033530000'));
        $this->assertEquals('', Cbu::getBankName('0000321188000033530718'));
	}	
}