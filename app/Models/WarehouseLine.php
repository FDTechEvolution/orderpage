<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WarehouseLine
 * 
 * @property string $id
 * @property string $product_id
 * @property float $total_qty
 * @property float $current_qty
 * @property float $cost
 * @property string $istemporary
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $warehouse_id
 * @property string|null $description
 *
 * @package App\Models
 */
class WarehouseLine extends Model
{
	protected $table = 'warehouse_lines';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_qty' => 'float',
		'current_qty' => 'float',
		'cost' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'product_id',
		'total_qty',
		'current_qty',
		'cost',
		'istemporary',
		'created',
		'modified',
		'warehouse_id',
		'description'
	];
}
