<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountTran
 * 
 * @property string $id
 * @property string $org_id
 * @property string|null $order_id
 * @property string|null $user_id
 * @property string|null $account_item_id
 * @property Carbon|null $created
 * @property string|null $description
 * @property float|null $creditamt
 * @property float|null $debitamt
 * @property string $trans_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccountTran extends Model
{
	protected $table = 'account_trans';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'creditamt' => 'float',
		'debitamt' => 'float'
	];

	protected $fillable = [
		'org_id',
		'order_id',
		'user_id',
		'account_item_id',
		'created',
		'description',
		'creditamt',
		'debitamt',
		'trans_code'
	];
}
