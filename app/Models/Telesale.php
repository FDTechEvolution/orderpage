<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Telesale
 * 
 * @property string $id
 * @property Carbon $docdate
 * @property string|null $order_id
 * @property string|null $tmp_order_id
 * @property string|null $user_id
 * @property string $status
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $customer_id
 * @property string $org_id
 *
 * @package App\Models
 */
class Telesale extends Model
{
	protected $table = 'telesales';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'docdate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'docdate',
		'order_id',
		'tmp_order_id',
		'user_id',
		'status',
		'description',
		'created',
		'modified',
		'customer_id',
		'org_id'
	];
}
