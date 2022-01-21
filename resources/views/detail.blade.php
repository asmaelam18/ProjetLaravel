@extends('layouts.app')
@section('content')
<section>
  <div class="container ">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-10. xl-lg-10 ">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body">
            <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 img-responsive" >
                <img src="{{ asset('images')}}/{{$Book->img }}" class="img-fluid justify-content-center"  alt="book">
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8">
              <p class="text-center h3 fw-bold">{{ $Book->title}}</p>
                <div class="d-flex flex-row align-items-center">
                  <div class="form-outline flex-fill">
                    <p><strong>Author:</strong> 
                    {{ $Book->writer}}</p>
                    <p>
                    {{ $Book->desc}}
                    </p>
                    <p><strong>Publication date:</strong>{{ $Book->publicdate}}</p>
                    <p><strong>Format:</strong>{{ $Book->format}} </p>                   
                    <p><strong>Price:</strong> 
                    {{ $Book->price}}-dh</p>
                  </div>
                </div>          
                <div class="d-flex flex-row align-items-center">
                  <div class="form-outline flex-fill mb-0">
                  </div>
                </div>               
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Add To cart') }}
                  </button>
                </div>
            </div>     
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      @if(count($Samewriter)>1 )
      <h4>More by {{ $Book->writer}}</h4>
      @foreach($Samewriter as $row)
        @if($row->id!=$Book->id)
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
        @endif
        @endforeach  
        @endif

    </div>

    <div class="row">
    @if(count($similaire)>1 )

      <h4>Related books</h4>
  @foreach($similaire as $row)
  @if($row->id!=$Book->id)

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
    @endif
    @endforeach
    @endif

  </div>
</section>
@endsection
