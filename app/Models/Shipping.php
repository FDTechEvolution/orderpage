<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shipping
 * 
 * @property string $id
 * @property string $name
 * @property string $code
 * @property float $codfee
 * @property string|null $logo
 * @property string|null $isactive
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $org_id
 * @property string|null $issystem
 * @property string|null $fullname
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $zipcode
 * @property string|null $codaccount
 * @property string|null $isdefault
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Shipping extends Model
{
	protected $table = 'shippings';
	public $incrementing = false;

	protected $casts = [
		'codfee' => 'float',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'code',
		'codfee',
		'logo',
		'isactive',
		'created',
		'modified',
		'org_id',
		'issystem',
		'fullname',
		'mobile',
		'address',
		'zipcode',
		'codaccount',
		'isdefault'
	];
}
