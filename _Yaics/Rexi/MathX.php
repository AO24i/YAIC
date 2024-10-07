<?php //*** MathX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//
namespace App\Spry;

class MathX
{

	// • ==== call → handler - undefined method » error
	public function __call($method, $argument)
	{
		$caller = __CLASS__ . '→' . $method . '()';
		return DebugX::oversight(__CLASS__, 'Method Unreachable', $caller);
	}





	// • ==== callStatic → handler - undefined static method » error
	public static function __callStatic($method, $argument)
	{
		$caller = __CLASS__ . '::' . $method . '()';
		return DebugX::oversight(__CLASS__, 'Static: Method Unreachable', $caller);
	}





	// • ==== isEven • Check if number is Even » Boolean
	public static function isEven($number)
	{
		if ($number % 2 == 0) {
			return true;
		}
		return false;
	}





	// • ==== isOdd • Check if number is Odd » Boolean
	public static function isOdd($number)
	{
		if (!self::isEven($number)) {
			return true;
		}
		return false;
	}

} //> end of MathX