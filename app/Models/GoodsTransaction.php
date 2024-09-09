<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsTransaction
 * 
 * @property string $id
 * @property string $docno
 * @property Carbon $docdate
 * @property string $type
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $createdby
 * @property string|null $user_id
 * @property string|null $status
 * @property string|null $trackingno
 * @property Carbon|null $checkeddate
 * @property string|null $description
 * @property string $warehouse_id
 * @property string $org_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class GoodsTransaction extends Model
{
	protected $table = 'goods_transactions';
	public $incrementing = false;

	protected $casts = [
		'docdate' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime',
		'checkeddate' => 'datetime'
	];

	protected $fillable = [
		'docno',
		'docdate',
		'type',
		'created',
		'modified',
		'createdby',
		'user_id',
		'status',
		'trackingno',
		'checkeddate',
		'description',
		'warehouse_id',
		'org_id'
	];
}
