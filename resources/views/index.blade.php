@php use Illuminate\Support\Facades\Auth; @endphp
@if(Auth::user())
    @if(Auth::user()->role == "Venditore")
            @include('backend.profile.Venditore_profile')
    @elseif(Auth::user()->role == "admin")
            @include('backend.profile.admin_profile')       
    @endif
@else
    @include('auth.login')
@endif


