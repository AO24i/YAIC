<?php //*** Leoms ~ utilizr » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Zero\Utilizr;

use App\Yaic\Xeno\EnvX;
use App\Yaic\Xeno\DebugX;
use App\Yaic\Xeno\File\FileX;
use App\Yaic\Spry\Data\StringX;

class Leoms
{
	// ◈ property
	public static $DS = DIRECTORY_SEPARATOR;
	protected static $layout;
	private static $init;




	// ◈ === init »
	private static function init()
	{
		if (self::$init !== true) {
			self::$layout = strtolower(EnvX::project('layout'));
			self::$init = true;
		}
	}




	// ◈ === isAsset »
	public static function isAsset($file)
	{
		self::init();
		$file = self::$DS . self::$layout . self::$DS . StringX::swap($file, '/', self::$DS);
		return FileX::isPublic($file);
	}




	// ◈ === asset »
	public static function asset($file, $check = false, $trimBase = true)
	{
		self::init();
		if ($check === true) {
			if (!self::isAsset($file)) {
				return false;
			}
		}
		$asset = asset(self::$layout . '/' . $file);
		$baseurl = url('/');
		if ($trimBase === true && !empty($baseurl)) {
			return StringX::cropBegin($asset, $baseurl);
		}
		return $asset;
	}




	// ◈ === favicon »
	public static function favicon($file, $check = true)
	{
		return self::asset('favicon/' . $file, $check);
	}



	// ◈ === image »
	public static function image($file, $check = true)
	{
		return self::asset('image/' . $file, $check);
	}




	// ◈ === js »
	public static function js($file, $check = true)
	{
		return self::asset('js/' . $file, $check);
	}




	// ◈ === css »
	public static function css($file, $check = true)
	{
		return self::asset('css/' . $file, $check);
	}




	// ◈ === path »
	public static function path($option = null)
	{
		if ($option === 'views') {
			return strtolower(EnvX::project('theme')) . '.';
		}
	}




	// ◈ === themePath »
	public static function themePath()
	{
		self::init();
		return strtolower(EnvX::project('theme'));
	}




	// ◈ === layoutPath »
	public static function layoutPath($file = null, $path = null)
	{
		self::init();
		$layout = self::themePath() . '.layout.';
		if (!empty($path)) {
			$layout .= StringX::swap($path, '/', '.') . '.';
		}
		if (!empty($file)) {
			$layout .= $file;
		}
		return $layout;
	}




	// ◈ === layoutBit »
	public static function layoutBit($file = null, $fileAs = 'blade')
	{
		return self::layoutPath(self::fileAs($file, $fileAs), 'bit');
	}




	// ◈ === layoutSlice »
	public static function layoutSlice($file = null, $fileAs = 'blade')
	{
		return self::layoutPath(self::fileAs($file, $fileAs), 'slice');
	}



	// ◈ === layoutNav »
	public static function layoutNav($file = null, $fileAs = 'blade')
	{
		return self::layoutPath(self::fileAs($file, $fileAs), 'nav');
	}




	// ◈ === layoutArea »
	public static function layoutRegion($file = null, $fileAs = 'blade')
	{
		return self::layoutPath(self::fileAs($file, $fileAs), 'region');
	}




	// ◈ === fileAs »
	public static function fileAs($file, $fileAs = 'blade')
	{
		if ($fileAs === 'blade' && StringX::endWith($file, '.blade.php')) {
			$file .= '.blade.php';
		} elseif ($fileAs === 'php' && StringX::endWith($file, '.php')) {
			$file .= '.php';
		}
		return $file;
	}

}//> end of utilizr ~ Leoms