<header>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="{{ asset('sbidu/assets/images/logo/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="#0">Home</a>
                            <ul class="submenu">
                                <li>
                                    <a href="./index.html">Home Page One</a>
                                </li>
                                <li>
                                    <a href="./index-2.html">Home Page Two</a>
                                </li>
                                <li>
                                    <a href="./index-3.html">Home Page Three</a>
                                </li>
                                <li>
                                    <a href="./index-4.html">Home Page Four</a>
                                </li>
                                <li>
                                    <a href="./index-5.html">Home Page Five</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="./product.html">Auction</a>
                        </li>
                        <li>
                            <a href="#0"><i class="flaticon-user"></i> @if(Auth::check()) {{Auth::user()->nama_lengkap}} @endif</a>
                            <ul class="submenu">
                                @if(Auth::check())
                                <li>
                                    <a href="#0">Profile</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="./dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="./profile.html">Personal Profile</a>
                                        </li>
                                        <li>
                                            <a href="./my-bid.html">My Bids</a>
                                        </li>
                                        <li>
                                            <a href="./winning-bids.html">Winning Bids</a>
                                        </li>
                                        <li>
                                            <a href="./notifications.html">My Alert</a>
                                        </li>
                                        <li>
                                            <a href="./my-favorites.html">My Favorites</a>
                                        </li>
                                        <li>
                                            <a href="./referral.html">Referrals</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                                        Logout
                                    </a>
                                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li>
                                    <a href="{{ route('register') }}">Sign Up</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="./contact.html">Contact</a>
                        </li>
                    </ul>
                    <form class="search-form">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>