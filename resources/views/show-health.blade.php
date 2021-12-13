@extends('layouts.user')
@section('content')

<div class="pagetitle">
      <h1>All Health Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/health-list">Home</a></li>
          <li class="breadcrumb-item">Health</li>
          <li class="breadcrumb-item active">All</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-12">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Current Patient's Health Status</h5>
              <div class="pt-2">

                <h6>Names</h6>
                <p>{{ $health->names }}</p>
                <hr class="dropdown-divider">
                <h6>Facility</h6>
                <p>{{ $health->facility }}</p>
                <hr class="dropdown-divider">
                <h6>Disease Name</h6>
                <p>{{ $health->disease }}</p>
                <hr class="dropdown-divider">
                <h6>Signs and Symptomps</h6>
                <p>{{ $health->symptomps_signs }}</p>
                <hr class="dropdown-divider">
                <h6>Treatment and Medication</h6>
                <p>{{ $health->medication }}</p>
                <hr class="dropdown-divider">
                <h6>Side Effects</h6>
                <p>{{ $health->efects }}</p>
                <hr class="dropdown-divider">
                <h6>Blood Sugar</h6>
                <p>{{ $health->blood_sugar }}</p>
                <hr class="dropdown-divider">
                <h6>Blood Pressure</h6>
                <p>{{ $health->blood_pressure }}</p>
                <hr class="dropdown-divider">
                <h6>Allergy</h6>
                <p>{{ $health->allergy }}</p>
                <hr class="dropdown-divider">
                <h6>Height</h6>
                <p>{{ $health->height }}</p>
                <hr class="dropdown-divider">
                <h6>Weight</h6>
                <p>{{ $health->weight }}</p>
                
              </div>

            </div>
          </div>

        </div>

      </div>
    </section>

@endsection