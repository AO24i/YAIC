<?php //*** Status ~ enum » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Koncept\Enum;

enum Status: string
{
	// ◈ case
	case ACTIVE = 'ACTIVE';
	case SHELVED = 'SHELVED';



	// ◈ === toArray »
	public static function toArray(): array
	{
		$gender = [];
		foreach (self::cases() as $case) {
			$gender[$case->name] = $case->value;
		}
		return $gender;
	}



	// ◈ === toObject »
	public static function toObject(): object
	{
		return (object) self::toArray();
	}



	// ◈ === label »
	public function label(): string
	{
		return match ($this) {
			self::ACTIVE => 'active',
			self::SHELVED => 'shelved',
		};
	}

}//> end of enum ~ Status
