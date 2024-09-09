<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountMemo
 * 
 * @property string $id
 * @property string|null $type
 * @property Carbon $docdate
 * @property string $isexpend
 * @property float|null $amount
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $product_category_id
 * @property string|null $product_id
 * @property string|null $account_memo_type_id
 * @property string|null $org_id
 * @property string|null $sales_channel_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccountMemo extends Model
{
	protected $table = 'account_memos';
	public $incrementing = false;

	protected $casts = [
		'docdate' => 'datetime',
		'amount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'type',
		'docdate',
		'isexpend',
		'amount',
		'description',
		'created',
		'modified',
		'product_category_id',
		'product_id',
		'account_memo_type_id',
		'org_id',
		'sales_channel_id',
		'user_id'
	];
}
