<div>
        {{-- <div class="auth-container-first">
            <div class="auth-container-1">
                <button style="opacity: 0 !important;cursor: default;"></button>
                <button onclick="closePopup()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-envelope"></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>What's your email?</div>
                <div>We'll check if you have an account</div>
            </div>
            <div class="auth-container-4 mt-2">
                <div class="email-form">
                    <form wire:submit='checkEmail'>
                        <div class="form-floating mb-3">
                            <input wire:model='email' type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button wire:loading.attr='disabled' type="submit">Continue</button>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- <div class="auth-container-second">
            <div class="auth-container-1">
                <button wire:click='backArrow' ><i class="fa-solid fa-arrow-left"></i></button>
                <button onclick="closePopup()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-user-lock"></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>Welcome back!</div>
                <div>Log in by typing your password.</div>
            </div>
            <div class="auth-container-4 mt-2">
                <div class="email-form">
                    <form wire:submit='login'>
                        <div class="form-floating mb-3">
                            <input wire:model='email' type="text" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='password' type="text" class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Password</label>
                            @error('password')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button wire:loading.attr='disabled' type="submit" >Log In</button>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- <div class="auth-container-third">
            <div class="auth-container-1">
                <button wire:click='backArrow' ><i class="fa-solid fa-arrow-left"></i></button>
                <button onclick="closePopup()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="auth-container-2">
                <button><i class="fa-solid fa-universal-access"></i></i></button>
            </div>
            <div class="auth-container-3 mt-3">
                <div>Let's get you started!</div>
                <div>First, let's create your bahtareen account with</div>
            </div>
            <div class="auth-container-4 mt-3">
                <div class="email-form">
                    <form wire:submit='register'>
                        <div class="form-floating mb-3">
                            <input wire:model='email' type="text" class="form-control @error('email') is-invalid @enderror " id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="custom-popup-row">
                            <div class="custom-popup-col">
                                <div class="form-floating mb-3">
                                    <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">First Name</label>
                                    @error('first_name')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                                </div>
                            </div>
                            <div class="custom-popup-col">
                                <div class="form-floating mb-3">
                                    <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Last Name</label>
                                    @error('last_name')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Password</label>
                            @error('password')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                        </div>
                        <button wire:loading.attr='disabled' type="submit" >Sign Up</button>
                    </form>
                </div>
            </div>
        </div> --}}
</div>
