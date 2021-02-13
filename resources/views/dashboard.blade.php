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
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Policy</th>
                                            <th>Plan Reference</th>
                                            <th>Member Name</th>
                                            <th>Investment House</th>
                                            <th>Last Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($policies as $policy)
                                        <tr class='clickable-row' data-href='{{ url('/policy/'.$policy->id) }}'>
                                            <td>{{ $policy->code }}</td>
                                            <td>{{ $policy->plan_reference }}</td>
                                            <td>{{ $policy->last_name }}, {{ $policy->first_name }}</td>
                                            <td>{{ $policy->investment_house }}</td>
                                            <td>{{ $policy->last_operation }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false
                //buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });

        } );

    </script>
</x-app-layout>
