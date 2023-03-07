<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{




    /**
     * Store a newly created resource in storage.
     */
    public function subscribe(Request $request, $websiteId)
    {
        $website = Website::findOrFail($websiteId);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);


        // Check if a user with the specified email already exists
        $user = User::where('email', $validatedData['email'])->first();

        // If the user doesn't exist, create a new user record
        if (!$user) {
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email']
            ]);
            $user->save();

        }

        // Check if user is already subscribed to this website
        if ($user->subscriptions()->where('website_id', $websiteId)->exists()) {
            return response()->json(['message' => 'You are already subscribed to this website'], 400);
        }

        $subscription = new Subscription([
            'user_id' => $user->id,
            'website_id' => $websiteId
        ]);

        $website->subscriptions()->save($subscription);

        return response()->json(['message' => 'Subscription created successfully'], 201);
    }



}
