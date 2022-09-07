@extends('./layout_master')
@section('admin')

{{--  Add Modal  --}}
<div id="addBrandModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Brand</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addbrandForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <label for="">Brand Name <span class="text-danger">*</span></label>
                        <input type="text" id="brand_name" name="brand_name" class="form-control" placeholder="Radia">
                        <span id="error_brandname" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="">
                        <label for="">Brand Image <span class="text-danger">*</span></label>
                        <input type="file" id="brand_image" name="brand_image" class="form-control">
                        <span id="error_brandimage" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Added</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{--  Edit Modal  --}}
<div id="editBrandModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Brand</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatebrandForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text"   id="edit_check_id" >
                <div class="modal-body">

                    <div class="">
                        <label for="">Brand Name <span class="text-danger">*</span></label>
                        <input type="text" id="edit_brand_name" name="brand_name" value="" class="form-control" placeholder="Radia">

                        <span id="then_b" class="text-danger"></span>

                    </div>
                    <br>
                    <div class="">
                        <label for="">Brand Image <span class="text-danger">*</span></label>
                        <input type="file" id="edit_brand_image" name="brand_image" class="form-control">
                        <span id="then_c" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Updated</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 30px">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-10">
                                    <h1 class="header-title" style="font-size: 1.5rem">Brands List</h1>
                                </div>
                                <div class="col-lg-2" style="margin-bottom:10px;padding-left: 75px;">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</button>
                                </div>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($brands as $b)

                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $b->brand_name }}</td>
                                        <td> <img src="{{ asset($b->brand_image) }}" height="100" width="100" alt=""> </td>
                                        <td>
                                            <button type="button" value="{{$b->id}}"  class="btn btn-success brand_edit" ><i class="fas fa-highlighter"></i></button>

                                            <button class="btn btn-danger brand_del" ><a href="{{ url('/delete/brand', [$b->id]) }}"><i class="fas fa-trash-alt"></i></a></button>
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
        {{--   container end  --}}
    </div>
     {{--  content end  --}}
</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

             /** cdn */
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /** Add Brand store */
            $('#addbrandForm').on('submit',function(e){
                e.preventDefault();
                //console.log('happening');

                let formdata = new FormData($('#addbrandForm')[0]);
                console.log(formdata);
                $.ajax({
                    type: "POST",
                    url: "{{ route('brand.store') }}",
                    data: formdata ,
                    contentType:false,
                    processData:false,
                    success: function (response) {
                        console.log(response);
                        if(response.status == 400){
                            $('#error_brandname').text(response.errors.brand_name);
                            $('#error_brandimage').text(response.errors.brand_image);
                        }
                        else{
                            toastr.success(response.message);
                            location.reload();
                            $('#addBrandModal').modal(hide);
                        }

                    }
                });

            });

            /** Edit brand */
            $('.brand_edit').on('click',function(){

               let brand_id = $(this).val();
               //console.log(brand_id);
               $('#editBrandModal').modal('show');
               //console.log('happening?');
               $.ajax({
                type: "GET",
                url: `/edit/brand/${brand_id}`,
                success: function (response) {
                    //console.log(response);
                    $('#edit_brand_name').val(response.brand.brand_name);
                    //$('#edit_brand_image').val(response.brand.brand_image);
                    $('#edit_check_id').val(brand_id);

                }

               });
            });

            /** Update Brand */
            $('#updatebrandForm').on('submit',function(e){
                e.preventDefault();
                //console.log('happening');

                let brand_id = $('#edit_check_id').val();
                console.log(brand_id);
                let updateformdata = new FormData($('#updatebrandForm')[0]);
                console.log(updateformdata);

                axios.post(`/update/brand/${brand_id}`, updateformdata)

                .then(response => {
                    console.log(response);
                    if (response.status == 400) {
                        $('#then_b').text(response.errors.brand_name);
                        $('#then_c').text(response.errors.brand_image);

                    } else {
                        //alert('success');
                        toastr.success(" {{ Session::get('message') }} ");
                        location.reload();
                        $('#editBrandModal').modal('hide');
                    }
                });
            });



        }); //main doc file end

    </script>



@endsection




