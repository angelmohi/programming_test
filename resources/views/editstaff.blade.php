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
                        <div class="header">
                            <h3>Edit Staff</h3>
                        </div>

                        <form class="col-12 padded padded-bottom padded-la" action="/stafflist/updateStaff" method="post" id="form_staff">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $user->name }}" required/>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled/>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <label>Status</label><br/>
                                    <td>
                                        @if($user->status == 'active')
                                        <span class="label label-success">Active</span>
                                        @elseif($user->status == 'invited')
                                        <span class="label label-info">Invitation Sent</span>
                                        @else
                                        <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                </div>
                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="{{ $id_staff }}" />
                        </form>
                        
                        @if(Session::has('delete'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{Session::get('delete')}}
                        </div>
                        @endif

                        <div class="col-12 header">
                            <h3>Policies <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#addProducts"><i class="fa fa-plus"></i> Add Policy</button></h3>
                        </div>

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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($policies_staff as $policy)
                                        <tr>
                                            <td>{{ $policy->code }}</td>
                                            <td>{{ $policy->plan_reference }}</td>
                                            <td>{{ $policy->last_name }}, {{ $policy->first_name }}</td>
                                            <td>{{ $policy->investment_house }}</td>
                                            <td>{{ $policy->last_operation }}</td>
                                            <td>
                                                <form action="/stafflist/removePolicy" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_staff" value="{{ $id_staff }}">
                                                    <input type="hidden" name="id_policy" value="{{ $policy->id }}">
                                                    <button type="submit" title="Remove" class="text-danger">Remove</button>

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row padded">
                                <div class="col-6">
                                    <button type="submit" name="submit" class="btn btn-success" id="save_button"><i class="fa fa-floppy-o"></i> Save</button>
                                    
                                </div>
                                <div class="col-6 text-right padded padded-top">
                                    <form action="/stafflist/removeStaff" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $id_staff }}">
                                        <button title="Remove User" class="text-danger"><i class="fa fa-trash"></i> Remove Staff</button>

                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Available Policies</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Policy</th>
                                                        <th>Plan Reference</th>
                                                        <th>Member Name</th>
                                                        <th>Investment House</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($policies as $policy)
                                                    <tr>
                                                        <td>{{ $policy->code }}</td>
                                                        <td>{{ $policy->plan_reference }}</td>
                                                        <td>{{ $policy->last_name }}, {{ $policy->first_name }}</td>
                                                        <td>{{ $policy->investment_house }}</td>
                                                        <td>
                                                            <form action="/stafflist/updatePolicy" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_staff" value="{{ $id_staff }}">
                                                                <input type="hidden" name="id_policy" value="{{ $policy->id }}">
                                                                <button type="submit" title="Add Client" class="text-site1"><i class="fa fa-plus"></i></button>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                
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


            $("#save_button").click(function(){
                
                $("#form_staff").submit();

            });


        } );

    </script>
    
</x-app-layout>