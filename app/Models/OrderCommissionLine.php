<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderCommissionLine
 * 
 * @property string $id
 * @property string $order_id
 * @property string|null $user_commission_id
 * @property float|null $rate
 * @property float|null $amount
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $isposted
 * @property string|null $user_id
 * @property Carbon $docdate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderCommissionLine extends Model
{
	protected $table = 'order_commission_lines';
	public $incrementing = false;

	protected $casts = [
		'rate' => 'float',
		'amount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime',
		'docdate' => 'datetime'
	];

	protected $fillable = [
		'order_id',
		'user_commission_id',
		'rate',
		'amount',
		'created',
		'modified',
		'isposted',
		'user_id',
		'docdate'
	];
}
