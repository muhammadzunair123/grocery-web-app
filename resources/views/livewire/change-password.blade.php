<div>
    <div class="auth-container-fifth">
        @if ($formSubmitted === false)
            <div class="auth-container-1">
                <span></span>
                <button onclick="closePopup4()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-key"></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>Choose a new password</div>
                <div>Enter the password you want to set for your account.</div>
                {{-- <div>{{ $email }}</div> --}}
            </div>
            <div class="auth-container-4 mt-2">
                <div class="email-form">
                    <form wire:submit.prevent='resetPassword'>
                        <input wire:model="token" hidden type="text">
                        <div class="form-floating mb-3">
                            <input wire:model='password' type="password"
                                class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">New Password</label>
                            @error('password')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='confirm_password' type="password"
                                class="form-control @error('confirm_password') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Confirm Password</label>
                            @error('confirm_password')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button wire:loading.attr='disabled' type="submit">Reset Password</button>
                        {{-- <button wire:loading.attr='disabled' type="submit"><span wire:loading.remove>Reset Password</span><div wire:loading class="loader-cart"></button> --}}
                    </form>
                </div>
            </div>
        @else
        <div class="auth-container-1">
            <span></span>
            <button onclick="closePopup3()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="auth-container-2">
            <button><i class="fa-solid fa-unlock-keyhole"></i></button>
        </div>
        <div class="auth-container-3 mt-3">
            <div>Password Changed Successfully!</div>
            <div>Now You Login To Your Account. Thank You!</div>
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
