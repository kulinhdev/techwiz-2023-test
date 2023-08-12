<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\EventWithCategoryCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends ApiController
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('main')->plainTextToken;
        $user = new UserResource($user);
        return $this->successResponse(
            data: [
                'token' => $token,
                'user' => $user
            ],
            message: 'Register successfully!',
            code: 201
        );
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return $this->successResponse(
                data: [
                    'token' => $token,
                    'user' => $user
                ],
                message: 'Login successfully!',
                code: 200
            );
        } else {
            return $this->errorResponse(
                message: 'Email or password incorrect!',
                code: 401
            );
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return $this->successResponse(
            message: "Logged out!",
            code: 204
        );
    }

    public function me(Request $request)
    {
        return $this->successResponse(
            data: new UserResource($request->user()),
            message: "Get user information successful!",
            code: 200
        );
    }
    public function getUserDetail(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return $this->errorResponse(
                message: 'User not found',
                code: 404
            );
        }

        return $this->successResponse(
            data: new UserResource($user),
            message: "Get user information successful!",
            code: 200
        );
    }

    public function updateProfile(Request $request, $user_id)
    {
        try {
            $user = User::find($user_id);

            if (!$user) {
                return $this->errorResponse(
                    message: 'User not found',
                    code: 404
                );
            }

            $validatedData = $request->validate([
                'name' => 'nullable||max:255',
                'username' => 'nullable|unique:users,username,' . $user->id,
                'email' => 'nullable|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'address' => 'nullable|string',
            ]);


            $user->fill($validatedData);

            if ($request->hasFile('avatar')) {
                $avatarFile = $request->file('avatar');
                $storagePath = 'avatars';
                $avatarName = time() . '_' . $avatarFile->getClientOriginalName();
                $saveAvatar = uploadFile($avatarFile, $avatarName, $storagePath);

                $user->avatar = $saveAvatar->getPathname();
            }

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            // dd($user);

            $user->save();

            return $this->successResponse(
                data: [
                    'user' => new UserResource($user),
                ],
                message: 'Profile updated successfully',
                code: 200
            );
        } catch (ValidationException $e) {
            return $this->errorResponse(
                data: [
                    'errors' => $e->errors()
                ],
                message: 'Validation error',
                code: 422
            );
        }
    }

    public function getUsers(Request $request)
    {
        // dd(UserResource::collection(User::getUsers()));
        return $this->successResponse(
            data: UserResource::collection(User::getUsers()),
            message: "Get users information successful!",
            code: 200
        );
    }

    public function mySubscribe(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return $this->errorResponse(
                message: 'User not found',
                code: 404
            );
        }

        $subscriptionsWithEvents = new EventWithCategoryCollection($user->subscriptionsWithEvents);

        return $this->successResponse(
            data: [
                'subscriptions_events' => $subscriptionsWithEvents,
            ],
            message: 'Get subscriptions events successfully!',
            code: 200
        );
    }

    public function myFavorite(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return $this->errorResponse(
                message: 'User not found',
                code: 404
            );
        }

        $favoritesWithEvents = new EventWithCategoryCollection($user->favoritesWithEvents);

        return $this->successResponse(
            data: [
                'favorites_events' => $favoritesWithEvents,
            ],
            message: 'Get favorites events successfully!',
            code: 200
        );
    }
}
