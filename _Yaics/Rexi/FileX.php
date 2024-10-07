<?php	//*** FileX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Spry;

use Illuminate\Support\Facades\View;

class FileX
{
	// • property






	// • === isBlade → ... »
	public static function isBlade($blade)
	{
		if (View::exists($blade)) {
			return true;
		}
		return false;
	}

}//> end of FileX