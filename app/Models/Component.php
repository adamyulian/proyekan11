<?php

namespace App\Models;

use App\Models\SubtaskComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Component extends Model
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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subtasks()
    {
        return $this->belongsToMany(Subtask::class, 'subtask_component')
        ->using(SubtaskComponent::class)
        ->withPivot('coeff')
        ->withTimestamps();
    }
}
