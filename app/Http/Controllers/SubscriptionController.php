<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'subscription_type' => 'required|string',
            'lifetime' => 'required|boolean',
            'price' => 'required|numeric',
        ]);

        // Save to DB
        $subscription = \App\Models\Subscription::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'subscription_type' => $request->subscription_type,
            'lifetime' => $request->lifetime,
            'price' => $request->price,
        ]);

        return redirect()->route('my-subscription-details');
    }



}
