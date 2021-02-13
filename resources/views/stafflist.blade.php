<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="wrapper" style="padding-top: 70px;">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12" style="padding-bottom: 20px;">
                    <div class="btn-group m-t-15">
                        
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="header">
                            <h3>Staff <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#sendInvitation"><i class="fa fa-plus"></i> Create Account</button></h3>
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @elseif(Session::has('email'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{Session::get('email')}}
                        </div>
                        @endif

                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Last Operation</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class='clickable-row' data-href='{{ url('/stafflist/'.$user->id) }}'>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->last_operation }}</td>
                                        <td>
                                            @if($user->status == 'active')
                                            <span class="label label-success">Active</span>
                                            @elseif($user->status == 'invited')
                                            <span class="label label-info">Invitation Sent</span>
                                            @else
                                            <span class="label label-danger">Disabled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="sendInvitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send Invitation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/stafflist/invite">
                                    @csrf
                                    <fieldset class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required/>
                                    </fieldset>
                                    
                                    <fieldset class="form-group">
                                        <label>Email</label>
                                        <input type="email"  name="email" class="form-control" required/>
                                    </fieldset>

                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane-o"></i> Send</button>
                                </form>
                                
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