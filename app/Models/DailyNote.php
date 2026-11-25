<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyNote extends Model
{
    protected $fillable = [
        'user_id', 'category', 'title', 'content', 'emotion', 'event_at', 
        'is_pinned', 'is_locked', 'hide_from_history',
    ];

    protected $casts = [
        'content'               => 'encrypted',
        'event_at'              => 'datetime',
        'is_pinned'             => 'boolean',
        'is_locked'             => 'boolean',
        'hide_from_history'     => 'boolean',
    ];

    public const EMOTIONS = [
        'gelisah' => 'Gelisah', 'netral' => 'Netral', 'kesal' => 'Kesal', 'senang' => 'Senang', 
    ];

    public function getPlainContentAttribute(): string 
    {
        $html = str_ireplace(['<br>', '</li>', '</p>', '</div>'], ' ', $this->content);
        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return trim(preg_replace('/\s+/', ' ', str_replace("\u{00A0}", ' ', $text)));
    }

}
