<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesChannelLine
 * 
 * @property string $id
 * @property string $name
 * @property string|null $isactive
 * @property string $sales_channel_id
 * @property string $org_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SalesChannelLine extends Model
{
	protected $table = 'sales_channel_lines';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'isactive',
		'sales_channel_id',
		'org_id',
		'created',
		'modified',
		'description'
	];
}
