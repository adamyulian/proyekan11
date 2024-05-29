<?php

namespace App\Models;

use App\Models\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'website_url',
        'industry',
        'is_published',
        'user_id'
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
    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
