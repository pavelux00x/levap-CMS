@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
    $status = Auth::user()->status;
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend_assets')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Levap CMS</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Utente</li>
        <li>

            <a href="{{route( $role . '-profile')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profilo di {{ Auth::user()->name }}</div>
            </a>
            </a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <a href="{{route('logout')}}" aria-expanded="false" onclick="event.preventDefault(); this.closest
                ('form').submit();">
                    <div class="parent-icon"><i class="bx bx-log-out-circle"></i>
                    </div>
                    <div class="menu-title">Logout</div>
                </a>
            </form>

        </li>
        <li class="menu-label"></li>
        @if($role === 'admin')
            <li>
                <a  href="{{route('admin-vendor-list')}}" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-world'></i>
                    </div>
                    <div class="menu-title">Venditori</div>
                </a>

            </li>
        @endif

        @if($status)
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-checkmark-circle'></i>
                    </div>
                    <div class="menu-title">Brands</div>
                </a>
                <ul>
                    <li> <a href="{{route('brand')}}"><i class="bx bx-right-arrow-alt"></i>Guarda tutti</a>
                    </li>
                    <li> <a href="{{route('brand-add')}}"><i class="bx bx-right-arrow-alt"></i>Aggiungi Brand</a>
                    </li>
                </ul>

            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-folder'></i>
                    </div>
                    <div class="menu-title">Categorie</div>
                </a>
                <ul>
                    <li> <a href="{{route('category')}}"><i class="bx bx-right-arrow-alt"></i>Guarda tutti</a>
                    </li>
                    <li> <a href="{{route('category-add')}}"><i class="bx bx-right-arrow-alt"></i>Aggiungi categoria</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-dinner'></i>
                    </div>
                    <div class="menu-title">Sotto Categorie</div>
                </a>
                <ul>
                    <li> <a href="{{route('sub-category')}}"><i class="bx bx-right-arrow-alt"></i>Guarda tutti</a>
                    </li>
                    <li> <a href="{{route('sub-category-add')}}"><i class="bx bx-right-arrow-alt"></i>Aggiungi sotto categoria</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-graph'></i>
                    </div>
                    <div class="menu-title">Prodotti</div>
                </a>
                <ul>
                    <li> <a href="{{route($role . '-product')}}"><i class="bx bx-right-arrow-alt"></i>Guarda tutti</a>
                    </li>
                    <li> <a href="{{route('Venditore-product-add')}}"><i class="bx bx-right-arrow-alt"></i>Aggiungi prodotti</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-wallet'></i>
                    </div>
                    <div class="menu-title">Coupons</div>
                </a>
                <ul>
                    <li> <a href="{{route($role . '-coupon')}}"><i class="bx bx-right-arrow-alt"></i>Guarda tutti</a>
                    </li>
                    <li> <a href="{{route('Venditore-coupon-add')}}"><i class="bx bx-right-arrow-alt"></i>Aggiungi Coupon</a>
                    </li>
                </ul>
            </li>
        @endif

    </ul>
    <!--end navigation-->
</div>
