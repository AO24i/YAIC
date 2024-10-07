<?php //*** Gender ~ option » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Koncept\Option;

use App\Yaic\Tydi\Koncept\Enum\Gender as GenderEnum;

class Gender
{
	// ◈ === option »
	public static function option(): array
	{
		$options = [];
		foreach (GenderEnum::cases() as $case) {
			$options[$case->value] = ucfirst($case->label());
		}
		return $options;
	}

}//> end of option ~ Gender
