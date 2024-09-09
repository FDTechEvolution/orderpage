<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $org_id
 * @property string|null $isactive
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProductCategory extends Model
{
	protected $table = 'product_categories';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'created',
		'modified',
		'org_id',
		'isactive',
		'description'
	];
}
