<x-guest-layout>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="m-t-10 p-20">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h4>
                        </div>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    

                    <form method="POST" action="{{ route('login') }}" class="m-t-20">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group row">
                            <div class="col-12">

                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Username" required autofocus />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <div class="col-12">
                                <x-input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                                required autocomplete="current-password" />
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <label for="remember_me">
                                        
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <x-button class="btn btn-success btn-block waves-effect waves-light">
                                    Log In
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Tether for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
</x-guest-layout>
