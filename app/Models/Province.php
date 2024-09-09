<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Province
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $name_en
 * @property int $geoid
 * @property string|null $zone
 * @property float|null $cost_kerry
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Province extends Model
{
	protected $table = 'provinces';

	protected $casts = [
		'geoid' => 'int',
		'cost_kerry' => 'float'
	];

	protected $fillable = [
		'code',
		'name',
		'name_en',
		'geoid',
		'zone',
		'cost_kerry'
	];
}
