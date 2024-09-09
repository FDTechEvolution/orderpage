<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceList
 * 
 * @property string $id
 * @property float $price
 * @property Carbon $startdate
 * @property Carbon|null $enddate
 * @property string|null $isactive
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property string $product_id
 * @property float|null $selling_price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PriceList extends Model
{
	protected $table = 'price_lists';
	public $incrementing = false;

	protected $casts = [
		'price' => 'float',
		'startdate' => 'datetime',
		'enddate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime',
		'selling_price' => 'float'
	];

	protected $fillable = [
		'price',
		'startdate',
		'enddate',
		'isactive',
		'created',
		'modified',
		'description',
		'product_id',
		'selling_price'
	];
}
