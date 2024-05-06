<div>

    <div class="card-body">
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        <p class="login-box-msg">Sign in to Real World</p>
        <form wire:submit.prevent='login'>
            <div class="input-group mb-3">
                <input type="email" wire:model='email' class="form-control @error('email') is-invalid @enderror " placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <p class="invalid-feedback"> {{ $message }} </p>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" wire:model='password' class="form-control @error('password') is-invalid @enderror " placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            @error('password')
                <p class="invalid-feedback"> {{ $message }} </p>
            @enderror
            </div>

            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </div>
        </form>
        {{-- <p class="mb-1 mt-3">
            <a href="forgot-password.html">I forgot my password</a>
        </p> --}}
    </div>
</div>
