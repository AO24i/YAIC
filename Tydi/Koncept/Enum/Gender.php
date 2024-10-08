<?php //*** Gender ~ enum » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Koncept\Enum;

enum Gender: string
{
	// ◈ case
	case MALE = 'M';
	case FEMALE = 'F';



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
		// NOTE: How to use > Gender::MALE->label();
		return match ($this) {
			self::MALE => 'male',
			self::FEMALE => 'female',
		};
	}



	// ◈ === number »
	public function number(): string
	{
		return match ($this) {
			self::MALE => '1',
			self::FEMALE => '0',
		};
	}

}//> end of enum ~ Gender
