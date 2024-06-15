<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\SendTwoFactorCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * To determine which url to go after logging in.
     */
    private function getRightRedirectRoute(): string{
        $role = Auth::user()->role;
        switch ($role){
            case 'admin':
                $url = '/admin/profile';
                break;
            case 'Venditore':
                $url = '/Venditore/profile';
                break;
            default:
                $url = '/profile';
        }
        return $url;
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();
        $user->generateTwoFactorCode();
        $user->notify(new SendTwoFactorCode());
        DB::table('users')->where('id', $user->id)->update(['to_2fa' => 1]);
        Auth::logout();
        $request->session()->put('user_id', $user->id);
        return redirect()->route('2fa.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
