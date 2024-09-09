<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Income
 * 
 * @property string $id
 * @property string $user_id
 * @property float $amount
 * @property string $income_category_id
 * @property string $isrevenue
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property string|null $slip
 * @property string|null $paymentmethod
 * @property Carbon|null $docdate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Income extends Model
{
	protected $table = 'incomes';
	public $incrementing = false;

	protected $casts = [
		'amount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime',
		'docdate' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'income_category_id',
		'isrevenue',
		'created',
		'modified',
		'description',
		'slip',
		'paymentmethod',
		'docdate'
	];
}
