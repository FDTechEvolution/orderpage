<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FacebookFarm
 * 
 * @property string $id
 * @property string $fb_name
 * @property string|null $fb_password
 * @property Carbon|null $fb_birthday
 * @property string|null $fb_status
 * @property Carbon|null $fb_created
 * @property string|null $email
 * @property string|null $email_password
 * @property string|null $mobile
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $user_id
 * @property string|null $description
 * @property string|null $mobile_number_id
 * @property string|null $2facode
 * @property string $org_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class FacebookFarm extends Model
{
	protected $table = 'facebook_farms';
	public $incrementing = false;

	protected $casts = [
		'fb_birthday' => 'datetime',
		'fb_created' => 'datetime',
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $hidden = [
		'fb_password',
		'email_password'
	];

	protected $fillable = [
		'fb_name',
		'fb_password',
		'fb_birthday',
		'fb_status',
		'fb_created',
		'email',
		'email_password',
		'mobile',
		'created',
		'modified',
		'user_id',
		'description',
		'mobile_number_id',
		'2facode',
		'org_id'
	];
}
