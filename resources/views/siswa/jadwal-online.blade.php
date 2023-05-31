@extends('siswa.layouts.navbar')
@section('title', 'Dashboard')
@section('content')

     <!-- Begin Page Content -->
     <div class="container-fluid">

     <div class="container my-5">
  <div class="col-md-4 col-sm-6 mb-3">
    <div class="card bg-light mb-3">
      <div class="card-header bg-primary text-light font-weight-bold">Senin</div>
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-file-text-fill text-dark"></i> Basic</h5>
        <div class="row pb-3">
        <div class="col-md-5 fas fa-video"style='font-size:14px text-dark'> Online</div>
        <div class="col-md-7 fas fa-clock"style='font-size:14px text-dark'> 19:00 - 22:00</div>
         </div>
    </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="col-md-4 col-sm-6 mb-3">
    <div class="card bg-light mb-3">
      <div class="card-header bg-secondary text-light font-weight-bold">Rabu</div>
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-file-text-fill text-dark"></i> Intermediate</h5>
        <div class="row pb-3">
        <div class="col-md-5 fas fa-video"style='font-size:14px text-dark'> Online</div>
        <div class="col-md-7 fas fa-clock"style='font-size:14px text-dark'> 19:00 - 22:00</div>
         </div>
    </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="col-md-4 col-sm-6 mb-3">
    <div class="card bg-light mb-3">
      <div class="card-header bg-info text-light font-weight-bold">Jumat</div>
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-file-text-fill text-dark"></i> Advance</h5>
        <div class="row pb-3">
        <div class="col-md-5 fas fa-video"style='font-size:14px text-dark'> Online</div>
        <div class="col-md-7 fas fa-clock"style='font-size:14px text-dark'> 19:00 - 22:00</div>
         </div>
    </div>
    </div>
  </div>
</div>
@endsection