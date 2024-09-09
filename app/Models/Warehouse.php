<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Warehouse
 * 
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $isdefault
 * @property string $org_id
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class Warehouse extends Model
{
	protected $table = 'warehouses';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'description',
		'created',
		'modified',
		'isdefault',
		'org_id'
	];
}
