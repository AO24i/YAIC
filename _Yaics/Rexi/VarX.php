<?php //*** VarX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//
namespace App\Spry;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class VarX
{

	// • ==== isObject → ... » boolean
	public static function isObject($var)
	{
		if (is_object($var)) {
			return true;
		}
		return false;
	}





	// • ==== isLaravelModel → ... » boolean
	public static function isModel($var)
	{
		if (self::isObject($var) && $var instanceof Model) {
			return true;
		}
		return false;
	}




	// • ==== isCollection → ... » boolean
	public static function isCollection($var)
	{
		if ($var instanceof Collection) {
			return true;
		}
		return false;
	}





	// • ==== isStringable → ... » boolean
	public static function isStringable($var)
	{
		if (is_string($var)) {
			return true;
		}
		return false;
	}







	// • ==== isEmpty → ... » boolean
	public static function isEmpty(&$var)
	{
		// if (self::isLaravelModel($var) && property_exists($var, 'exists') && !$var->exists) {
		// 	return true;
		// }
		// return false;
		if (!isset($var)) {
			return true;
		}

		if (self::isObject($var) && empty($var)) {
			return true;
		}

		if (is_array($var) && empty($var)) {
			return true;
		}

		if (self::isCollection($var) && $var->isEmpty()) {
			return true;
		}

		if (is_string($var) && $var == '') {
			return true;
		}

		return false;
	}





	// • ==== arrayObject • ... »
	public static function appendObject(&$var, $data)
	{
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				$var->${$key} = $value;
			}
		}
	}

} //> end of VarX
