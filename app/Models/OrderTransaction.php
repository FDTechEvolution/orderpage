<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTransaction
 * 
 * @property string $id
 * @property string $code
 * @property string|null $description
 * @property string $user_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderTransaction extends Model
{
	protected $table = 'order_transactions';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'code',
		'description',
		'user_id',
		'created',
		'modified',
		'order_id'
	];
}
