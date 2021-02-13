<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="wrapper" style="padding-top: 80px;">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12" style="padding-bottom: 20px;">
                    
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="col-12">
                            <div class="table-responsive">
                                <h3 class="text-center">Policy</h3>
                                <div class="row mt-5">
                                    <div class="col-3">
                                        Code
                                    </div>
                                    <div class="col-9">
                                        {{ $policy->code }}
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        Plan Reference
                                    </div>
                                    <div class="col-9">
                                        {{ $policy->plan_reference }}
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        Member Name
                                    </div>
                                    <div class="col-9">
                                        {{ $policy->last_name }}, {{ $policy->first_name }}
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        Investment House
                                    </div>
                                    <div class="col-9">
                                        {{ $policy->investment_house }}
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        Last Operation
                                    </div>
                                    <div class="col-9">
                                        {{ $policy->last_operation }}
                                    </div>

                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <a class="btn btn-danger" href="/dashboard">Go Back</a>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

               

            </div>
            <!-- end row -->


        </div> <!-- container -->


        <!-- Footer -->
        <footer class="footer">
            &copy; 2017. All Righs Reserved.
        </footer>
        <!-- End Footer -->

    </div> <!-- End wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Tether for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

</x-app-layout>
