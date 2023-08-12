<x-admin-auth-layout>
    <x-slot name="title">
        Reset Password
    </x-slot>

    <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Reset Password !</h5>
                        <p>Reset your password account.</p>
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
                <h5 class="font-size-14 mb-4">
                    Enter your Email and instructions will be sent to you!
                </h5>

                <!-- Session Status -->
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ session('status')}} <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email"
                            placeholder="Enter email" autocomplete="email" required>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Reset</button>
                    </div>

                    @if (Route::has('login'))
                    <div class="mt-4 text-center">
                        <div>
                            <p>Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary">
                                    Sign In here </a> </p>
                        </div>
                    </div>
                    @endif
                </form>
            </div>

        </div>
    </div>

</x-admin-auth-layout>
