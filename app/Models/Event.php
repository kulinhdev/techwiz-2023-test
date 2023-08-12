<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
        'price',
        'start_time',
        'description',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getEventsWithUserAndCategory()
    {
        return self::with('user', 'category')->get();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'event_id');
    }

    public function totalSubscriptions()
    {
        return $this->subscriptions->count();
    }

    public static function getUserEvents($userId)
    {
        $now = Carbon::now();
        return self::where('user_id', $userId)->where('start_time', '>', $now)->get();
    }

    public static function getUserOldEvents($userId)
    {
        $now = Carbon::now();
        return self::where('user_id', $userId)->where('start_time', '<', $now)->get();
    }
}
