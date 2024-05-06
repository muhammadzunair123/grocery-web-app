<!doctype html>
<html lang="en">

<head>
    <title>{{ $title ?? config('app.name', 'BAHTAREEN') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link
        href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/lightslider/lightslider.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/stickynav.css') }}">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
@yield('style')

<body>

    <div class="overlay-one"></div>

    <!-- Modal -->
    <div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="LogoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LogoutModalLabel" style="font-weight: 600">Logging out?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Thanks for stopping by. See you again soon! </div>
                <div class="custom-modal-footer p-3 border rounded">
                    <button id="cancel_logout_btn" data-bs-dismiss="modal">Cancel</button>
                    <a id="main_logout_btn" href="{{route('user.logout')}}">Logout</a>
                </div>
                {{-- <div class="modal-footer d-flex py-2 px-2 w-100" style="flex-direction: row;justify-content: space-between">
                    <button type="button" style="width: 40%" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" style="width: 59%" class="btn btn-primary">Logout</button>
                </div> --}}
            </div>
        </div>
    </div>

    <nav style="position: sticky;top: 0px;width: 100% !important;z-index: 999999;">
        <div class="nav-container">
            <div class="nav-child-1">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/assets/logo.png') }}" id="main-logo"
                        alt=""></a>
            </div>
            <div class="nav-child-2">
                <button id="only_in_lahore_button">
                    <i class="fa-solid fa-location-dot"></i>&nbsp; ONLY IN LAHORE
                </button>
                <button id="time_asap_button">
                    <i class="fa-solid fa-timer"></i>&nbsp; TIME ASAP
                </button>
            </div>
            <div class="nav-child-3">
                <div>

                    <button class="nav-icon-buttons" id="dropdown-btn-drop" style="position: relative !important"><i
                            class="fa-regular fa-user nav-icons"></i></button>
                    <div id="dropdown-content-drop">
                        @if (Auth::user())
                            <a href="{{ route('user.profile') }}">Profile</a>
                            {{-- <a href="{{route('checkout')}}">Checkout</a> --}}
                            <a href="profile#my_orders"  onclick="closeDropdown()">My Orders</a>
                            <a style="cursor: pointer;;border-top: 2px solid rgb(226, 226, 226);border-top-left-radius: 0px;border-top-right-radius: 0px"
                                data-bs-toggle="modal" data-bs-target="#LogoutModal" onclick="closeDropdown()">Logout</a>
                        @else
                            <a style="cursor: pointer" id="LoginBtnForPopup1" onclick="openPopup1()">Login</a>
                            <a style="cursor: pointer" onclick="openPopup2()">Signup</a>
                        @endif
                    </div>
                </div>
                <div>
                    <button class="nav-icon-buttons"><i class="fa-regular fa-heart nav-icons"></i></button>
                </div>
                <div>
                    <button class="nav-icon-buttons" id="cart-btn-1"><i
                            class="fa-regular fa-cart-shopping-fast nav-icons"></i></button>
                    <button class="nav-icon-buttons" id="cart-btn-2" onclick="openNav()"><i
                            class="fa-regular fa-cart-shopping-fast nav-icons"></i></button>
                </div>
            </div>
        </div>
        <button id="LoginBtnForPopup4" style="display: none;" onclick="openPopup4()">Change Password</button>
    </nav>

    <div class="container">

        <div class="auth-container1">
            @livewire('user-login')
        </div>

        <div class="auth-container2">
            @livewire('user-register')
        </div>

        <div class="auth-container3">
            @livewire('forgot-password')
        </div>

        <div class="auth-container4">
            @livewire('change-password')
        </div>

    </div>



    <div class="main-container">

        <div class="main-container-child-1">

            {{ $slot }}

        </div>
        @livewire('cart-content')
    </div>

    {{-- View cart for mobile devices --}}

    @livewire('mobile-cart')


    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('front-assets/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front-assets/lightslider/lightslider.js') }}"></script>
    <script src="{{ asset('front-assets/script.js') }}"></script>
    <script src="{{ asset('front-assets/stickynav.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the URL contains the 'authRedirect' query parameter
            const urlParams = new URLSearchParams(window.location.search);
            const authRedirectParam = urlParams.get('authRedirect');

            // Get the button element by its id
            var redirectButton = document.getElementById('LoginBtnForPopup1');

            // If the button element exists and 'authRedirect' parameter is present
            if (redirectButton && authRedirectParam === 'true') {
                // Simulate a click event on the button
                redirectButton.click();
            }

            const authRedirectParam2 = urlParams.get('ChangePasswordRedirect');

            // Get the button element by its id
            var redirectButton2 = document.getElementById('LoginBtnForPopup4');

            // If the button element exists and 'authRedirect' parameter is present
            if (redirectButton2 && authRedirectParam2 === 'true') {
                // Simulate a click event on the button
                redirectButton2.click();
            }
        });
    </script>
    @yield('script')
</body>

</html>
