@extends('layouts.frontt')
@section('content')
<section class="content">
    <div class="container">
      <div class="main-carousel" data-flickity='{ "wrapAround": false, "freScroll":true, "autoPlay": 3000, "pauseAutoPlayOnHover": true  }'>
        @foreach ($banners->where('place','slider') as $item)
        <div class="carousel-cell">
          <a href="{{$item->url}}"><img src="{{ asset('pics/'.$item['image'].'/'.$item['image'] ) }}" alt="{{$item->title}}"></a>
        </div>
        @endforeach
      </div>
      <div class="phoneset">
        <div class="carouseltitle">
          <h2>آخرین محصولات</h2>
          <p>آخرین محصولات رواق را در اینجا مشاهده کنید.</p>
        </div>
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 col-6">
                <div class="carousel-cell carousels" style="width:fit-content !important;">
                    <div class="carouseldn">
                        <a href="{{route('product',['id'=>$item->id])}}">
                            <img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->name}}">
                        </a>
                      <div class="productdesc">
                        <a href="{{route('product',['id'=>$item->id])}}">{{$item->name}}</a>
                        <p>{!! \Illuminate\Support\Str::limit($item->explain, 55, ' ...') !!}</p>
                        <div class="pricepl">
                          @if ($item->discount != NULL)
                            <p class="finalprice"><?php echo number_format($item->price) ?> تومان</p>
                            <p class="originalprice"><?php echo number_format($item->discount) ?> تومان</p>
                          @else
                            <p class="finalprice"><?php echo number_format($item->price) ?> <span>تومان</span></p>
                          @endif
                        </div>
                        <a href="{{route('product',['id'=>$item->id])}}" class="viewprd">مشاهده محصول</a>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
            <ul class="pagination" style="margin-top: 40px;">
                {{$products->links()}}
             </ul>
        </div>
      </div>
    <div class="firstset">
        <div class="carouseltitle">
          <h2>آخرین محصولات</h2>
          <p>آخرین محصولات رواق را در اینجا مشاهده کنید.</p>
        </div>
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3">
                <div class="carousel-cell carousels">
                    <div class="carouseldn">
                        <a href="{{route('product',['id'=>$item->id])}}">
                            <img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->name}}">
                        </a>
                      <div class="productdesc">
                        <a href="{{route('product',['id'=>$item->id])}}">{{$item->name}}</a>
                        <p>{!! \Illuminate\Support\Str::limit($item->explain, 55, ' ...') !!}</p>
                        <div class="pricepl">
                          @if ($item->discount != NULL)
                            <p class="finalprice"><?php echo number_format($item->price) ?> تومان</p>
                            <p class="originalprice"><?php echo number_format($item->discount) ?> تومان</p>
                          @else
                            <p class="finalprice"><?php echo number_format($item->price) ?> <span>تومان</span></p>
                          @endif
                        </div>
                        <a href="{{route('product',['id'=>$item->id])}}" class="viewprd">مشاهده محصول</a>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
            <ul class="pagination" style="margin-top: 40px;">
                {{$products->links()}}
             </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
