<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCommission
 * 
 * @property string $id
 * @property string $user_id
 * @property Carbon $date
 * @property float $comm_balance
 * @property Carbon|null $created
 * @property Carbon|null $modified
 *
 * @package App\Models
 */
class UserCommission extends Model
{
	protected $table = 'user_commissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'comm_balance' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'date',
		'comm_balance',
		'created',
		'modified'
	];
}
