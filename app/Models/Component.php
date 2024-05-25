<?php

namespace App\Models;

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
}
