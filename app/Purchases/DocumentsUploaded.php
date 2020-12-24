<?php

namespace App\Purchases;

use Illuminate\Database\Eloquent\Model;

class DocumentsUploaded extends Model
{
    protected $guarded = ['id'];

    public function DocumentsUploadedBelongsTo()
    {
        return $this->belongsTo('App\Purchases\Purchase', 'purchase_id', 'id');
    }
}
