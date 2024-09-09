<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TimeAttendance
 * 
 * @property string $id
 * @property string $user_id
 * @property string|null $type
 * @property string|null $code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 *
 * @package App\Models
 */
class TimeAttendance extends Model
{
	protected $table = 'time_attendances';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'type',
		'code',
		'latitude',
		'longitude',
		'created',
		'modified',
		'description'
	];
}
