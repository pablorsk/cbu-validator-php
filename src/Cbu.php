<?php
/**
 * Cbu
 *
 * @author Pablo Gabriel Reyes
 * @link https://pabloreyes.com.ar/ Blog
 * @link https://github.com/pablorsk/cbu-validator-php CBU validator on GitHub
 * @version 1.0.0
 * 
 * Basado en Toba (https://repositorio.siu.edu.ar/)
 */

class Cbu
{
	public static function isValid($cbu)
	{
		// Estrictamente sólo 22 números
		if (!preg_match('/[0-9]{22}/', $cbu))
			return false;
		
		$digitos_cbu = str_split($cbu);
		if ($digitos_cbu[7] <> self::_verif($digitos_cbu, 0, 6))
			return false;
		if ($digitos_cbu[21] <> self::_verif($digitos_cbu, 8, 20))
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
	private function _verif($numero, $pos_inicial, $pos_final){
		$ponderador = array(3,1,7,9);
		$suma = 0;
		$j = 0;
		for ($i = $pos_final; $i >= $pos_inicial; $i--)
		{
			$suma = $suma + ($numero[$i] * $ponderador[$j % 4]);
			$j++;
		}
		$digito = (10 - $suma % 10) % 10;
		return $digito;
	}
}