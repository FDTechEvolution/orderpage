<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivity
 * 
 * @property string $id
 * @property string $user_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 *
 * @package App\Models
 */
class UserActivity extends Model
{
	protected $table = 'user_activities';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'created',
		'modified',
		'description'
	];
}
