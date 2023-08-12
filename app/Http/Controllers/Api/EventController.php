<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EventWithCategoryCollection;
use App\Http\Resources\EventWithUserAndCategoryCollection;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;

class EventController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = new EventWithUserAndCategoryCollection(Event::getEventsWithUserAndCategory());

        return $this->successResponse(
            data: [
                'events' => $events,
            ],
            message: 'Get events successfully!',
            code: 200
        );
    }

    public function myEvents(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return $this->errorResponse(
                message: 'User not found',
                code: 404
            );
        }

        $events = new EventWithCategoryCollection(Event::getUserEvents($user_id));

        return $this->successResponse(
            data: [
                'events' => $events,
            ],
            message: 'Get my events successfully!',
            code: 200
        );
    }

    public function myOldEvents(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return $this->errorResponse(
                message: 'User not found',
                code: 404
            );
        }

        $events = new EventWithCategoryCollection(Event::getUserOldEvents($user_id));

        return $this->successResponse(
            data: [
                'events' => $events,
            ],
            message: 'Get history events successfully!',
            code: 200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:events',
                'imageFile' =>
                'required|image|mimes:jpeg,png,jpg,gif',
                'price' => 'required|numeric',
                'start_time' => 'required|date',
                'description' => 'nullable|string',
                'user_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
            ]);

            if ($request->hasFile('imageFile')) {
                $imageFile = $request->file('imageFile');
                $storagePath = 'events';
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $saveImage = uploadFile($imageFile, $imageName, $storagePath);

                $validatedData['image'] = $saveImage->getPathname();
            }

            // Create the event
            $event = Event::create($validatedData);

            return response()->json(['message' => 'Event created successfully', 'event' => $event], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->with(['user', 'category', 'subscriptions'])->first();

        if (!$event) {
            return $this->errorResponse(
                message: 'Event not found',
                code: 404
            );
        }

        return $this->successResponse(
            [
                'event' => new EventWithUserAndCategoryCollection([$event]),
            ],
            'Get event successfully!',
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:events,slug,' . $event->id,
                'imageFile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'price' => 'required|numeric',
                'start_time' => 'required|date',
                'description' => 'nullable|string',
                'user_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
            ]);

            if ($request->hasFile('imageFile')) {
                if ($event->image) {
                    File::delete($event->image);
                }
                $imageFile = $request->file('imageFile');
                $storagePath = 'events';
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $saveImage = uploadFile($imageFile, $imageName, $storagePath);

                $validatedData['image'] = $saveImage->getPathname();
            }

            // Update the event
            $event->update($validatedData);

            return response()->json(['message' => 'Event updated successfully', 'event' => $event], 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
