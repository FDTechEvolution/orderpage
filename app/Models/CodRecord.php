<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class CodRecord
 *
 * @property string $id
 * @property string $org_id
 * @property string|null $trackingno
 * @property string|null $mobileno
 * @property float|null $amount
 * @property string|null $status
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class CodRecord extends Model
{
    use HasUuids;
	protected $table = 'cod_records';
	public $incrementing = false;

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'org_id',
		'trackingno',
		'mobileno',
		'amount',
		'status',
		'description'
	];
}
