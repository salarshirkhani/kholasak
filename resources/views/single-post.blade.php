@extends('layouts.frontt')
@section('content')
<link rel="stylesheet" href="{{asset('style/style-blog/blog.css')}}" media="only screen and (min-width: 901px)">
<link rel="stylesheet" href="{{asset('style/style-blog/blog-mobile.css')}}" media="only screen and (max-width: 900px)">
<style>
    .addcomment input{
    background: #f0f0f0 !important;
    }
    .addcomment textarea {
     background: #f0f0f0 !important;   
    }
    .addcomment input[type="submit"] {
    background: #0f4b76 !important;
    background-color: rgb(15, 75, 118) !important;
    }
    .sidehead {
    background-color: #121864;
    }
    @media only screen and (max-width: 700px) {
      img{width:100% !important;}
    }
</style>
<!-- start main -->
<main class="main-screen-blog">
  <div class="container">
      <div class="main-style-container">
          <div class="row">
              <div class="custom-row-main">
                  <div class="col-md-12 col-12">
                      <div class="row">
                          <div class="row-navbar">
                              <div class="col-md-2 col-12">

                                  <div class="img-header-blog">
                                      <img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt=" {{$item->title}}s"
                                          width="279px" height="289px">
                                  </div>

                              </div>
                              <div class="col-md-9 col-12">
                                  <div class="row">
                                      <div class="guide-blog">
                                          <div class="col-md-12 col-12">
                                              <div class="one-sub-guide">
                                                  <div class="row">
                                                      <div class="one-sub-guide-1">
                                                          <div class="col-md-4 col-12">
                                                              <div class="one-sub-guide-1-1">
                                                                  <h3>{{$item->title}}</h3>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8 col-12">
                                                              <div class="one-sub-guide-1-2">
                                                                  <ul class="one-sub-guide-1-list">
                                                                      <a href="">
                                                                          <li class="blog-list-item"> صفحه اصلی<svg
                                                                                  width="22" height="26"
                                                                                  viewBox="0 0 34 30" fill="none"
                                                                                  xmlns="http://www.w3.org/2000/svg">
                                                                                  <path
                                                                                      d="M20.909 7.5L12.5454 15L20.909 22.5"
                                                                                      stroke="#C6C6C6"
                                                                                      stroke-width="2" />
                                                                              </svg>
                                                                          </li>
                                                                      </a>
                                                                      <a href="{{route('blog')}}">
                                                                          <li class="blog-list-item"> بلاگ 
                                                                              <svg width="22" height="26"
                                                                                  viewBox="0 0 34 30" fill="none"
                                                                                  xmlns="http://www.w3.org/2000/svg">
                                                                                  <path
                                                                                      d="M20.909 7.5L12.5454 15L20.909 22.5"
                                                                                      stroke="#C6C6C6"
                                                                                      stroke-width="2" />
                                                                              </svg> </li>
                                                                      </a>
                                                                      <a href="#">
                                                                          <li class="blog-list-item">
                                                                            {{$item->title}}
                                                                          </li>
                                                                      </a>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12 col-12"> <!-- row tow header blog Summary -->
                                              <div class="two-sub-guide">
                                                {!!$item->explain!!}
                                              </div>
                                          </div>
                                          <div class="col-md-12 col-12"><!-- row three header blog Summary -->
                                              <div class="three-sub-guide">
                                                @foreach($tags as $tag)
                                                  <form action="{{ route('posttags') }}" id="{{$tag->id}}" >
                                                      <input type="hidden" name="q" value="{{$tag->name}}">
                                                  </form>
                                                  <div class="tagbar-navbar" onclick="document.getElementById('{{$tag->id}}').submit();">
                                                    <span class="tag">{{$tag->name}}</span>
                                                  </div>
                                                @endforeach
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 col-12">
                      <div class="main-blog">
                          <div class="row">
                              <div class="main-blog-row">
                                  <div class="col-md-10 col-12">
                                      <div class="main-blog-Ma">
                                          <div class="section-reading"><!-- section reading -->
                                              <div class="one-sub-guide-1-100">
                                                  <h4 style="color: #1B6676">
                                                    {{$item->title}}
                                                  </h4>
                                              </div>
                                              {!!$item->content!!}
                                          </div>
                                      </div>
                                      <div class="one-sub-guide-1-10">
                                          <span>
                                              مطالب مشابه
                                          </span>
                                      </div>
                                      <!-- Similar content -->
                                      <div class="row-item-main-blog">
                                        @foreach ($posts->take(16) as $item)
                                          <div class="col-md-3">
                                            <a href="{{route('post',['id'=>$item->id])}}">
                                                <div class="item-main animation" >
                                                    <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}"></div>
                                                    <div><h3>  
                                                      {{$item->title}}    
                                                    </h3></div>
                                                    <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 325, ' ...') !!}</span></div>
                                                </div>
                                            </a>
                                          </div>
                                        @endforeach

                                      </div>
                                      
                                      <!-- Similar content mobile -->
                                      <div class="row-item-main-blog-mobile" data-flickity='{ "groupCells": 2, "prevNextButtons": false, "pageDots": false, "rightToLeft": true}'>
                                        @foreach ($posts->take(3) as $item)    
                                          <div class="carousel-cell carousels">
                                            <div class="productdesc">
                                              <a href="{{route('post',['id'=>$item->id])}}">
                                                  <div class="item-main animation">
                                                      <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}"
                                                              alt="{{$item->title}}"></div>
                                                      <div><span> 
                                                        {{$item->title}}    
                                                          </span></div>
                                                      <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 325, ' ...') !!}</span></div>
                                                  </div>
                                              </a>
                                            </div>
                                          </div>
                                        @endforeach
                                      </div>
                                      <!-- end Similar content mobile -->
                                  </div>






                                  <aside class="col-md-2 col-12">
                                      <div class="aside-blog-item">
                                        @foreach ($banners->where('place','blog') as $item)    
                                          <a href="{{$item->url}}" class="aside-blog-img">
                                              <img src="{{ asset('pics/'.$item['image'].'/'.$item['image'] ) }}" alt="{{$item->title}}">
                                          </a>
                                        @endforeach
                                      </div>
                                  </aside>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection