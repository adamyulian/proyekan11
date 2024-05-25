<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'user_id',
            'slug',
            'content',
            'image',
            'title',
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
}
