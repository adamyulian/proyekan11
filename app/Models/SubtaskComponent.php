<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubtaskComponent extends Pivot

{
    use SoftDeletes;

    protected $table = 'subtask_component';

    protected $fillable = ['subtask_id', 'component_id', 'coeff'];

    // public function component()
    // {
    //     return $this->belongsTo(Component::class);
    // }
}
