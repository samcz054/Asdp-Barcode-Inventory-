@extends('admin.layout.master')

@section('content')



    {{-- <div class="banner">
        <img src="{{url('backend/img/Ketapang.jpg')}}" class="img-fluid" style="width: 120%;">
        <h1 class="centered">WELCUM TO ASDP</h1>
    </div> --}}
    
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{url('backend/img/ketapang1.png')}}" class="d-block w-100" alt="...">
              <h1 class="centered text-center">Selamat Datang di ASDP Inventory Management</h1>
          </div>
        </div>
      </div>


@endsection