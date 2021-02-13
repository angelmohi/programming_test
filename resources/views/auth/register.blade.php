<x-guest-layout>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="m-t-10 p-20">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign Up</h4>
                        </div>
                    </div>
    

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('accept') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group row">
                            <div class="col-12">

                                <input id="name" class="form-control" type="text" name="name" value="{{ $invitation->name }}" placeholder="Name" required autofocus />
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group row">
                            <div class="col-12">

                                <input id="email" class="form-control" type="email" name="email" value="{{ $invitation->email }}" placeholder="Username" required autofocus readonly/>
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

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <div class="col-12">
                                <x-input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                placeholder="Password Confirmation"
                                                required />
                            </div>
                        </div>

                        <input id="invitation" type="hidden" name="invitation" value="{{ $invitation->token }}" />
                        <input id="status" type="hidden" name="status" value="active" />
                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <x-button class="btn btn-success btn-block waves-effect waves-light">
                                    Register
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
