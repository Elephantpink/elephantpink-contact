<?php

namespace EPink\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'form'
    ];
}
