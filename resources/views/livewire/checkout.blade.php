<div>
    <div class="checkout-container">
        <center>
            <h2 class="pb-3">Checkout</h2>
        </center>
        <div class="checkout-row">
            <div class="checkout-col-1">
                <div class="checkout-col-1-1">
                    @if ($editingUserId != Auth::user()->id)
                        <div class="dev-address">
                            <div class="dev-address-1">
                                <h3>Delivery address</h3>
                                <button wire:click='EditCustomerAddress({{ Auth::user()->id }})'
                                    id="changebtn"><span wire:target='EditCustomerAddress' wire:loading.remove>Change</span><div wire:target='EditCustomerAddress' wire:loading class="loader-cart"></button>
                            </div>
                            <div class="dev-address-2">
                                <div class="dev-address-2-1">
                                    <i class="fa-regular fa-location-dot" style="font-size: 1.4rem;color: black"></i>
                                </div>
                                @if (!empty($customerAddress))
                                    <div class="dev-address-2-1">
                                        <h6 style="font-weight: 600">{{ $customerAddress->address }}</h6>
                                        <span class="span-1">{{ $customerAddress->city }}</span>
                                        @if (!empty($customerAddress->apartment))
                                            <span class="span-2">Apartment: {{ $customerAddress->apartment }}</span>
                                        @endif
                                        <span class="span-3">Note to rider: </span>
                                        <span class="span-4">{{ $customerAddress->notes }}</span>
                                    </div>
                                @else
                                    <div class="dev-address-2-1">
                                        <h6 style="font-weight: 600">No Address Found</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="dev-address">
                            <div class="dev-address-1">
                                <h3>Delivery address</h3>
                            </div>
                            {{-- <form action="" wire:submit.prevent='update'> --}}
                            <div class="dev-address-2">
                                <div style="width: 100%">
                                    <div style="display: flex;flex-direction: row;gap: 10px;width: 100%;">
                                        <div style="">
                                            <div class="form-floating">
                                                <select wire:model='city'
                                                    class="form-select @error('city') is-invalid @enderror"
                                                    id="floatingSelect" aria-label="Floating label select example">
                                                    <option value="" selected>Select Here</option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Sialkot">Sialkot</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                </select>
                                                <label for="floatingSelect">City</label>
                                                @error('city')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="form-floating mb-3">
                                                <input wire:model="zip_code" type="number"
                                                    class="form-control @error('zip_code') is-invalid @enderror"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Zip Code</label>
                                                @error('zip_code')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%">
                                <div class="form-floating mb-3">
                                    <input wire:model='address' type="text"
                                        class="form-control  @error('address') is-invalid @enderror" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Address</label>
                                    @error('address')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input wire:model='apartment' type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Apartment, Suite, e.t.c</label>
                                </div>
                                <div class="form-floating">
                                    <textarea wire:model='notes' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Note to rider - e.g. building, landmark</label>
                                </div>
                            </div>
                            <div class="save_continue_container">
                                <button wire:click='update'><span wire:loading.remove>Save & Continue</span><div wire:loading class="loader-cart"></button>
                            </div>
                            {{-- </form> --}}
                        </div>
                    @endif
                </div>
                <div class="checkout-col-1-2">
                    <h3>Personal details</h3>
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="email" value="{{ Auth::user()->email }}" readonly
                                class="form-control readonly-email-checkout" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div style="display: flex;flex-direction: row;gap: 8px;justify-content: space-between">
                            <div style="width: 50%" class="form-floating mb-3">
                                <input wire:model='first_name' type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">First Name</label>
                                @error('first_name')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div style="width: 50%" class="form-floating mb-3">
                                <input wire:model='last_name' type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Last Name</label>
                                @error('last_name')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='mobile' type="number"
                                class="form-control @error('mobile') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Mobile Number</label>
                            @error('mobile')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
            <div class="checkout-col-2">
                <div class="checkout-col-2-1">
                    <h3>Your order from <h5>Bahtareen.com</h5>
                    </h3>
                </div>
                <div class="checkout-col-2-2">
                    @if ($cartContent->isNotEmpty())
                        @foreach ($cartContent as $item)
                            <div class="checkout-card">
                                <div class="checkout-card-1">
                                    {{ $item->qty }} X {{ $item->name }}
                                </div>
                                <div class="checkout-card-2">
                                    Rs. {{ number_format($item->qty * $item->price, 2) }}
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="checkout-col-2-3 mt-2">
                    <div class="text-checkout-1">
                        <div class="text-checkout-1-1">Subtotal</div>
                        <div class="text-checkout-1-2">Rs. {{ Cart::subtotal() }}</div>
                    </div>

                    @php
                        // Get the subtotal without taxes and fees from the cart
                        $subtotalExcludingTax = Cart::subtotal(2, '.', '');

                        // Determine the amount to add based on the subtotal
                        $amountToAdd = $subtotalExcludingTax > 0 && $subtotalExcludingTax < 3000 ? 80 : 0;

                        // Convert the subtotal to a float and add the calculated amount
                        $modifiedSubtotal = floatval($subtotalExcludingTax) + $amountToAdd;

                    @endphp
                    <div class="text-checkout-2">
                        <div class="text-checkout-2-1">Standard delivery</div>
                        @if ($amountToAdd === 0)
                            <div class="text-checkout-2-2">Free</div>
                        @else
                            <div class="text-checkout-2-2">{{ number_format($amountToAdd, 2) }}</div>
                        @endif
                    </div>
                    {{-- <div class="text-checkout-3">
                        <div class="text-checkout-3-1">Discount</div>
                        <div class="text-checkout-3-2">Rs. 1,994.50</div>
                    </div> --}}
                </div>
                <div class="checkout-col-2-4 mt-1">
                    <div class="total-checkout">
                        <div class="total-checkout-1">
                            Total
                        </div>
                        <div class="total-checkout-2">Rs. {{ number_format($modifiedSubtotal, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pay_now_container">
            <button wire:loading.attr='disabled' type="submit" wire:click='placeOrder' id="pay_now_checkout"><span wire:loading.remove wire:target='placeOrder'>Place Order</span><div wire:target='placeOrder' wire:loading class="loader-cart"></button>
        </div>
    </div>
    <div id="message-container"
        style="@if (Session::has('success')) transform: translateX(-50%) translateY(0%); @endif"
        class="message-container">
        <div class="message-child-1">
            <i style="@if (Session::has('success')) opacity:1; transform:scale(1); @endif"
                class="fa-regular fa-circle-check"></i>
        </div>
        <div class="message-child-2">
            {{ Session::get('success') }}
        </div>
        <div class="message-child-3">
            <button onclick="closeMessage()"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
    </div>
</div>

{{-- @section('script')
        <script>
            setTimeout(function() {
                var messageContainer = document.getElementById('message-container');
                if (messageContainer) {
                    messageContainer.style.transform = 'translateX(-50%) translateY(400%)';
                }
            }, 5000);
        </script>
@endsection --}}
