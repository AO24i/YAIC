<?php //*** RouteX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Http;

use App\Yaic\Tydi\Data\StringX;
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



	// ◈ === wire »
	public static function wire($action = null, $component = null, $absolute = true)
	{
		$route = '';
		$wireRoute = Session::get('wireRoute');
		if (!empty($wireRoute)) {
			if (StringX::contain($wireRoute, '-')) {
				if (empty($component)) {
					$component = StringX::before($wireRoute, '-');
				}
			}
		}

		if (!empty($component)) {
			$route .= $component;
		}

		if (!empty($action)) {
			if (!empty($action)) {
				$route .= '-';
			}
			$route .= $action;
		}

		if ($route === $wireRoute) {
			// TODO: do refresh instead
		}

		return self:: as($route, [], $absolute);
	}

}//> end of class ~ RouteX