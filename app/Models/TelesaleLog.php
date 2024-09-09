<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TelesaleLog
 * 
 * @property string $id
 * @property string $telesale_id
 * @property string $org_id
 * @property string $user_id
 * @property Carbon $docdate
 * @property string $status
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TelesaleLog extends Model
{
	protected $table = 'telesale_logs';
	public $incrementing = false;

	protected $casts = [
		'docdate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'telesale_id',
		'org_id',
		'user_id',
		'docdate',
		'status',
		'description',
		'created',
		'modified'
	];
}
