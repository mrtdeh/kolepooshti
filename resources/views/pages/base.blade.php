{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','پایه ها')

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content">  
            <img src="{{ asset('images/banner/base.jpg') }}" alt="پایه ها" class="w-100">
        </div>
    </div>
</div>

<div class="section animate fadeUp" id="section_base">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center border-intro-padding">
                    <a type="button" class="btn-floating btn-large waves-effect waves-light orange" id="add_base">
                        <i class="fas fa-plus"></i>
                    </a>
                    <p class="pt-10">افزودن پایه</p>
                </div>
            </div>
        </div>
         
        @foreach ($bases as $base)
            <div class="col s12 m6 l3">
                <div class="card gradient-shadow border-radius-3 border-padding">
                    <div class="card-content border-dashed center border-intro-padding">
                        <a class="btn-floating btn-large waves-effect waves-light" 
                        href="{{ url('/panel/base/class?b='.$base->id) }}">
                            <i class="fas fa-users-class"></i>
                        </a>
                        <p class="pt-10">{{ $base->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
</div>
<div class="section hide" id="section_add_base">
    <div class="row">
        <div class="col s12">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed border-intro-padding">
                    <div class="center">
                        <i class="fas fa-plus orange-text"></i>
                        <h6 class="d-inline-block">افزودن پایه</h6>
                    </div>
                    <form action="" id="formValidate" class="formValidate">
                        <div class="row mt-2">
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <i class="fad fa-users-class prefix"></i>
                                    <input id="icon_prefix" type="text" class="validate" name="base_name" required>
                                    <label for="icon_prefix">نام پایه</label>
                                </div>
                            </div>
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <i class="fad fa-eye-dropper prefix"></i>
                                    <select class="icons error validate" id="base_color" name="base_color" required>
                                        <option value="" disabled selected>انتخاب رنگ</option>
                                        <option value="orange" data-icon="{{ asset('images/colors/orange.png') }}" class="circle">نارنجی</option>
                                        <option value="red" data-icon="{{ asset('images/colors/red.png') }}" class="circle">قرمز</option>
                                        <option value="blue" data-icon="{{ asset('images/colors/blue.png') }}" class="circle">آبی</option>
                                        <option value="purple" data-icon="{{ asset('images/colors/purple.png') }}" class="circle">بنفش</option>
                                        <option value="mustard" data-icon="{{ asset('images/colors/mustard.png') }}" class="circle">خردلی</option>
                                        <option value="green" data-icon="{{ asset('images/colors/green.png') }}" class="circle">سبز</option>
                                        <option value="pink" data-icon="{{ asset('images/colors/pink.png') }}" class="circle">صورتی</option>
                                        <option value="brown" data-icon="{{ asset('images/colors/brown.png') }}" class="circle">قهوه ای</option>
                                        <option value="indiago" data-icon="{{ asset('images/colors/indiago.png') }}" class="circle">نیلی</option>
                                        <option value="yellow" data-icon="{{ asset('images/colors/yellow.png') }}" class="circle">زرد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s12 flexbox mt-5">
                                <button type="submit" class="waves-effect waves-light btn green mr-3" name="action">ذخیره</button>
                                <a class="waves-effect waves-light btn red" id="section_add_base_hide">انصراف</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $("#add_base").click(function(){
            $("#section_base").addClass("hide");
            $("#section_base").removeClass("animate fadeUp");
            $("#section_add_base").removeClass("hide");
            $("#section_add_base").addClass("animate fadeUp");
        });
        $("#section_add_base_hide").click(function(){
            $("#section_add_base").addClass("hide");
            $("#section_add_base").removeClass("animate fadeUp");
            $("#section_base").removeClass("hide");
            $("#section_base").addClass("animate fadeUp");
        });
        $('select[required]').css({
            position: 'absolute',
            display: 'inline',
            height: 0,
            padding: 0,
            border: '1px solid rgba(255,255,255,0)',
            width: 0
        }); 
        $("#formValidate").validate({
            rules: {
                base_name: {
                    required: true
                },
                base_color: {
                    required: true
                },
            },
            //For custom messages
            messages: {
                base_name:{
                    required: "نام پایه را وارد کنید!"
                },
                base_color:{
                    required: "رنگ پایه را انتخاب کنید!"
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                $(placement).append(error)
                }
                else {
                    error.insertAfter(element);
                }
            }   
        });
    </script>
@endsection