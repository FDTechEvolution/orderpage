<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountItem
 * 
 * @property string $id
 * @property string $account_group_id
 * @property string $acc_no
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AccountItem extends Model
{
	protected $table = 'account_items';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'account_group_id',
		'acc_no',
		'name',
		'created',
		'modified'
	];
}
