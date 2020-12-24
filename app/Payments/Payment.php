<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'non_stk_push_payments';
    protected $guarded = ["id"];
}
