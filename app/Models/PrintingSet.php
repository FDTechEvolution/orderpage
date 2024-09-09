<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PrintingSet
 * 
 * @property string $id
 * @property string $user_id
 * @property string $shipping_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $status
 * @property string|null $description
 * @property string $org_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PrintingSet extends Model
{
	protected $table = 'printing_sets';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'shipping_id',
		'created',
		'modified',
		'status',
		'description',
		'org_id'
	];
}
