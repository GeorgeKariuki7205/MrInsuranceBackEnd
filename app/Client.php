<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded = ['id'];
    public function ClienthasManyPurchase()
    {
        return $this->hasMany('App\Purchases\Purchase', 'client_id', 'id');
    }
    public function ClientbelongsToUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
