<div>
    <div class="auth-container-second">
        <div class="auth-container-1">
            <span></span>
            <button onclick="closePopup1()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="auth-container-2">
            <button><i class="fa-solid fa-user-lock"></i></button>
        </div>
        <div class="auth-container-3 mt-3">
            <div>Welcome back!</div>
            <div>Log in by typing your password.</div>
            {{-- <div>{{ $email }}</div> --}}
        </div>
        <div class="auth-container-4 mt-2">
            <div class="email-form">
                <form wire:submit.prevent='login'>
                    <div class="form-floating mb-3">
                        <input wire:model.lazy='email' type="text"
                            class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input wire:model.lazy='password' type="password"
                            class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Password</label>
                        @error('password')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-1" id="forgot_password">
                        <span onclick="openPopup3()" >Forgot Password</span>
                    </div>
                    <button wire:loading.attr='disabled' type="submit"><span wire:loading.remove>Login</span>
                        <div wire:loading class="loader-cart">
                    </button>
                    {{-- <button wire:loading.attr='disabled' type="submit">Log In</button> --}}
                </form>
                <div id="create_account">
                    <span onclick="openPopup2()" >Create Account</span>
                </div>
            </div>
        </div>
    </div>
</div>
