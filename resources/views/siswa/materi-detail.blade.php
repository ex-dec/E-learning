@extends('siswa.layouts.sidebar')
@section('content')

<div class="container my-5">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Card dengan Dropdown</h5>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pilihan
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">sesil</a>
        <a class="dropdown-item" href="#">sesil 2</a>
        <a class="dropdown-item" href="#">sesil 3</a>
      </div>
    </div>
  </div>
</div>


@endsection