<?php

namespace App\Mpesa;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $guarded = ["id"];
}
