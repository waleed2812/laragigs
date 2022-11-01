<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  public function create()
  {
    return view('users.register');
  }
  public function register(Request $request)
  {
    $formFields = $request->validate([
      "name" => ['required', "min:3"],
      "email" => ["required", "email", Rule::unique("users", "email")],
      "password" => ["required", "confirmed", "min:8"],
    ]);
    $formFields["password"] = bcrypt($formFields["password"]);

    $user = User::create($formFields);
    auth()->login($user);
    return redirect("/")->with("message", "registration successful.");
  }
  public function show()
  {
    return view('users.login');
  }
  public function login(Request $request)
  {
    $formFields = $request->validate([
      "email" => ["required", "email"],
      "password" => ["required"],
    ]);
    if (auth()->attempt($formFields)) {
      $request->session()->regenerate();
      return redirect("/")->with("message", "login successful.");
    } else {
      return back()->withErrors(["email" => "invalid credentials."]);
    }
  }
  public function logout(Request $request)
  {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("/login")->with("message", "logout successful.");
  }
}