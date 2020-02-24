<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $fillable = [
        'priority_name'
    ];

    public function task() {

        return $this->belongsTo(Task::class);
    }

}
