<?php //*** PathX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Anci;


class PathX
{
	// ◈ property
	public static $DS;
	public static $init;




	// ◈ === init »
	public static function init()
	{
		if (self::$init !== true) {
			self::$DS = DIRECTORY_SEPARATOR;
			self::$init = true;
		}
	}



	// ◈ === app »
	public static function app(string $path = '')
	{
		return app_path($path);
	}




	// ◈ === base »
	public static function base(string $path = '')
	{
		return base_path($path);
	}




	// ◈ === config »
	public static function config(string $path = '')
	{
		return config_path($path);
	}



	// ◈ === database »
	public static function database(string $path = '')
	{
		return database_path($path);
	}



	// ◈ === lang »
	public static function lang(string $path = '')
	{
		return lang_path($path);
	}



	// ◈ === public »
	public static function public(string $path = '')
	{
		return public_path($path);
	}




	// ◈ === resource »
	public static function resource(string $path = '')
	{
		return resource_path($path);
	}




	// ◈ === storage »
	public static function storage(string $path = '')
	{
		return storage_path($path);
	}



	// ◈ === route »
	public static function route()
	{
		self::init();
		return self::base() . self::$DS . 'routes' . self::$DS;
	}




	// ◈ === zero »
	public static function zero(string $path = null)
	{
		self::init();
		if ($path === 'route') {
			$path = self::route() . 'zero' . self::$DS;
		}
		return $path;
	}


}//> end of class ~ PathX