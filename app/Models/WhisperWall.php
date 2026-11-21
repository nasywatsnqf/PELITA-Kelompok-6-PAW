<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhisperWall extends Model {
    protected $fillable = ['user_id', 'content', 'is_anonymous', 'hug_count', 'support_count'];

    protected $casts = ['is_anonymous' => 'boolean'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}