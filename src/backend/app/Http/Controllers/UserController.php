<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Shows User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        // Return the authenticated user's profile
        return response()->json(Auth::user());
    }

    /**
     * Updates User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
        ]);

        // Update the user's information
        if (isset($data['password'])) {
            $data['password'] =  Hash::make($data['password']);
        }

        $user->update($data);

        // Return the updated user
        return response()->json($user);
    }
}

