<?php

namespace App\Http\Controllers;

use App\Models\FormRegistration;
use Illuminate\Http\Request;

class FormRegistrationController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('register.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:form_registrations',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = FormRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // You can add code here to automatically log the user in,
        // or send a verification email to the user.

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }
}
