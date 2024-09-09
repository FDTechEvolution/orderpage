<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LeaveTransaction
 * 
 * @property string $id
 * @property string $user_id
 * @property Carbon $startdate
 * @property Carbon $enddate
 * @property string $type
 * @property string $description
 * @property float $hour_qty
 * @property float|null $hour_balance
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $approve_date
 * @property string|null $isapproved
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LeaveTransaction extends Model
{
	protected $table = 'leave_transactions';
	public $incrementing = false;

	protected $casts = [
		'startdate' => 'datetime',
		'enddate' => 'datetime',
		'hour_qty' => 'float',
		'hour_balance' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime',
		'approve_date' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'startdate',
		'enddate',
		'type',
		'description',
		'hour_qty',
		'hour_balance',
		'created',
		'modified',
		'approve_date',
		'isapproved',
		'status'
	];
}
