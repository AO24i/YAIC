<?php //*** VarX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Anci;

class VarX
{
	// ◈ === is » boolean
	public static function is(&$var = null, $comparison = null, $strickCheck = false)
	{
		if (is_null($var)) {
			return false;
		}
		if (is_null($comparison)) {
			if ($var === 0) {
				return true;
			}
			if (!empty($var)) {
				return true;
			}
		}
		// TODO: implement code for comparison & strick check
		return false;
	}





	// ◈ === safe »
	public static function safe(&$var = null, $default = '')
	{
		return isset($var) ? $var : $default;
	}

}//> end of class ~ VarX