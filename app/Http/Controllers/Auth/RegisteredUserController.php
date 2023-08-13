<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route("register")->with("success","The employee created successfully");
    }


    public function edit(User $employee): View
    {
        return view('auth.edit',compact("employee"));
    }

    public function update(Request $request,User $employee): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

       $employee->update([
            'name' => $request->name,
            'email' => $request->email,
           'password' => $request->password ? Hash::make($request->password) : $employee->password,

            
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route("register.edit",$employee->id)->with("success","The employee updated successfully");
    }

public function destroy(User $employee){

    $employee->delete();

    
    return redirect()->route("management.employees")->with("success","The employee deleted successfully");
}



}
