<?php

namespace App\Visitor;

use Illuminate\Database\Eloquent\Model;

class VisitorRecord extends Model
{
    //
    protected $guarded = ['id']; 

    public function VisitorRecordBelongsToVisitor()
    {
        return $this->belongsTo('App\Visitor\Visitor', 'visitorId', 'id');
    }
}
