@extends('layouts.app')
@section('content')
<div class="pagetitle">
      <h1>Health Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">Table</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Health Facilities Information</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <div class="col-md-12 mb-4 text-right">
                        <a class="btn btn-success" id="addNewBook"> Add</a>
                    </div>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Names</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($facilitys as $facility)
                 <tr>
                    <th scope="row">{{ $facility->id }}</th>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->email }}</td>
                    <td>{{ $facility->is_admin }}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-primary edit btn-sm" data-id="{{ $facility->id }}"> <i class="bi bi-pencil-square"></i> </a>
                        <a href="javascript:void(0)" class="btn btn-primary delete btn-sm" data-id="{{ $facility->id }}"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {!! $facilitys->links() !!}
            </div>
          </div>

        </div>
      </div>
    </section>



<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
        <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
                
              <input type="hidden" name="id" id="id">
               
               <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Names</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-6 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="is_admin">User Type</label>
                            <label>
                            <input type="radio" name="1" value="1">Admin
                          </label>
                          <label>
                            <input type="radio" name="0" value="0">Facility
                          </label>
                        </div>
                    </div>
                     <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    <div style="padding-top: 10px;" class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save</button>
                    </div>
              
              
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Health Facility Information");
       $('#ajax-book-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-facility') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Health Facility Information");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#name').val(res.name);
              $('#email').val(res.email);
              $('#password').val(res.password);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-facility') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
          var id = $("#id").val();
          var names = $("#name").val();
          var email = $("#email").val();
          var password = $("#password")
          $("#btn-save").html('Saving...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add-update-facility') }}",
            data: {
              id:id,
              name:name,
              email:email,
              password:password
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>

@endsection