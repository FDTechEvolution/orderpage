<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $menu_order
 * @property string|null $menu_product
 * @property string|null $menu_user
 * @property string|null $menu_accounting
 * @property string|null $menu_report
 * @property string|null $menu_stock
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'created',
		'modified',
		'menu_order',
		'menu_product',
		'menu_user',
		'menu_accounting',
		'menu_report',
		'menu_stock',
		'code'
	];
}
