<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'subject',
        'user_id',
        'priority_id',
        'due_date',
        'status_id',
        'completeness'
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

}
