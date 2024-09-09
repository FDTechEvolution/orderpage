<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountGroup
 * 
 * @property string $id
 * @property string $acc_no
 * @property string $name
 * @property string|null $iscredit
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccountGroup extends Model
{
	protected $table = 'account_groups';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'acc_no',
		'name',
		'iscredit',
		'created',
		'modified'
	];
}
