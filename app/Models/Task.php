<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * 
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property string|null $user_id
 * @property Carbon|null $duedate
 * @property string|null $status
 * @property string|null $log
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property string|null $tmp_product_id
 * @property string|null $product_id
 * @property string|null $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Task extends Model
{
	protected $table = 'tasks';
	public $incrementing = false;

	protected $casts = [
		'duedate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'title',
		'description',
		'user_id',
		'duedate',
		'status',
		'log',
		'created',
		'modified',
		'createdby',
		'modifiedby',
		'tmp_product_id',
		'product_id',
		'order_id'
	];
}
