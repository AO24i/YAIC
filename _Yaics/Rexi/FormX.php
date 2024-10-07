<?php //*** FormX » Tydi™ Framework © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//
namespace App\Spry;

class FormX
{

	// • property





	// • ==== label → ... »
	public static function label($label)
	{
		$label = StringX::contain($label, '.') ? StringX::afterLast($label, '.') : $label;
		return ucwords($label);
	}





	// • ==== id → ... »
	public static function id($id)
	{
		return StringX::swap($id, '.', '_');
	}





	// • ==== placeholder → ... »
	public static function placeholder($placeholder = null)
	{
		if (!empty($placeholder)) {
			$placeholder = ucwords(trim($placeholder)) . '...';
		}
		return $placeholder;
	}

}//> end of FormX