<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TmpProduct
 * 
 * @property string $id
 * @property string $name
 * @property string|null $status
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property float|null $cost
 * @property string|null $url
 * @property string $user_id
 * @property string|null $img_path
 *
 * @package App\Models
 */
class TmpProduct extends Model
{
	protected $table = 'tmp_products';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime',
		'cost' => 'float'
	];

	protected $fillable = [
		'name',
		'status',
		'description',
		'created',
		'modified',
		'cost',
		'url',
		'user_id',
		'img_path'
	];
}
