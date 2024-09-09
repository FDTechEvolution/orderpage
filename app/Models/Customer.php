<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property string $id
 * @property string|null $fullname
 * @property string|null $mobile
 * @property string|null $mobile2
 * @property string|null $address_line1
 * @property string|null $address_line2
 * @property string|null $zipcode
 * @property Carbon|null $created
 * @property string|null $description
 * @property string|null $subdistrict
 * @property string|null $district
 * @property string|null $province
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime'
	];

	protected $fillable = [
		'fullname',
		'mobile',
		'mobile2',
		'address_line1',
		'address_line2',
		'zipcode',
		'created',
		'description',
		'subdistrict',
		'district',
		'province'
	];
}
