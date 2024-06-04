<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskSubtask extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_subtask';

    protected $fillable = [
        'task_id',
        'subtask_id',
        'coeff'
    ];

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
