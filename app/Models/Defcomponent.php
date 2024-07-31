<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Defcomponent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'unit_id',
        'brand_id',
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

    public function defunit()
    {
        return $this->belongsTo(Defunit::class);
    }

    public function defbrand()
    {
        return $this->belongsTo(Defbrand::class);
    }

    // public function subtasks()
    // {
    //     return $this->belongsToMany(Subtask::class, 'subtask_component')
    //     ->using(SubtaskComponent::class)
    //     ->withPivot('coeff')
    //     ->withTimestamps();
    // }
}
