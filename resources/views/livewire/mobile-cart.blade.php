<div>
    {{-- @if ($cartContent->sum('qty') > 0) --}}
        <div class="view-cart-container" style="@if ($cartContent->sum('qty') > 0) transform: translateY(0%); @endif"  id="viewCartContainer">
            <div onclick="openNav()" class="view-cart-container-child">
                <div class="view-cart-1">
                    <i class="fa-regular fa-cart-shopping-fast nav-icons"></i>
                    <span>{{ $cartContent->sum('qty') }}</span>
                </div>
                <div class="view-cart-2">View Cart</div>
                <div wire:loading.remove class="view-cart-3">Rs. <span>{{ Cart::subtotal(0, '.', '') }}</span></div>
                <div wire:loading class="loader-cart"></div>
            </div>
        </div>
    {{-- @endif --}}
</div>
