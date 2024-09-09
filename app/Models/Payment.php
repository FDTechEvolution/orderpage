<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property string $id
 * @property string $order_id
 * @property string $org_id
 * @property string|null $status
 * @property float|null $totalamount
 * @property float|null $netamount
 * @property float|null $vatamount
 * @property float|null $transaction_fee
 * @property float|null $commission_fee
 * @property float|null $discountamount
 * @property float|null $receiptamount
 * @property string $payment_method
 * @property Carbon $docdate
 * @property Carbon|null $paiddate
 * @property string|null $bank_account_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';
	public $incrementing = false;

	protected $casts = [
		'totalamount' => 'float',
		'netamount' => 'float',
		'vatamount' => 'float',
		'transaction_fee' => 'float',
		'commission_fee' => 'float',
		'discountamount' => 'float',
		'receiptamount' => 'float',
		'docdate' => 'datetime',
		'paiddate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'order_id',
		'org_id',
		'status',
		'totalamount',
		'netamount',
		'vatamount',
		'transaction_fee',
		'commission_fee',
		'discountamount',
		'receiptamount',
		'payment_method',
		'docdate',
		'paiddate',
		'bank_account_id',
		'created',
		'modified',
		'createdby',
		'modifiedby',
		'description'
	];
}
