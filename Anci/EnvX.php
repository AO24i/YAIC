<?php //*** EnvX ~ class » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Anci;

use App\Yaic\Anci\DebugX;
use App\Yaic\Xena\Data\StringX;

class EnvX
{
	// ◈ property
	private static $init = false;
	private static $env;
	private static $firm;
	private static $project;
	private static $developer;



	// ◈ === call »
	public function __call($method, $argument)
	{
		return DebugX::unreachable(__CLASS__, $method, $argument, 'instance');
	}



	// ◈ === callStatic »
	public static function __callStatic($method, $argument)
	{
		return DebugX::unreachable(__CLASS__, $method, $argument, 'static');
	}



	// ◈ === is »
	public static function is($env = null)
	{
		if ($env === null) {
			return self::$env;
		}

		if (!empty($env) && is_string($env)) {
			self::init();
			if (self::$env === strtolower($env)) {
				return true;
			}
		}

		return false;
	}



	// ◈ === isDev »
	public static function isDev()
	{
		return self::is('local');
	}



	// ◈ === isStage »
	public static function isStage()
	{
		return self::is('staging');
	}



	// ◈ === isProd »
	public static function isProd()
	{
		return self::is('production');
	}



	// ◈ === firm »
	public static function firm($key = null)
	{
		self::init();
		if (is_object(self::$firm)) {
			if (!is_null($key) && property_exists(self::$firm, $key)) {
				return self::$firm->{$key};
			} elseif (is_null($key)) {
				return self::$firm;
			}
		}
		return null;
	}



	// ◈ === project »
	public static function project($key = null)
	{
		self::init();
		if (is_object(self::$project)) {
			if (!is_null($key) && property_exists(self::$project, $key)) {
				return self::$project->{$key};
			} elseif (is_null($key)) {
				return self::$project;
			}
		}
		return null;
	}



	// ◈ === developer »
	public static function developer($key = null)
	{
		self::init();
		if (is_object(self::$developer)) {
			if (!is_null($key) && property_exists(self::$developer, $key)) {
				return self::$developer->{$key};
			} elseif (is_null($key)) {
				return self::$developer;
			}
		}
		return null;
	}



	// ◈ === vars » get all values in .env
	public static function vars()
	{
		$path = PathX::base('.env');
		if (!file_exists($path)) {
			return [];
		}
		$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$vars = [];
		$multi = '';
		list($label, $value) = [null, null];
		foreach ($lines as $index => $line) {
			if (empty($line) || $line[0] === '#') {
				unset($lines[$index]);
				continue;
			}
			$multi .= self::singleLine($lines, $index, $line, $label, $value);
			if (isset($label)) {
				$vars[$label] = $value;
			}
		}
		self::multiLine($multi, $vars);
		return $vars;
	}



	// ◈ === init »
	private static function init()
	{
		if (!self::$init) {
			self::$env = strtolower(App::environment());
			self::$init = true;

			// @ firm
			self::$firm = env('firm');
			if (!empty(self::$firm)) {
				self::$firm = StringX::toObject(self::$firm, ';', '=');
			}

			// @ project
			self::$project = env('project');
			if (!empty(self::$project)) {
				self::$project = StringX::toObject(self::$project, ';', '=');
			}

			// @ developer
			self::$developer = env('developer');
			if (!empty(self::$developer)) {
				self::$developer = StringX::toObject(self::$developer, ';', '=');
			}
		}
	}



	// ◈ === subLineToArray »
	private static function subLineToArray($string)
	{
		$result = [];
		$pairs = explode(';', $string);
		foreach ($pairs as $pair) {
			$pair = trim($pair);
			if (!$pair) {
				continue;
			}
			list($key, $value) = explode('=', $pair, 2);
			$key = trim($key);
			$value = isset($value) ? trim($value) : '';
			if ($key !== '') {
				$result[$key] = $value;
			}
		}
		return $result;
	}



	// ◈ === multiLine »
	private static function multiLine($lines, &$array = [])
	{
		$pattern = '/(\w+)=(?:"(.*?)"|(true|false|\d+|[\w\-.]+))/';
		preg_match_all($pattern, $lines, $matches, PREG_SET_ORDER);
		foreach ($matches as $match) {
			$key = $match[1];
			$value = $match[2] !== '' ? $match[2] : ($match[3] !== '' ? $match[3] : $match[4]);
			$array[$key] = self::subLineToArray($value);
		}
	}



	// ◈ === singleLine »
	private static function singleLine(&$lines, $index, $line, &$label, &$value)
	{
		if (StringX::contain($line, '="') && StringX::endWith($line, '"') && !StringX::endWith($line, '="')) {
			$label = StringX::before($line, '="');
			$value = StringX::cropEnd(StringX::after($line, '="'), '"');
			unset($lines[$index]);
		} elseif (StringX::contain($line, '=') && !StringX::endWithAny($line, [';', '="'])) {
			$label = StringX::before($line, '=');
			$value = StringX::after($line, '=');
			unset($lines[$index]);
		} else {
			return trim($line);
		}
	}

}//> end of class ~ EnvX