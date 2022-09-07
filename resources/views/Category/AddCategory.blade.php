
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')


{{--  Add Modal  --}}
<div id="addCatModal" class="modal fade" style="margin-top: 6rem" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addCatForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="category_name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" id="category_name" name="category_name" class="form-control" parsley-trigger="change" placeholder="Enter Category name">
                        <span id="error_catname" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



{{--  Edit Modal  --}}
<div id="editCatModal" class="modal fade" style="margin-top: 6rem" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCatForm" method="POST">
                @csrf
                <input type="hidden" id="edit_cat_id">
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="category_name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" id="edit_category_name" name="category_name" class="form-control" parsley-trigger="change" >
                        <span id="catname" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2"></div>

                <div class="col-lg-8">
                    <div class="card" style="margin-top: 30px">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-9">
                                    <h1 class="header-title" style="font-size: 1.5rem">Category List</h1>
                                </div>
                                <div class="col-lg-3" style="margin-bottom:10px;padding-left: 75px;">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addCatModal"><i class="fa-solid fa-circle-plus"></i> Add Category</button>
                                </div>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                   @foreach ($categories as $cat)

                                   <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $cat->category_name }}</td>
                                    <td>
                                        <button type="button" style="margin-right: 10px" value="{{$cat->id}}"  class="btn btn-success cat_edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" ><i class="fas fa-highlighter"></i></button>
                                        <button class="btn btn-danger brand_del" ><a href="{{ url('/delete/category', [$cat->id]) }}" id="delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a></button>
                                    </td>
                                   </tr>

                                   @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

                <div class="col-lg-2"></div>
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
         $('#addCatForm').on('submit',function(e){
            e.preventDefault();
            //console.log('happening');

            let formdata = new FormData($('#addCatForm')[0]);
            console.log(formdata);
            $.ajax({
                type: "POST",
                url: "{{ route('store.category') }}",
                data: formdata ,
                contentType:false,
                processData:false,
                success: function (response) {
                    console.log(response);
                    if(response.status == 400){
                        $('#error_catname').text(response.errors.category_name);

                    }
                    else{
                        toastr.success(response.message);
                        location.reload();
                        $('#addCatModal').modal(hide);
                    }

                }
            });

        });
        /** edit Brand */
        $("tbody").on("click", ".cat_edit", function(){
        //$('.cat_edit').on('click',function(){
            //alert("alert");

            let cat_id = $(this).val();
            //console.log(brand_id);
            $('#editCatModal').modal('show');
            //console.log('happening?');
            $.ajax({
             type: "GET",
             url: `/edit/category/${cat_id}`,
             success: function (response) {
                 //console.log(response);
                 $('#edit_category_name').val(response.category.category_name);
                 //$('#edit_brand_image').val(response.brand.brand_image);
                 $('#edit_cat_id').val(cat_id);

             }

            });
         });

          /** Update Brand */
          $('#editCatForm').on('submit',function(e){
            e.preventDefault();
            //console.log('happening');

            let cat_id = $('#edit_cat_id').val();

            let updateformdata = new FormData($('#editCatForm')[0]);

            axios.post(`/update/category/${cat_id}`, updateformdata)

            .then(response => {
                //console.log(response.data.message);
                //console.log(response.data.status);
                //console.log(response.data.errors.status);
                if(response.data.status == 400){

                    $('#catname').text(response.data.errors.category_name);
                }

                else{
                     console.log(response.data.message);
                    toastr.success(response.data.message);
                    $('#editCatModal').modal('hide');
                    location.reload();
                }

          })
        });

    }); //main function doc

</script>



 <script>
    $(function(){
      $(document).on('click','#delete',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
                    Swal.fire({
                    width: 400,
                    padding: '3em',
                    customClass: 'swal-height',
                    title: 'Are you sure?',
                    icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085D6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                      }
                    })
      });
    });
  </script>

@endsection
