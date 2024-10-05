<?php //*** App ~ organizer » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Vine\Organizer;

use App\Yaic\Tydi\Http\RouteX;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class App extends Controller
{
	// ◈ === index »
	public static function index()
	{
		$route = RouteX:: as('login');
		if (Auth::check()) {
			$route = RouteX:: as('dashboard');
		}
		return redirect($route);
	}

}//> end of organizer ~ App