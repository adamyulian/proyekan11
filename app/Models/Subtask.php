<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use App\Models\SubtaskComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subtask extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'unit_id',
        'user_id',
        'is_published'
    ];
    protected static function booted() {
        static::creating(function($model) {
          // Check if user_id is not already set
        if (!$model->user_id) {
            $model->user_id = Auth::user()->id;
        }
        });
        static::updating(function($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Unit model
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function components()
    {
        return $this->belongsToMany(Component::class,'subtask_component')
        ->using(SubtaskComponent::class)
        ->withPivot('coeff')
        ->withTimestamps();
    }
}
