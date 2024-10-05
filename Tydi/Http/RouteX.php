<?php //*** RouteX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Http;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


class RouteX
{
	// ◈ === as »
	public static function as($route = null, $param = [], $absolute = true)
	{
		if (!empty($route)) {
			if (Route::has($route)) {
				return route($route, $param, $absolute);
			}

			// TODO: improve link handling
			if (!str_starts_with($route, '/')) {
				$route = '/' . $route;
			}
		}
		return $route;
	}



	// ◈ === expired »
	public static function expired($route = 'login', $param = ['status' => 'session-expired'], $absolute = false)
	{
		return self:: as($route, $param, $absolute);
	}

}//> end of class ~ RouteX