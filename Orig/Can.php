<?php //*** Can ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Orig;

class Can
{
	// ◈ === iterate »
	public static function iterate(&$var): bool
	{
		return is_iterable($var);
	}



	// ◈ === string »
	public static function string(&$var): bool
	{
		if (!blank($var)) {

			// @ is scalar [string, integer, float, or boolean]
			if (is_scalar($var)) {
				return true;
			}

			// @ is an object that implements __toString
			if (is_object($var) && method_exists($var, '__toString')) {
				return true;
			}
		}

		return false;
	}

}//> end of class ~ Can