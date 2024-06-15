<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TwoFactorController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        if (!$user || $user->to_2fa != 1) {
            return redirect()->route('login');
        }
        
        DB::table('users')->where('id', $user->id)->update(['to_2fa' => 0]);
        return view('auth.2fa');
    }

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

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|numeric',
        ]);

        $user = User::where('two_factor_code', $request->two_factor_code)
                    ->where('two_factor_expires_at', '>', now())
                    ->first();

        if (!$user) {
            return redirect()->back()->withErrors(['two_factor_code' => 'Il codice è invalido o è scaduto.']);
        }

        $user->resetTwoFactorCode();

        Auth::login($user);

        return redirect()->intended($this->getRightRedirectRoute());

    }
}
?>