<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Org
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property string|null $isactive
 * @property string $mobileno
 * @property string|null $code
 * @property string|null $line_notify_token
 * @property string|null $user_id
 * @property string|null $isperfect
 * @property string|null $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Org extends Model
{
	protected $table = 'orgs';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $hidden = [
		'line_notify_token'
	];

	protected $fillable = [
		'name',
		'created',
		'modified',
		'description',
		'isactive',
		'mobileno',
		'code',
		'line_notify_token',
		'user_id',
		'isperfect',
		'address'
	];
}
