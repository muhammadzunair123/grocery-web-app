<div class="main-container-child-2" id="targetDiv" wire:ignore.self>
    <button onclick="openNav()" id="cart-close-button">
        <i class="fa-regular fa-circle-xmark"></i>
    </button>
    <div class="cart-child-1">
        <button id="your_cart_button">Your cart</button>
    </div>
    <div class="cart-child-2">
        @if ($cartContent->isNotEmpty())
            @foreach ($cartContent as $item)
                <div wire:key={{ $item->rowId }} class="cart-product-card">
                    <div class="cart-product-card-img"><img
                            src="{{ asset('storage/' . $item->options->productImage->image) }}" width="100%"
                            alt="">
                    </div>
                    <a href="{{ route('product.detail', $item->options->slug) }}"
                        class="cart-product-card-title">{{ $item->name }}</a>
                    <div class="cart-product-card-price">
                        <div class="cart-product-card-price-1">Rs.{{ $item->price }}</div>
                        <div class="cart-product-card-price-2">
                            @if ($item->qty > 1)
                                <button style="background: transparent;border:none;transition: 0.2s ease-in-out all;"
                                    wire:click='decrementQuantity("{{ $item->rowId }}")'><i
                                        class="fa-regular fa-square-minus qty-icons"></i></button>&nbsp;
                            @else
                                <button style="background: transparent;border:none;transition:0.2s ease-in-out all;"
                                    wire:click='decrementQuantity("{{ $item->rowId }}")'><i
                                        class="fa-solid fa-trash"></i></button>&nbsp;
                            @endif
                            <span
                                style="background: transparent;border:none;font-size: 18px;">{{ $item->qty }}</span>&nbsp;
                            <button style="background: transparent;border:none"
                                wire:click='incrementQuantity("{{ $item->rowId }}")'><i
                                    class="fa-regular fa-square-plus qty-icons"></i></button>
                        </div>
                        <div class="cart-content-loading-div" wire:loading
                            wire:target='incrementQuantity("{{ $item->rowId }}")'>
                            <div style="display: flex;height: 100%">
                                <div class="loader-product-card"></div>
                            </div>
                        </div>
                        <div class="cart-content-loading-div" wire:loading
                        wire:target='decrementQuantity("{{ $item->rowId }}")'>
                        <div style="display: flex;height: 100%">
                            <div class="loader-product-card"></div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        @else
            <center class="mt-2">Start Adding Items To Cart</center>
        @endif
        {{-- <div class="cart-child-2-loading-div" wire:loading>
            <div style="display: flex;height: 100%">
                <div class="loader-product-card"></div>
            </div>
        </div> --}}
    </div>
    <div class="cart-child-3">
        <div class="cart-child-3-main-1">
            <div class="cart-child-3-main-1-1">
                <div style="font-weight: 600;">Total</div>
                <div style="font-weight: 500;">Rs. {{ Cart::subtotal() }} </div>
            </div>
            @php
                // Get the subtotal without taxes and fees from the cart
                $subtotalExcludingTax = Cart::subtotal(2, '.', '');

                // Determine the amount to add based on the subtotal
                $amountToAdd = $subtotalExcludingTax > 0 && $subtotalExcludingTax < 3000 ? 80 : 0;

                // Convert the subtotal to a float and add the calculated amount
                $modifiedSubtotal = floatval($subtotalExcludingTax) + $amountToAdd;

            @endphp
            <div class="cart-child-3-main-1-1">
                <div style="font-weight: 600;">Shipping</div>
                <div style="font-weight: 500;">Rs.{{ number_format($amountToAdd, 2) }}</div>
            </div>
            <div class="cart-child-3-main-1-1">
                <div style="font-weight: 600;">SubTotal</div>
                <div style="font-weight: 500;">Rs. {{ number_format($modifiedSubtotal, 2) }}</div>
            </div>
        </div>
        <div class="cart-child-3-main-2">
            @if (Cart::content()->isEmpty())
                <button disabled wire:loading.attr='disabled' id="go_to_checkout_button">GO
                    TO CHECKOUT</button>
            @else
                <button wire:click="redirectToUrl('{{ route('checkout') }}')" wire:loading.attr='disabled'
                    id="go_to_checkout_button"><span wire:loading.remove>GO
                        TO CHECKOUT</span>
                    <div wire:loading class="loader-cart"></div>
                </button>
            @endif
        </div>
    </div>

</div>
