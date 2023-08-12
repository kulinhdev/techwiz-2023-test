<?php

namespace App\Http\Controllers\Api;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FavoriteController extends ApiController
{
    public function subscribe(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'event_id' => 'required|exists:events,id',
            ]);

            // Create the favorite
            $favorite = Favorite::create($validatedData);

            return $this->successResponse(
                data: [
                    'favorite' => $favorite,
                ],
                message: 'Favorite created successfully',
                code: 201
            );
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        }
    }

    public function unsubscribe(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'event_id' => 'required|exists:events,id',
            ]);

            // Find the favorite to unsubscribe from
            $favorite = Favorite::where('user_id', $validatedData['user_id'])
                ->where('event_id', $validatedData['event_id'])
                ->first();

            if (!$favorite) {
                return response()->json(['message' => 'Favorite not found'], 404);
            }

            // Delete the favorite
            $favorite->delete();

            return $this->successResponse(
                message: 'Favorite delete successfully',
                code: 200
            );
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        }
    }
}
