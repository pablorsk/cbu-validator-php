<?php
/**
 * Permite validar los CBU (Clave Bancaria Uniforme), Argentina.
 *
 * @author Pablo Gabriel Reyes
 * @link https://pabloreyes.com.ar/ Blog
 * @link https://github.com/pablorsk/cbu-validator-php CBU validator on GitHub
 * @version 1.0.0
 * 
 * Basado en Toba, de https://repositorio.siu.edu.ar/
 */

class Cbu
{
	/**
	 * Devuelve true si el CBU $cbu es válido.
	 * Controla longitud, caracteres y número verificador de acuerdo a lo 
	 * expuesto por Banco Central Argentino (http://www.bcra.gov.ar/pdfs/snp/SNP3002.pdf)
	 * 
	 * @param string $cbu
	 * @return boolean 
	 */
	public static function isValid($cbu)
	{
		// Estrictamente sólo 22 números
		if (!preg_match('/[0-9]{22}/', $cbu))
			return false;
		
		$arr = str_split($cbu);
		if ($arr[7] <> self::getDigitoVerificador($arr, 0, 6))
			return false;
		if ($arr[21] <> self::getDigitoVerificador($arr, 8, 20))
			return false;
		
		return true;
	}
	
	/**
	 * Devuelve el dígito verificador para los dígitos de las posiciones "pos_inicial" a "pos_final" 
	 * de la cadena "$numero" usando clave 10 con ponderador 9713
	 *
	 * @param array $numero arreglo de digitos
	 * @param integer $pos_inicial
	 * @param integer $pos_final 
	 * @return integer digito verificador de la cadena $numero
	 */
	private function getDigitoVerificador($numero, $pos_inicial, $pos_final)
	{
		$ponderador = array(3,1,7,9);
		$suma = 0;
		$j = 0;
		for ($i = $pos_final; $i >= $pos_inicial; $i--)
		{
			$suma = $suma + ($numero[$i] * $ponderador[$j % 4]);
			$j++;
		}
		return (10 - $suma % 10) % 10;
	}
	
	/**
	 * @param string $cbu
	 * @return string
	 */
	public function getBankId($cbu)
	{
		return substr($cbu, 0, 3);
	}
	
	/**
	 * @param string $cbu_or_id
	 * @return string
	 */
	public function getBankName($cbu_or_id)
	{
		include_once '../resources/banksarray.inc.php';
		$id = self::getBankId($cbu_or_id);
		if (!isset($banksarray[$id]))
			return '';
		return $banksarray[$id];
	}
}