<nav class="container-navbar text-dark py-3 bg-blue">
    @guest
    <div class="container d-flex justify-content-center text-center align-items-center">
        <h1 class="col-md-9 font-weight-bold title justify-content-end text-right m-auto">Amazing E-Book</h1>
        <div class="col-md-3">
          <a class="btn text-dark font-weight-bold bg-yellow" href="{{route('get.register')}}">Sing Up</a>
          <a class="btn text-dark font-weight-bold bg-yellow" href="{{route('get.login')}}">Log In</a>
        </div>
    </div>
    @endguest

    @auth
    <div class="container d-flex justify-content-center text-center align-items-center">
        <h1 class="col-md-9 font-weight-bold justify-content-end text-right m-auto" style="font-size: 62px">Amazing E-Book</h1>
        <div class="col-md-3">
            <a class="btn text-dark font-weight-bold bg-yellow" href="{{route('logout')}}">Log Out</a>
        </div>
    </div>
    @endauth
</nav>

@auth
<nav class="container-nav justify-content-around ">
    <div class="navbar-nav text-dark bg-yellow">
        <ul class="nav w-50 text-dark m-auto bg-yellow justify-content-around">

            <li class="nav-item {{ $title === 'Home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            
            <li class="nav-item {{ $title === 'Cart' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('get.cart') }}">Cart</a>
            </li>

            <li class="nav-item {{ $title === 'Profile' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('get.profile') }}">Profile</a>
            </li>
            
            @if(auth()->user()->isAdmin())
                <li class="nav-item {{ $title === 'Account Maintaince' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('get.account') }}">Account Maintaince</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
@endauth