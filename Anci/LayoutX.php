<?php //*** LayoutX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Anci;

use App\Yaic\Xena\Data\StringX;

class LayoutX
{
	// ◈ property
	private static $init;
	private static $theme;



	// ◈ === theme »
	public static function theme($file = null)
	{
		return self::path('theme', $file);
	}



	// ◈ === page »
	public static function page($file = null)
	{
		return self::path('page', $file);
	}



	// ◈ === layout »
	public static function layout($file = null)
	{
		return self::path('layout', $file);
	}



	// ◈ === bit »
	public static function bit($file = null)
	{
		return self::layout('bit.' . $file);
	}



	// ◈ === region »
	public static function region($file = null)
	{
		return self::layout('region.' . $file);
	}



	// ◈ === piece »
	public static function piece($file = null)
	{
		return self::layout('piece.' . $file);
	}



	// ◈ === form »
	public static function form($file = null)
	{
		return self::piece('form.' . $file);
	}



	// ◈ === slice »
	public static function slice($file = null)
	{
		return self::piece('slice.' . $file);
	}



	// ◈ === slab »
	public static function slab($file, $path = null, $component = null)
	{
		$file = 'slab.' . $file;
		if (!empty($component)) {
			$file = $component . '.' . $file;
		}
		if (!empty($path)) {
			$paths = ['page'];
			if (in_array($path, $paths)) {
				$file = self::{$path}($file);
			}
		}
		return $file;
	}



	// ◈ === nav »
	public static function nav($file = null)
	{
		return self::piece('nav.' . $file);
	}



	// ◈ === navSidebar »
	public static function navSidebar($file = null)
	{
		return self::nav('side.' . $file);
	}



	// ◈ === navTopbar »
	public static function navTopbar($file = null)
	{
		return self::nav('top.' . $file);
	}



	// ◈ === path »
	protected static function path($path, $file = null)
	{
		self::init();
		$location = self::$theme;
		if (in_array($path, ['page', 'layout'])) {
			$location .= ".{$path}.";
		} elseif ($path != 'theme') {
			// NOTE: repetitive [makeshift] - feature is TODO
			$location .= '.' . $path;
		}
		$location .= $file;
		return self::format($location);
	}



	// ◈ === format »
	private static function format($path)
	{
		if (!empty($path)) {
			$path = StringX::swap($path, '/', '.');
		}
		return $path;
	}



	// ◈ === init »
	private static function init()
	{
		if (self::$init !== true) {
			self::$theme = strtolower(EnvX::project('theme'));
			self::$init = true;
		}
	}

}//> end of class ~ LayoutX