<div>
    <div class="auth-container-fourth">
        @if ($formSubmitted === false)
            <div class="auth-container-1">
                <span></span>
                <button onclick="closePopup3()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-key"></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>Forgot your password?</div>
                <div>Enter your email and we'll send you a link to reset your password.</div>
                {{-- <div>{{ $email }}</div> --}}
            </div>
            <div class="auth-container-4 mt-2">
                <div class="email-form">
                    <form wire:submit.prevent='forgot'>
                        <div class="form-floating mb-3">
                            <input wire:model='email' type="email"
                                class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button wire:loading.attr='disabled' type="submit"><span wire:loading.remove>Continue</span>
                            <div wire:loading class="loader-cart">
                        </button>
                    </form>
                    <div id="create_account">
                        <span onclick="openPopup1()">Back To Login</span>
                    </div>
                </div>
            </div>
        @else
            <div class="auth-container-1">
                <span></span>
                <button onclick="closePopup3()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-inbox"></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>Check your email!</div>
                <div>We sent you an email with instructions to reset your password. Don't forget to look in your spam folder.</div>
                {{-- <div>{{ $email }}</div> --}}
            </div>
            <div class="auth-container-4 mt-2">
                <div class="email-form">
                        <button wire:loading.attr='disabled' onclick="openPopup1()"><span wire:loading.remove>Back To Login</span>
                            <div wire:loading class="loader-cart">
                        </button>
                </div>
            </div>
        @endif
    </div>
</div>
