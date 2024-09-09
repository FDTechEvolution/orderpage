<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesChannel
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property int|null $seq
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SalesChannel extends Model
{
	protected $table = 'sales_channels';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime',
		'seq' => 'int'
	];

	protected $fillable = [
		'name',
		'created',
		'modified',
		'seq',
		'code'
	];
}
