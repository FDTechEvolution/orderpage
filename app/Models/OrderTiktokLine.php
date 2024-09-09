<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTiktokLine
 * 
 * @property string $id
 * @property string $order_tiktok_id
 * @property string|null $productname
 * @property string|null $variation
 * @property string $qty
 * @property float|null $sku_price
 * @property float|null $sku_platform_discount
 * @property float|null $sku_seller_discount
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $product_id
 *
 * @package App\Models
 */
class OrderTiktokLine extends Model
{
	protected $table = 'order_tiktok_lines';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'sku_price' => 'float',
		'sku_platform_discount' => 'float',
		'sku_seller_discount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'order_tiktok_id',
		'productname',
		'variation',
		'qty',
		'sku_price',
		'sku_platform_discount',
		'sku_seller_discount',
		'created',
		'modified',
		'product_id'
	];
}
