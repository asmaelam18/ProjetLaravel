@extends('layouts.app')

@section('content')
<div class="container">
<div class="row bg-light col-12 mb-3">
  @if(isset($category))
  <h3>Featured {{$category->libelle}} </h3>
  <p> {{$category->desc}} </p>
  @endif
</div>
<div class="row">
  @foreach($data as $row)
    <div class="col-md-4 col-lg-3 ml-lg-0 ml-2 pb-2 ">
      <div class="card h-100"  style="width: 15rem; ">
      <a href="{{ route('books.show',$row) }}" ><img class="card-img img-responsive" src="{{ asset('images')}}/{{$row->img }}"  alt="book"></a>
        <div class="card-body">
          <b class="card-title">{{$row->title }}</b>
          <p class="card-subtitle mb-2 text-muted">{{$row->writer }}</p>      
        </div>
        <div class="card-footer mt-auto d-flex bottom-fixed justify-content-between align-items-center">
            <div class="price text-success"><strong class="mt-4">{{$row->price }}-dh</strong></div>
             <a href="#" class="btn btn-primary mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
      </div>
    </div>
    @endforeach
  
  </div>
</div>
</div>
@endsection
