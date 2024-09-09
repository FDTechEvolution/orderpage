<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Time2Attendance
 * 
 * @property string $id
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property Carbon|null $authentication
 * @property Carbon|null $authen_date
 * @property string|null $directind
 * @property string|null $personname
 * @property string|null $cardno
 *
 * @package App\Models
 */
class Time2Attendance extends Model
{
	protected $table = 'time2_attendances';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime',
		'authentication' => 'datetime',
		'authen_date' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'type',
		'code',
		'latitude',
		'longitude',
		'created',
		'modified',
		'description',
		'authentication',
		'authen_date',
		'directind',
		'personname',
		'cardno'
	];
}
