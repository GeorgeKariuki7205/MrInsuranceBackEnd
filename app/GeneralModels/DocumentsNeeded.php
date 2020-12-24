<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class DocumentsNeeded extends Model
{
    //
    protected $guarded = ['id'];
    public function DocumentsNeededbelongsToCover()
    {
        return $this->belongsTo('App\GeneralModels\Cover', 'cover_id', 'id');
    }
}
