<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Otp
 * 
 * @property string $id
 * @property string $user_id
 * @property string $code
 * @property string $refcode
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $status
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Otp extends Model
{
	protected $table = 'otps';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'code',
		'refcode',
		'created',
		'modified',
		'status',
		'description'
	];
}
