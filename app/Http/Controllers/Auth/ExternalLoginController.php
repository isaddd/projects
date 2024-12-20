<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class ExternalLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the credentials input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Send the credentials to the external API for validation
        $response = Http::post('https://services.snaplab.id/api/v1/auth/signin', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // If the API request failed, throw an exception
        if ($response->failed()) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Assuming the API returns the user data
        $userData = $response->json();

        // Get the token from the response
        $token = $userData['token'];

        // Check if the token matches the specific token
        $adminToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoyfQ.Lw_mI3534GtjxzIdK9diH1-sbjfZAdQy8fqfXH0cL0I';

        // Redirect to the dashboard page
        if (is_null($token) || $token !== $adminToken) {
            Session::flash('error', 'Error: Invalid or missing token.');

            // Redirect the user back to the previous page
            return redirect()->back();
        } else {
            // Store the token in the session
            session(['token' => $token]);

            // dd('berhasil');

            // Redirect to the Filament dashboard after successful login
            return redirect()->route('filament.dashboard');
        }
    }
}
