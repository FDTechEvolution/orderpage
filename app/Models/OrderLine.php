<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class OrderLine
 *
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property float $qty
 * @property float $amount
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $warehouse_line_id
 * @property string|null $price_list_id
 * @property string|null $product_cost_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderLine extends Model
{
    use HasUuids;
	protected $table = 'order_lines';
	public $incrementing = false;

	protected $casts = [
		'qty' => 'float',
		'amount' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'qty',
		'amount',
		'description',
		'created',
		'modified',
		'warehouse_line_id',
		'price_list_id',
		'product_cost_id'
	];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function order(){
        return $this->hasOne(Shipping::class,'id','order_id');
    }
}
