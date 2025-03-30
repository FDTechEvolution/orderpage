<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Org
 *
 * @property string $id
 * @property string $name
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property string|null $isactive
 * @property string $mobileno
 * @property string|null $code
 * @property string|null $line_notify_token
 * @property string|null $user_id
 * @property string|null $isperfect
 * @property string|null $address
 *
 * @package App\Models
 */
class Org extends Model
{
    use HasUuids;
    protected $table = 'orgs';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'created' => 'datetime',
        'modified' => 'datetime'
    ];

    protected $hidden = [
        'line_notify_token'
    ];

    protected $fillable = [
        'name',
        'created',
        'modified',
        'description',
        'isactive',
        'mobileno',
        'code',
        'line_notify_token',
        'user_id',
        'isperfect',
        'address',
        'telegram_chat_id'
    ];
}
