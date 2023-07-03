@extends('layouts.frontt')
@section('content')
    <link rel="stylesheet" href="{{asset('style/style-kholasal-product/product.css')}}" media="only screen and (min-width: 901px)">
    <link rel="stylesheet" href="{{asset('style/mobile.css')}}" media="only screen and (max-width: 900px)">
    <link rel="stylesheet" href="{{asset('style/style-kholasal-product/product-mobile.css')}}" media="only screen and (max-width: 900px)">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" media="(max-width: 576px)">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('sticky-kit-master/dist/sticky-kit.min.js')}}"></script>


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
                                                <img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt=" {{$item->name}}"
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
                                                                            <h1>{{$item->name}}</h1>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="one-sub-guide-1-2">
                                                                            <ul class="one-sub-guide-1-list">
                                                                                <a href="#">
                                                                                    <li class="blog-list-item"> صفحه
                                                                                        اصلی<svg width="22" height="26"
                                                                                            viewBox="0 0 34 30"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M20.909 7.5L12.5454 15L20.909 22.5"
                                                                                                stroke="#C6C6C6"
                                                                                                stroke-width="2" />
                                                                                        </svg>
                                                                                    </li>
                                                                                </a>
                                                                                <a href="{{route('products')}}">
                                                                                    <li class="blog-list-item"> 
                                                                                        محصولات
                                                                                        <svg width="22" height="26"
                                                                                            viewBox="0 0 34 30"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M20.909 7.5L12.5454 15L20.909 22.5"
                                                                                                stroke="#C6C6C6"
                                                                                                stroke-width="2" />
                                                                                        </svg> </li>
                                                                                </a>
                                                                                <a href="{{route('product',['id'=>$item->id])}}">
                                                                                    <li class="blog-list-item"> 
                                                                                        {{$item->name}} 
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
                                                            <p>
                                                                {{$item->explain}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12"><!-- row three header blog Summary -->
                                                        <div class="three-sub-guide">
                                                            @foreach($tags as $tag)
                                                            <form action="{{ route('tags') }}" id="{{$tag->id}}" >
                                                                <input type="hidden" name="q" value="{{$tag->name}}">
                                                            </form>
                                                            <div class="tagbar-navbar">
                                                                <p class="tag" onclick="document.getElementById('{{$tag->id}}').submit();">{{$tag->name}}</p>
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
                                                <div id="contentFull" class="main-blog-Ma" style="height: 400px;">
                                                    <!-- section reading -->
                                                    <h3>
                                                        توضیحات بیشتر
                                                    </h3>
                                                         {!!$item->content!!}
                                                    <span id="more"></span>

                                                </div>
                                                <div class="myB"></div>
                                                <button onclick="myFunction()" id="myBtn"> مشاهده بیشتر <img src="img/PinClipart.com_starting-line-clipart_3450109.png" alt="" width="10px"></button>
                                                <div class="prodtabcontent">
                                                    <h3>مشخصات محصول
                                                    </h3>
                                                    <table class="productspecs">
                                                        <tbody>
                                                            @foreach ($item->specifications as $spec)
                                                            <tr>
                                                                <th>{{$spec->key}}</th>
                                                                <td>{{$spec->value}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                

                                                
                                                    <h3>نظرات کاربران
                                                    </h3>
                                                    <div id="Tokyo" class="prodtabcontent" style="display: block;">
                                                        <!--<h3>نظرات کاربران</h3>-->
                                                        <div class="commentpart">
                                                            @foreach ($comments as $comment)
                                                            <div class="col-md-10 col-xs-10">
                                                                <div class="comment">
                                                                    <p class="commentstats">{{ Facades\Verta::instance($item->created_at)->format('Y/n/j')}}</p>
                                                                    <h3><b>{{$comment->name}}</b> گفت:</h3>
                                                                    <p>{{$comment->description}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <div class="userimg"><img src="{{asset('images/Profile.png')}}" alt=""></div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="addcomment">
                                                            <form action="{{route('comment')}}" method="POST">
                                                                @csrf 
                                                                <input type="hidden" name="product_id" value ="{{$item->id}}" >
                                                                @if(Auth::check())
                                                                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="namepl">
                                                                            <label for="mail">ایمیل</label>
                                                                            <input type="email" name="email" id="mail">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="namepl">
                                                                            <label for="firstname">نام و نام خانوادگی</label>
                                                                            <input type="text" name="name" id="firstname" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="commentpl">
                                                                        <label for="yourcomment">دیدگاه شما</label><br>
                                                                        <textarea id="yourcomment" name="content" rows="4" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <!--  CAPTCHA   -->
                                                                <div class="col-md-3" style=" border-radius:10px; padding:7px;">
                                                                    <img src="{!!Captcha::src('default')!!}" style="width:60%; display:block; margin-left:auto; margin-right:auto; margin-bottom:5px;">
                                                                    <div class="wrap-input100 validate-input" data-validate="کپچا به درستی وارد نشده است">
                                                                        <input type="text" name="captcha" class=" input100" placeholder="کد کپچا" id="id_capctha" required>
                                                                        <span class="focus-input100"></span>
                                                                        <span class="symbol-input100">
                                                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="submit" value="فرستادن دیدگاه">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>




                                                    
                                                </div>
                                                <!-- Similar product -->
                                                <div class="one-sub-guide-1-10">
                                                    <h3>
                                                        محصولات مشابه
                                                    </h3>
                                                </div>

                                                <div class="row-item-main-blog">
                                                    @foreach ($products->take(3) as $item)
                                                      <div class="col-md-3">
                                                        <a href="{{route('post',['id'=>$item->id])}}">
                                                            <div class="item-main animation" >
                                                                <div><img src="{{ asset('pics/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}"></div>
                                                                <div><h3>  
                                                                    {!! \Illuminate\Support\Str::limit($item->name, 15, ' ...') !!}   
                                                                </h3></div>
                                                                <div><span>{!! \Illuminate\Support\Str::limit($item->explain, 85, ' ...') !!}</span></div>
                                                            </div>
                                                        </a>
                                                      </div>
                                                    @endforeach
                                                </div>

                                                <!-- Similar product mobile -->
                                                <div class="row-item-main-blog-mobile" data-flickity='{ "groupCells": 2, "prevNextButtons": false, "pageDots": false, "rightToLeft": true}'>
                                                 @foreach ($products->take(3) as $item)    
                                                          <div class="carousel-cell carousels">
                                                            <div class="productdesc">
                                                              <a href="{{route('post',['id'=>$item->id])}}">
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

                                                <!-- end Similar content mobile -->
                                            </div>






                                            <aside class="said-bar">
                                                <div id="side" class="col-md-2 col-12">
                                                    <div class="aside-blog-item">
                                                        <p class="price"><del><?php echo number_format($item->price) ?> <span>تومان</span></del></p>
                                                        <p class="finprice"><?php echo number_format($item->discount) ?> <span>تومان</span></p>
                                                        <div class="stocks">
                                                            <form id="addcart{{$item->id}}" action="{{route('cart.store')}}" method="post" >
                                                                <div class="counter">
                                                                    <span class="down" onclick="decreaseCount(event, this)">-</span>
                                                                    <input type="text" name="number" value="1">
                                                                    <span class="up" onclick="increaseCount(event, this)">+</span>
                                                                </div>
                                                                @csrf 
                                                                <input type="hidden" name="id" value="{{$item->id}}" > 
                                                                <input type="hidden" name="name" value="{{$item->name}}" >
                                                                @if ($item->discount != NULL)
                                                                    <input type="hidden" name="price" value="{{$item->discount}}" > 
                                                                @else
                                                                    <input type="hidden" name="price" value="{{$item->price}}" > 
                                                                @endif
                                                            </form>
                                                            <p>موجودی: {{$item->inventory}}عدد</p>
                                                        </div>                                                     
                                                        <a href="#" onclick="document.getElementById('addcart{{$item->id}}').submit();" class="supportbtn">
                                                            <svg width="42" height="38" viewBox="0 0 42 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                              <path d="M5.25 13.5C5.25 11.6144 5.25 10.6716 5.83579 10.0858C6.42157 9.5 7.36438 9.5 9.25 9.5H32.75C34.6356 9.5 35.5784 9.5 36.1642 10.0858C36.75 10.6716 36.75 11.6144 36.75 13.5V24.5C36.75 26.3856 36.75 27.3284 36.1642 27.9142C35.5784 28.5 34.6356 28.5 32.75 28.5H9.25C7.36438 28.5 6.42157 28.5 5.83579 27.9142C5.25 27.3284 5.25 26.3856 5.25 24.5V13.5Z" fill="#222852" fill-opacity="0.25"></path>
                                                              <ellipse cx="10.5" cy="23.75" rx="1.75" ry="1.58333" fill="white"></ellipse>
                                                              <rect x="5.25" y="14.25" width="31.5" height="3.16667" fill="white"></rect>
                                                            </svg>
                                                            سفارش و ارسال                            
                                                        </a>
                                                    </div>
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
        <!-- end blog main content -->
         <script src="{{asset('js/index-single.js')}}"></script>
@endsection