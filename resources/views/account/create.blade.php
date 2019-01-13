@extends('layouts.app')
{{-- {{ dump($page) }} --}}
@section('oth-page')
    oth-page
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cửa hàng</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">New địa chỉ  </span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="accountSidebar bg_w">
                    <div class="feature_user">
                        <div class="icon">
                            <img src="{{ asset('admin/img/avatars/icon_avatar.png') }}" alt="Nguyen Hung">
                        </div>
                        <div class="user">
                            <span>Người nhận hàng:</span>
                            <h3></h3>
                        </div>
                    </div>
                    <div class="link_account">
                        <ul>
                                <li class="active"><a href="{{route('account.index')}}">Thông tin chung</a></li>
                                <li class="active"><a href="{{route('account.addresses')}}">Sổ địa chỉ</a></li>
                        </ul>
                    </div>

                </div>
                <div class="ctAccount">
                    <div class="detailAccount bg_w">
                        
                        <div class="accountNewoder">
                            <form action="{{route('account.address.storeNewAddress')}}" method="post">
                                @csrf
                                
                                 <div class="container mt-3">
                                     <div class="row">
                                        <div class="col-sm-6">
                                                <fieldset class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="" name="first_name">
                                                    <p class="has-error">{{ $errors->first('first_name') }}</p>
                                                </fieldset>
                                        </div>
                                        <div class="col-sm-6">
                                                <fieldset class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="" name="last_name">
                                                    <p class="has-error" >{{ $errors->first('last_name') }}</p>
                                                </fieldset>
                                        </div>
                                    </div>
                                   <fieldset class="form-group">            
                                     <label>Số điện thoại:</label>
                                    <input type="number" value="" name="phone" class="form-control"> 
                                    <p class="has-error">{{ $errors->first('phone') }}</p>  
                                   </fieldset>
                                   <fieldset class="form-group">
                                     <label>Địa chỉ cụ thể: </label>
                                    <input type="text" name="address" value="" class="form-control">  
                                    <p class="has-error">{{ $errors->first('address') }}</p>                  
                                   </fieldset>
                                        <input type="number" value="" name="user_id" class="form-control" hidden>   
                                   <fieldset class="form-group">
                                     <label for="formGroupExampleInput">Tỉnh/Thành phố</label>
                                     <select class="form-control" name="city_id">
                                       @foreach ($cities as $key => $value)
                                       <option value="{{$key}}">{{$value}}</option>
                                       @endforeach
                                       </select>
                                    </fieldset>
                                    <fieldset class="form-group">
                                            <label for="formGroupExampleInput">Quận/Huyện</label>
                                            <select class="form-control" name="district_id">
                                              @foreach ($districts as $key => $value)
                                              <option value="{{$key}}">{{$value}}</option>
                                              @endforeach
                                              </select>
                                           </fieldset>
                                 </div>
                   
                                 <div class="form-group">
                                   <button class="form-control btn btn-success">Thêm mới</button>
                                 </div>
                             </form>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- End Bradcaump area -->
    <!-- Start Shop Page -->