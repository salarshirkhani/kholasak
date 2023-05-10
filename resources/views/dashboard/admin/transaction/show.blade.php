@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="کاربران" route="dashboard.admin.users.index" />
    <x-breadcrumb-item title="صفحه کاربری" route="dashboard.admin.users.show" />
@endsection
@section('content')
@if(Session::has('info'))
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-success">{{ Session::get('info') }}</p>
    </div>
</div>
@endif
<?php $ord=0 ?>
    @include('dashboard.admin.users.changerole')
    <div class="container">
        <x-session-alerts></x-session-alerts>
            <div class="row">
              <div class="col-md-3">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/dashboard/img/user2-160x160.jpg') }}" alt="{{ $user->first_name }}">
                      </div>
      
                      <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
      
                      <p class="text-muted text-center">{{ $user->type }}</p>
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>شماره موبایل</b> <a class="float-right">{{ $user->mobile }}</a>
                        </li>
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-lg">تغیر وضعیت کاربری</button>

                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="col-lg-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>100<sup style="font-size: 20px">هزارتومان</sup></h3>
          
                        <p>موجودی کیف پول</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$ord}}</h3>
          
                        <p>سفارش</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                          <x-card type="info" >
                            <x-card-header> محصولات خریداری شده   {{$user->first_name}} {{$user->last_name}}</x-card-header>
                            <x-card-body>
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>نام محصول</th>
                                        <th>وضعیت خرید</th>
                                        <th>قیمت</th>
                                        <th>تاریخ</th>
                                        <th>حذف</th>                               
                                    </tr>
                                    </thead>
                                        <tbody>

                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>نام محصول</th>
                                            <th>وضعیت خرید</th>
                                            <th>قیمت</th>
                                            <th>تاریخ</th>
                                            <th>حذف</th>       
                                          </tr>
                                          </tfoot>
                                  </table>
                              </div>                             
                            </x-card-body>
                            <x-card-footer>
                              <button class="btn btn-success" data-toggle="modal" data-target="#modal-lf">ثبت محصول برای کاربر</button>
                            </x-card-footer>
                          </x-card>  
                        </div>
                        <div class="col-md-12">
                          <x-card type="info" >
                            <x-card-header> تراکنشات انجام شده   {{$user->first_name}} {{$user->last_name}}</x-card-header>
                            <x-card-body>
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>کاربر</th>
                                        <th>کدپرداخت</th>
                                        <th>وضعیت</th>
                                        <th>شماره کارت</th>
                                        <th>قیمت</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                     @foreach($posts as $item)
                                        <tr>
                                            <td>{{ $item->person->first_name }} {{ $item->person->last_name }}</td>
                                            <td>{{ $item->transaction }}</td>
                                            <td>@if($item->status=='paid') <p style="color:green; font-weight:800;">پرداخت موفق</p> @else <p style="color:red; font-weight:800;">پرداخت نشده</p> @endif</td>
                                            <td>{{ $item->cart_number }}</td>
                                            <td>{{ $item->amount }}</td>
                                        </tr>
                                     @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>کاربر</th>
                                            <th>کدپرداخت</th>
                                            <th>وضعیت</th>
                                            <th>شماره کارت</th>
                                            <th>قیمت</th>
                                        </tr>
                                          </tfoot>
                                  </table>
                              </div>    
                            </x-card-body>
                            <x-card-footer>
                            </x-card-footer>
                          </x-card>  
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
