<?php //*** Model ~ abstract » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Tydi\Koncept\Abstract;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Yaic\Tydi\Koncept\Trait\Model as TraitModelX;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
	// ◈ traits
	use HasFactory;
	use SoftDeletes;
	use TraitModelX;


	// ◈ constants
	const CREATED_AT = 'created';
	const UPDATED_AT = 'updated';
	const DELETED_AT = 'deleted';


	// ◈ property
	protected $dates = ['deleted'];



	// ◈ === oCreateX »
	public static function oCreateX($data)
	{
		try {
			$res = parent::oCreate($data);
		} catch (QueryException $e) {
			// TODO: Log error & handle exception | Move to a handler class
			Log::error('Error::DB->Create: ' . $e->getMessage());
			return false;
		}
		return $res;
	}

}//> end of abstract ~ Model