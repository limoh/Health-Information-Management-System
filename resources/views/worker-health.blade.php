@extends('layouts.worker')
@section('content')
<div class="pagetitle">
      <h1>Health Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/worker/home">Home</a></li>
          <li class="breadcrumb-item">Health</li>
          <li class="breadcrumb-item active">Quick View</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Health Information</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
              <!---  <div class="col-md-12 mb-4 text-right">
                        <a class="btn btn-success" id="addNewBook"> Add</a>
                    </div>--->
                <thead>
                  <tr>
                    
                    <th scope="col">Names</th>
                    <th scope="col">Facility</th>
                    <th scope="col">Disease</th>
                    <th class="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($healths as $health)
                 <tr>
                    
                    <td>{{ $health->names }}</td>
                    <td>{{ $health->facility }}</td>
                    <td>{{ $health->disease }}</td>
                    <td>
                        <!---show && delete -->
                        <a href="{{ route('workershow-health',$health->id) }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>

                        <a href="javascript:void(0)" class="btn btn-primary delete btn-sm" data-id="{{ $health->id }}"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {!! $healths->links() !!}
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
                        <label for="names" class="col-sm-5 control-label">Names</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="names" name="names" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facility" class="col-sm-6 control-label">Facility</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="facility" name="facility" placeholder="Enter facility" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="disease" class="col-sm-6 control-label">Disease Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="disease" name="disease" placeholder="Enter disease name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Signs and Symptomps</label>
                        <div class="col-sm-12">
                            <textarea value="" id="symptomps_signs" name="symptomps_signs" required="" placeholder="Enter Signs and Symptomps" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Medication</label>
                        <div class="col-sm-12">
                            <textarea value="" id="medication" name="medication" required="" placeholder="Enter Medication" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Blood Sugar</label>
                        <div class="col-sm-12">
                            <textarea value="" id="blood_sugar" name="blood_sugar" required="" placeholder="Enter Blood Sugar" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Blood Pressure</label>
                        <div class="col-sm-12">
                            <textarea value="" id="blood_pressure" name="blood_pressure" required="" placeholder="Enter Blood Pressure" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Weight</label>
                        <div class="col-sm-12">
                            <textarea value="" id="weight" name="weight" required="" placeholder="Enter Weight" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Height</label>
                        <div class="col-sm-12">
                            <textarea value="" id="height" name="height" required="" placeholder="Enter Height" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Side Effects</label>
                        <div class="col-sm-12">
                            <textarea value="" id="efects" name="efects" required="" placeholder="Enter Side Effects" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Allergy</label>
                        <div class="col-sm-12">
                            <textarea value="" id="allergy" name="allergy" required="" placeholder="Enter Allergy" class="form-control"></textarea>
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
       $('#ajaxBookModel').html("Add Health Information");
       $('#ajax-book-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-healths') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Health Information");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#names').val(res.names);
              $('#facility').val(res.facility);
              $('#disease').val(res.disease);
              $('#symptomps_signs').val(res.symptomps_signs);
              $('#medication').val(res.medication);
              $('#blood_sugar').val(res.blood_sugar);
              $('#blood_pressure').val(res.blood_pressure);
              $('#weight').val(res.weight);
              $('#height').val(res.height);
              $('#efects').val(res.efects);
              $('#allergy').val(res.allergy);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-healths') }}",
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
          var names = $("#names").val();
          var facility = $("#facility").val();
          var disease = $("#disease").val();
          var symptomps_signs = $("#symptomps_signs").val();
          var medication = $("#medication").val();
          var blood_sugar = $("#blood_sugar").var();
          var blood_pressure = $("#blood_pressure").val();
          var weight = $("#weight").val();
          var height = $("height").val();
          var efects = $("#efects").val();
          var allergy = $("#allergy").val();
          $("#btn-save").html('Saving...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add-update-healths') }}",
            data: {
              id:id,
              names:names,
              facility:facility,
              disease:disease,
              symptomps_signs:symptomps_signs,
              medication:medication,
              height:height,
              weight:weight,
              blood_sugar:blood_sugar,
              blood_pressure:blood_pressure,
              efects:efects,
              allergy:allergy,
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