<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankAccount
 * 
 * @property string $id
 * @property string $name
 * @property string $accountno
 * @property string $bankname
 * @property string|null $branch
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $isactive
 * @property string $org_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class BankAccount extends Model
{
	protected $table = 'bank_accounts';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'accountno',
		'bankname',
		'branch',
		'description',
		'created',
		'modified',
		'isactive',
		'org_id'
	];
}
