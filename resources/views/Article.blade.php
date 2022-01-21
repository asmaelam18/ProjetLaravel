@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  @foreach($data as $row)
    <div class="col-md-4 col-lg-3 ml-lg-0 ml-2 pb-2 ">
      <div class="card h-100"  style="width: 15rem; ">
      <a href="{{ route('articles.show',$row) }}" ><img class="card-img img-responsive" src="{{ asset('images')}}/{{$row->img }}"  alt="book"></a>
        <div class="card-body">
          <h4 class="card-title">{{$row->title }}</h4>
          <h6 class="card-subtitle mb-2 text-muted">{{$row->writter }}</h6>
          <p class="card-text">
              {{$row->desc }}            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">{{$row->price }}-dh</h5></div>
             <a href="#" class="btn btn-primary mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  
  </div>
</div>
@endsection
