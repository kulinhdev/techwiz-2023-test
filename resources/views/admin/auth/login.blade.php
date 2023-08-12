<x-admin-auth-layout>
    <x-slot name="title">
        Login
    </x-slot>

    <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p>Sign in to continue.</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src={{ asset("assets/admin/images/profile-img.png")}} alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="auth-logo">
                <a href="#" class="auth-logo-light">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle bg-light">
                            <img src={{ asset("assets/admin/images/logo-light.svg")}} alt="" class="rounded-circle"
                                height="34">
                        </span>
                    </div>
                </a>

                <a href="#" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle bg-light">
                            <img src={{ asset("assets/admin/images/logo.svg")}} alt="" class="rounded-circle"
                                height="34">
                        </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <!-- Session Status -->
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ session('status')}} <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email"
                            placeholder="Enter email" autocomplete="email" required>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                aria-label="Password" aria-describedby="password-addon">
                            <button class="btn btn-light " type="button" id="password-addon"><i
                                    class="mdi mdi-eye-outline"></i></button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-check" name="remember">
                        <label class="form-check-label" for="remember-check">
                            Remember me
                        </label>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                            In</button>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                            Forgot your
                            password?</a>
                    </div>
                    @endif
                    @if (Route::has('register'))
                    <div class="mt-2 text-center">
                        <div>
                            <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary">
                                    Signup now </a> </p>
                        </div>
                    </div>
                    @endif
                </form>
            </div>

        </div>
    </div>

</x-admin-auth-layout>
