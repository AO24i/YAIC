<?php //*** VarX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//
namespace App\Spry;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class VarX
{

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
