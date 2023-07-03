@extends('layouts.frontt')
@section('content')
    <!-- start main -->
    <main class="main-screen">
      <div class="container">
          <div class="main-style-container">
              <div class="row">
                  <div class="custom-row-main">
                      <div class="col-md-12">
                          <div class="row-item-main">
                            @foreach ($products->slice(0,12) as $item)   
                              <div class="col-md-3">
                                  <a href="{{route('product',['id'=>$item->id])}}">
                                      <div class="item-main animation" >
                                          <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->name}}"></div>
                                          <div><h3>  
                                            {!! \Illuminate\Support\Str::limit($item->name, 15, ' ...') !!}   
  
                                          </h3></div>
                                          <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 85, ' ...') !!}</span></div>
                                      </div>
                                  </a>
                              </div>
                            @endforeach


                        <div id="dots"></div>
                          <span id="more">
                            @foreach ($products->slice(12,16) as $item)   
                            <div class="col-md-3">
                                <a href="{{route('product',['id'=>$item->id])}}">
                                    <div class="item-main animation" >
                                        <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->name}}"></div>
                                        <div><h3>  
                                            {!! \Illuminate\Support\Str::limit($item->name, 15, ' ...') !!}   

                                        </h3></div>
                                        <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 85, ' ...') !!}</span></div>
                                    </div>
                                </a>
                            </div>
                          @endforeach

                           </span>
                          </div>
                          <div class="myB"></div>
                              <button onclick="myFunction()" id="myBtn"> مشاهده بیشتر  &#8681</button> 
                             
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>
  <!-- 
      new main for mobile
   -->




    <!-- start main mobile -->
  <main class="main-mobile">
      <div class="container">
         <div class="main-style-container" style="margin-top:0px">
              <div data-flickity='{ "groupCells": 2, "prevNextButtons": false, "pageDots": false, "rightToLeft": true}'>
              @foreach ($products->take(16) as $item)   
                <div class="carousel-cell carousels">
                      <div class="productdesc">
                          <a href="{{route('product',['id'=>$item->id])}}">
                              <div class="item-main animation">
                                  <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}"
                                          alt="{{$item->title}}"></div>
                                  <div><span> 
                                    {!! \Illuminate\Support\Str::limit($item->name, 15, ' ...') !!}   
                                      </span></div>
                                  <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 85, ' ...') !!}</span></div>
                              </div>
                          </a>
                      </div>
                  </div>
              @endforeach
              </div>
          </div>
      </div>
  </main>


@endsection
