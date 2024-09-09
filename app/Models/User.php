<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property string $id
 * @property string $org_id
 * @property string $name
 * @property string|null $username
 * @property string|null $password
 * @property string|null $fullname
 * @property string|null $type
 * @property string|null $isactive
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $line_name
 * @property string|null $line_userid
 * @property string|null $profile_url
 * @property string|null $isfreelance
 * @property string|null $isemployee
 * @property string|null $id_user
 * @property string|null $isseller
 * @property string $role_id
 * @property string|null $mobileno
 * @property float|null $leave_balance
 * @property string|null $code
 * @property float|null $sick_leave_balance
 * @property Carbon|null $birthday
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime',
		'leave_balance' => 'float',
		'sick_leave_balance' => 'float',
		'birthday' => 'datetime'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'org_id',
		'name',
		'username',
		'password',
		'fullname',
		'type',
		'isactive',
		'created',
		'modified',
		'line_name',
		'line_userid',
		'profile_url',
		'isfreelance',
		'isemployee',
		'id_user',
		'isseller',
		'role_id',
		'mobileno',
		'leave_balance',
		'code',
		'sick_leave_balance',
		'birthday'
	];
}
