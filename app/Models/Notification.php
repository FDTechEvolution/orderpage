<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property string $user_id
 * @property string $org_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'title',
		'description',
		'user_id',
		'org_id',
		'created',
		'modified',
		'type'
	];
}
