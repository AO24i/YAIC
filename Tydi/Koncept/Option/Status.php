<?php //*** Status ~ option » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Koncept\Option;

use App\Yaic\Tydi\Data\StringX;
use App\Yaic\Tydi\Koncept\Enum\Status as StatusEnum;

class Status
{
	// ◈ === option »
	public static function option($options = []): array
	{
		foreach (StatusEnum::cases() as $case) {
			$options[$case->value] = StringX::sentenceCase($case->label());
		}
		return $options;
	}

}//> end of option ~ Status
