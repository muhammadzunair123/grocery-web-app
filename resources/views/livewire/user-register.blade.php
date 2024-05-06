<div>
    <div class="auth-container-third">
        <div class="auth-container-1">
            <span></span>
            <button onclick="closePopup2()"><i class="fa-solid fa-xmark"></i></button>
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
                <form wire:submit.prevent='register'>
                    <div class="form-floating mb-3">
                        <input wire:model.lazy='Email' type="text" class="form-control @error('Email') is-invalid @enderror " id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        @error('Email')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="custom-popup-row">
                        <div class="custom-popup-col">
                            <div class="form-floating mb-3">
                                <input wire:model.lazy="First_name" type="text" class="form-control @error('First_name') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">First Name</label>
                                @error('First_name')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                            </div>
                        </div>
                        <div class="custom-popup-col">
                            <div class="form-floating mb-3">
                                <input wire:model.lazy="Last_name" type="text" class="form-control @error('Last_name') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Last Name</label>
                                @error('Last_name')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model.lazy="Password" type="password" class="form-control @error('Password') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Password</label>
                        @error('Password')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                    </div>
                    <button wire:loading.attr='disabled' type="submit"><span wire:loading.remove>Sign Up</span>
                        <div wire:loading class="loader-cart">
                    </button>
                </form>
                <div id="create_account">
                    <span onclick="openPopup1()">Click Here To Login</span>
                </div>
            </div>
        </div>
    </div></div>
