<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsTest
 * 
 * @property string $id
 * @property string|null $tmp_product_id
 * @property Carbon|null $docdate
 * @property float|null $budget
 * @property float|null $amount_spen
 * @property float|null $cost_per_click
 * @property float|null $cost_per_msg
 * @property float|null $cost_per_purchase
 * @property int|null $new_msg
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AdsTest extends Model
{
	protected $table = 'ads_tests';
	public $incrementing = false;

	protected $casts = [
		'docdate' => 'datetime',
		'budget' => 'float',
		'amount_spen' => 'float',
		'cost_per_click' => 'float',
		'cost_per_msg' => 'float',
		'cost_per_purchase' => 'float',
		'new_msg' => 'int',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'tmp_product_id',
		'docdate',
		'budget',
		'amount_spen',
		'cost_per_click',
		'cost_per_msg',
		'cost_per_purchase',
		'new_msg',
		'description',
		'created',
		'modified'
	];
}
