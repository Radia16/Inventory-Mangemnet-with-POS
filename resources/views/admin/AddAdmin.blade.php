@extends('./layout_master')

@section('admin')

{{--  Add Modal  --}}
<div id="addAdminModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Admin</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="addAdminForm"    class="parsley-examples" enctype="multipart/form-data">
                @csrf

                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="mb-3">
                                <label for="userName" class="form-label">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="username"  parsley-trigger="change" placeholder="@username"  class="form-control" id="userName" />
                                <span id="error_username" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="col-md-6" >
                            <div class="mb-3">
                                <label for="FullName" class="form-label">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="fullname"  parsley-trigger="change" placeholder="Your Name" class="form-control" id="fullName" />
                                <span id="error_fullname" class="text-danger"></span>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pass1" class="form-label">Password<span class="text-danger">*</span></label>
                                <input id="pass1" name="password" type="password"  placeholder="Password" class="form-control" />
                                <span id="error_password" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="passWord2" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <input data-parsley-equalto="#pass1" name="repassword" type="password"   class="form-control" id="passWord2" />
                                <span id="error_repassword" class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                            <div class="col-md-4">

                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" value="{{old('email')}}" placeholder="xy@mail.com" class="form-control" id="emailAddress" />
                                    <span id="error_email" class="text-danger"></span>

                                </div>
                            </div>


                            <div class="col-md-4">

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change"   class="form-control" id="image" />
                                    <span id="error_image" class="text-danger"></span>

                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                        style="width: 100px; height: 100px;" alt="Image">
                                </div>
                            </div>



                    </div>
                </div>

                <div class="modal-footer "    style="padding-right: 17rem" >
                    <div class="button-list pe-xl-4 d-grid" >
                        <button class="btn width-xl btn-primary waves-effect waves-light" type="submit" >Submit</button>
                        {{--  <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>  --}}
                    </div>
                </div>
            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{--  end add modal  --}}


{{--  Edit Modal  --}}
<div id="editdAdminModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Admin</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="updateAdminForm"    class="parsley-examples" enctype="multipart/form-data">
                @csrf
                <input type="hidden"   id="edit_check_id" >
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="mb-3">
                                <label for="userName" class="form-label">User Name<span class="text-danger"></span></label>
                                <input type="text" name="username"  parsley-trigger="change"   class="form-control" id="edit_userName" />
                                <span id="er_username" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6" >
                            <div class="mb-3">
                                <label for="FullName" class="form-label">Full Name<span class="text-danger"></span></label>
                                <input type="text" name="fullname"  parsley-trigger="change" placeholder="Your Name" class="form-control" id="edit_fullName" />
                                <span id="er_fullname" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pass1" class="form-label">Password<span class="text-danger"></span></label>
                                <input id="edit_password" name="password" type="password"  placeholder="Password" class="form-control" />
                                <span id="er_password" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="passWord2" class="form-label">Confirm Password <span class="text-danger"></span></label>
                                <input data-parsley-equalto="#pass1" name="repassword" type="password"   class="form-control" id="edit_repassword" />
                                <span id="er_repassword" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email address<span class="text-danger"></span></label>
                                <input type="email" name="email" parsley-trigger="change" value="{{old('email')}}" placeholder="xy@mail.com" class="form-control" id="edit_emailAddress" />
                                <span id="er_email" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image<span class="text-danger"></span></label>
                                <input type="file" name="image" class="form-control" id="edit_image" />
                                {{--  <!-- <input type="file" name="image"    class="form-control" id="edit_ff_image" /> -->  --}}
                                <span id="er_image" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <img id="showImageEdit" src="{{ url('upload/no_image.jpg') }}"
                                    style="width: 100px; height: 100px;" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="padding-right: 17rem">
                    <div class="button-list pe-xl-4 d-grid">
                        <button class="btn width-xl btn-primary waves-effect waves-light" type="submit">Update</button>
                    </div>
                </div>

            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{--  end add modal  --}}

<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{--  <h4 class="header-title">Buttons example</h4>
                            <p class="text-muted font-13 mb-4">
                                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                                that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                            </p>  --}}

                            <div class="row">
                                <div class="col-lg-10">
                                    <h1 class="header-title" style="font-size: 1.5rem">Admin List</h1>
                                </div>
                                <div class="col-lg-2" style="margin-bottom:10px;padding-left: 75px;">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addAdminModal"><i class="fa-solid fa-circle-plus"></i> Add Admin</button>
                                </div>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>User Name</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($admins as $admin)

                                    <tr>
                                        <td>
                                            <div class="avatar-sm" style="height:3rem; width:4rem" >
                                                <img src="{{('/admin_img/'.$admin->image)}}" alt="" class="img-fluid rounded" style="height:3rem; width:4rem">
                                            </div>
                                        </td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->fullname}}</td>
                                        <td>{{$admin->email}}</td>

                                        <td>

                                            <button type="button" style="margin-right: 10px" value="{{ $admin->id }}" class="btn btn-primary admin_edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><a href="{{ url('/delete/admin',[$admin->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  id="delete"><i class="fas fa-trash-alt"></i></a></button>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div>

    </div>

</div>


@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
                $('#edit_image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImageEdit').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
    </script>

    <script>
        $(document).ready(function () {

            /* cdn */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /** add admin */
            //var timer = setInterval(time, 1000);
            $('#addAdminForm').on('submit',function(e){
                e.preventDefault();
            //console.log('happening');

            let formdata = new FormData($('#addAdminForm')[0]);
            //console.log(formdata);

            $.ajax({
                type: "Post",
                url: "{{ route('StoreAdmin') }}",
                data: formdata,
                contentType:false,
                processData:false,
                success: function (response) {
                    console.log(response);
                    if(response.status == 400){
                        $('#error_username').text(response.errors.username);
                        $('#error_fullname').text(response.errors.fullname);
                        $('#error_password').text(response.errors.password);
                        $('#error_repassword').text(response.errors.repassword);
                        $('#error_email').text(response.errors.email);
                        $('#error_image').text(response.errors.image);
                    }else{
                        toastr.success(response.message);
                        location.reload();
                        $('#addAdminModal').modal(hide);
                        //clearInterval(timer);
                    }
                }
            });

            });

            /** Edit brand */
            $('tbody').on('click', '.admin_edit',function(){
                //console.log('happening');
                let admin_id = $(this).val();
                //console.log(admin_id);
                $('#editdAdminModal').modal('show');
                //console.log('happening?');
                $.ajax({
                type: "GET",
                url: `/edit/admin/${admin_id}`,
                success: function (response) {
                    // console.log(response);
                    $('#edit_userName').val(response.admin.username);
                    $('#edit_fullName').val(response.admin.fullname);
                    $('#edit_emailAddress').val(response.admin.email);
                    $('#edit_password').val(response.admin.password);
                    $('#edit_repassword').val(response.admin.password);
                    //$('#edit_ff_image').val(response.admin.image);
                    //$('#edit_image').attr('src',`/admin_img/${response.admin.image}`);
                    //attr('src', data)

                    $('#showImageEdit').attr('src',`/admin_img/${response.admin.image}`);
                    $('#edit_check_id').val(admin_id);

                }

                });
            });

            /** update admin*/
            $('#updateAdminForm').on('submit',function(e){

                e.preventDefault();

                //$('#updateAdminForm').valiate();

                let admin_id = $('#edit_check_id').val();
                //console.log(admin_id);
                let updateform = new FormData($('#updateAdminForm')[0]);
                //console.log(updateform);

                axios.post(`/update/admin/${admin_id}`,updateform)

                .then(response => {
                    console.log(response);
                    if(response.data.status == 400){
                        $('#er_username').text(response.data.errors.username);
                        $('#er_fullname').text(response.data.errors.fullname);
                        $('#er_password').text(response.data.errors.password);
                        $('#er_repassword').text(response.data.errors.repassword);
                        $('#er_email').text(response.data.errors.email);
                        $('#er_image').text(response.data.errors.image);

                    }
                    else {

                        toastr.success(response.data.message);
                        $('#editdAdminModal').modal('hide');
                        location.reload();
                    }
                })
            })





        }); // main doc
    </script>


@endsection
