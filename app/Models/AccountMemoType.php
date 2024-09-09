<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountMemoType
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $subtype
 * @property string|null $isdaily
 * @property string|null $issystem
 * @property string|null $org_id
 * @property string|null $isrevenue
 * @property string|null $isactive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccountMemoType extends Model
{
	protected $table = 'account_memo_types';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'created',
		'modified',
		'subtype',
		'isdaily',
		'issystem',
		'org_id',
		'isrevenue',
		'isactive'
	];
}
