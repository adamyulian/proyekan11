<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Defsubtask extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'defunit_id',
        'user_id',
        'is_published'
    ];
    // protected static function booted() {
    //     static::creating(function($model) {
    //       // Check if user_id is not already set
    //     if (!$model->user_id) {
    //         $model->user_id = Auth::user()->id;
    //     }
    //     });
    //     static::updating(function($model) {
    //         $model->user_id = Auth::user()->id;
    //     });
    // }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Unit model
    public function defunit()
    {
        return $this->belongsTo(Defunit::class);
    }

    // public function defcomponents()
    // {
    //     return $this->belongsToMany(Defcomponent::class,'subtask_component')
    //     ->using(SubtaskComponent::class)
    //     ->withPivot('coeff')
    //     ->withTimestamps();
    // }

    // public function tasks()
    // {
    //     return $this->belongsToMany(Task::class,'task_subtask')
    //     ->using(TaskSubtask::class)
    //     ->withPivot('coeff')
    //     ->withTimestamps();
    // }
}
