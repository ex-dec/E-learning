@extends('siswa.layouts.sidebar')
@section('content')
  <div class="container my-5">
   <div class="row row-cols-1 row-cols-md-5 g-3">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-body">
         <h3 class="card-title font-weight-bolder text-dark">Intermediate</h3>
         <div class="row pb-3">
            <div class="col-md-5 card-text text-dark">Nama Guru</div>
            <div class="col-md-7 card-text text-dark">: Eccy Abla</div>
         </div>
         <div class="row pb-3">
            <div class="col-md-5 card-text text-dark">Jadwal</div>
            <div class="col-md-7 fas fa-calendar-alt"style='font-size:14px'> Rabu 19:00 - 22:00</div>
         </div>
         <div class="row pb-4">
            <div class="col-md-5 card-text text-dark"></div>
         <div class="col-md-7 fas fa-video"style='font-size:14px'> Online</div>
         </div>
         <div class="row pb-3">
         <div class="col-md-2 card-text text-dark text-center">
           <a href="#" class="btn btn-primary weight-100">Presensi</a>
        </div>
            <div class="col-md-10 card-text text-dark text-right"><a href="#" class="btn btn-primary">
            <i class="fas fa-video"></i> Link</a></div>
        </div>
      </div> 
    </div>
</div>

<div class="col-md-6 col-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title font-weight-bolder text-dark">History Presensi</h5>
      <p class="card-text"></p>
      
      <!-- Tabel di dalam Card -->
      <table class="table">
        <tbody>
          <tr>
            <td>Id</td>
            <td>Tanggal</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      
    </div> 
  </div>
</div>
@endsection
