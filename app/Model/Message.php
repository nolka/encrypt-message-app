<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @property string $message
 * @property integer $type
 * @package App
 */
class Message extends Model
{
    const TYPE_TEXT = 1;

    protected $table = 'message';

    protected $guarded = [
        'created_at', 'updated_at'
    ];
}
