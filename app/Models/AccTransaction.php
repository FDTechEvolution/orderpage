<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccTransaction
 * 
 * @property string $id
 * @property Carbon $accdate
 * @property string $type
 * @property float|null $amount
 * @property string|null $iswithdraw
 * @property string|null $user_id
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccTransaction extends Model
{
	protected $table = 'acc_transactions';
	public $incrementing = false;

	protected $casts = [
		'accdate' => 'datetime',
		'amount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'accdate',
		'type',
		'amount',
		'iswithdraw',
		'user_id',
		'description',
		'created',
		'modified'
	];
}
