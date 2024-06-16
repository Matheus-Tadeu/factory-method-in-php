<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    /**
     * @var string
     */
    protected $table = 'buttons';

    /**
     * @var string[]
     */
    protected $fillable = [
        'label',
        'platform',
    ];
}
