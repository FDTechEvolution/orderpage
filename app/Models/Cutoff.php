<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cutoff
 * 
 * @property string $id
 * @property string $user_id
 * @property Carbon $docdate
 * @property int|null $orderamt
 * @property string|null $json_file
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $org_id
 * @property string|null $product_list
 * @property string|null $user_list
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Cutoff extends Model
{
	protected $table = 'cutoffs';
	public $incrementing = false;

	protected $casts = [
		'docdate' => 'datetime',
		'orderamt' => 'int',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'docdate',
		'orderamt',
		'json_file',
		'description',
		'created',
		'modified',
		'org_id',
		'product_list',
		'user_list'
	];
}
