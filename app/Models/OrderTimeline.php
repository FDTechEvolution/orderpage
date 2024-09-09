<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTimeline
 * 
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderTimeline extends Model
{
	protected $table = 'order_timelines';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'title',
		'description',
		'created',
		'modified',
		'user_id'
	];
}
