<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {

            if (Newsletter::isSubscribed($request->email)) {
                return redirect()->back()->with('error', 'You have already subscribed to our Newsletters.');
            } else {
                Newsletter::subscribe($request->email);
                return redirect()->back()->with('success', 'You have successfully subscribed to our Newsletters.');
                
            }

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
