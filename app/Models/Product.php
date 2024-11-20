<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Product
 *
 * @property string $id
 * @property string $org_id
 * @property string $name
 * @property string $code
 * @property float $cost
 * @property float|null $price
 * @property Carbon|null $created
 * @property string|null $description
 * @property string|null $product_category_id
 * @property string|null $isactive
 * @property float|null $weight
 * @property string|null $barcode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasUuids;
	protected $table = 'products';
	public $incrementing = false;

	protected $casts = [
		'cost' => 'float',
		'price' => 'float',
		'created' => 'datetime',
		'weight' => 'float'
	];

	protected $fillable = [
		'org_id',
		'name',
		'code',
		'cost',
		'price',
		'created',
		'description',
		'product_category_id',
		'isactive',
		'weight',
		'barcode'
	];

    public function productCategory(){
        return $this->hasOne(ProductCategory::class,'id','product_category_id');
    }
}
