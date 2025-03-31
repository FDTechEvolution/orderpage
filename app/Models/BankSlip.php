<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankSlip
 *
 * @property int $id
 * @property string|null $tmp_order_id
 * @property string $path
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $income_id
 * @property string|null $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class BankSlip extends Model
{
    protected $table = 'bank_slips';

    protected $casts = [
        'created' => 'datetime',
        'modified' => 'datetime'
    ];

    protected $fillable = [
        'tmp_order_id',
        'path',
        'created',
        'modified',
        'income_id',
        'order_id',
        'filename'
    ];
}
