<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MobileNumber
 * 
 * @property string $id
 * @property string $mobileno
 * @property string|null $description
 * @property Carbon|null $expiredate
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $status
 *
 * @package App\Models
 */
class MobileNumber extends Model
{
	protected $table = 'mobile_numbers';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiredate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'mobileno',
		'description',
		'expiredate',
		'created',
		'modified',
		'status'
	];
}
