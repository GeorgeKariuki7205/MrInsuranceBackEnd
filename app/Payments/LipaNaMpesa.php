<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class LipaNaMpesa extends Model
{
    //
    protected $guarded = ['id'];    
    protected $table = 'stk_push_payments';
}
