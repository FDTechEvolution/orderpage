<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuditTrail
 * 
 * @property string $id
 * @property string $user_id
 * @property string $type
 * @property string|null $posttype
 * @property string $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AuditTrail extends Model
{
	protected $table = 'audit_trails';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'type',
		'posttype',
		'description',
		'created',
		'modified',
		'uuid'
	];
}
