<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentSlip
 * 
 * @property string $id
 * @property string $payment_id
 * @property string $path
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PaymentSlip extends Model
{
	protected $table = 'payment_slips';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'payment_id',
		'path',
		'created',
		'modified'
	];
}
