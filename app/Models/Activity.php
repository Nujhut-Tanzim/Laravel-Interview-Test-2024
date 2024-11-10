<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id', 'action', 'entity_type', 'entity_id','read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
