<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends ApiController
{
    public function subscribe(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'event_id' => 'required|exists:events,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            // Create the subscription
            $subscription = Subscription::create($validatedData);

            return $this->successResponse(
                data: [
                    'subscription' => $subscription,
                ],
                message: 'Subscription created successfully',
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

            // Find the subscription to unsubscribe from
            $subscription = Subscription::where('user_id', $validatedData['user_id'])
            ->where('event_id', $validatedData['event_id'])
            ->first();

            if (!$subscription) {
                return response()->json(['message' => 'Subscription not found'], 404);
            }

            // Delete the subscription
            $subscription->delete();

            return $this->successResponse(
                message: 'Unsubscribed successfully',
                code: 200
            );
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        }
    }
}
