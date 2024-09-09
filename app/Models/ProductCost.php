<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCost
 * 
 * @property string $id
 * @property float $cost
 * @property float|null $price
 * @property string $product_id
 * @property Carbon $startdate
 * @property Carbon|null $enddate
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProductCost extends Model
{
	protected $table = 'product_costs';
	public $incrementing = false;

	protected $casts = [
		'cost' => 'float',
		'price' => 'float',
		'startdate' => 'datetime',
		'enddate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'cost',
		'price',
		'product_id',
		'startdate',
		'enddate',
		'description',
		'created',
		'modified',
		'createdby',
		'modifiedby'
	];
}
