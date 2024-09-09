<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsTransactionLine
 * 
 * @property string $id
 * @property string $goods_transaction_id
 * @property string $product_id
 * @property float|null $qty
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class GoodsTransactionLine extends Model
{
	protected $table = 'goods_transaction_lines';
	public $incrementing = false;

	protected $casts = [
		'qty' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'goods_transaction_id',
		'product_id',
		'qty',
		'description',
		'created',
		'modified'
	];
}
