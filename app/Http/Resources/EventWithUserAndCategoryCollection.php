<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventWithUserAndCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $event): array
    {
        return $this->collection->map(
            function ($event) {
                return [
                    'id' => $event->id,
                    'name' => $event->name,
                    'slug' => $event->slug,
                    'image' => $event->image,
                    'price' => $event->price,
                    'start_time' => $event->start_time,
                    'description' => $event->description,
                    'total_subscriptions' => $event->totalSubscriptions(),
                    'user' => [
                        'name' => $event->user->name,
                        'username' => $event->user->username,
                        'email' => $event->user->email,
                        'phone' => $event->user->phone,
                        'avatar' => $event->user->avatar,
                    ],
                    'category' => [
                        'name' => $event->category->name,
                        'slug' => $event->category->slug,
                        'image' => $event->category->image,
                    ],
                ];
            }
        )->toArray();
    }
}
