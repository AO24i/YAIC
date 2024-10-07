<?php //*** VarX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Anci;

class VarX
{

	// ◈ === safe »
	public static function safe(&$var = null, $default = '')
	{
		return isset($var) ? $var : $default;
	}

}//> end of class ~ VarX