<?php //*** CollectionX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//
namespace App\Spry;

use Illuminate\Support\Collection;

class CollectionX
{

	// • property



	// • ==== is → ... »
	public static function is($collection)
	{
		if ($collection instanceof Collection) {
			return true;
		}
		return false;
	}

}//> end of CollectionX