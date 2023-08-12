<x-admin-auth-layout>
    <x-slot name="title">
        Login
    </x-slot>

    <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Free Register !</h5>
                        <p>Get your new account now.</p>
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
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email"
                            placeholder="Enter email" autocomplete="email" required>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name"
                            placeholder="Enter username" required>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

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

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Enter confirm password" aria-label="Confirm Password"
                                aria-describedby="cfpassword-addon">
                            <button class="btn btn-light " type="button" id="cfpassword-addon"><i
                                    class="mdi mdi-eye-outline"></i></button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                    </div>

                    @if (Route::has('login'))
                    <div class="mt-4 text-center">
                        <div>
                            <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary">
                                    Login now </a> </p> 
                        </div>
                    </div>
                    @endif
                </form>
            </div>

        </div>
    </div>

</x-admin-auth-layout>
