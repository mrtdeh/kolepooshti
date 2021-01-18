{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','کلاس ها')

{{-- page css --}}
@section('page-style')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2-materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/form-select2.css') }}">
@endsection

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content">  
            <img src="{{ asset('images/banner/class.jpg') }}" alt="کلاس ها" class="w-100">
        </div>
    </div>
</div>

<div class="section animate fadeUp" id="section_class">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center border-intro-padding">
                    <a class="btn-floating btn-large waves-effect waves-light orange" id="add_class">
                        <i class="fas fa-plus"></i>
                    </a>
                    <p class="pt-10">افزودن کلاس</p>
                </div>
            </div>
        </div>
        @foreach ($rooms as $room)

            <div class="col s12 m6 l3">
                <div class="card gradient-shadow border-radius-3 border-padding">
                    <div class="card-content border-dashed center">
                        <a class="btn-floating btn-large waves-effect waves-light blue" 
                        href="{{ url('/base/class/courses?cls='.$room->id) }}">
                            <i class="fas fa-users-class"></i>
                        </a>
          
                        <p class="pt-10">{{ $room->name }}</p>
                        <p class="small pt-10"> {{ $room->deputyName }} </p>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
<div class="section hide" id="section_add_class">
    <div class="row">
        <div class="col s12">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed border-intro-padding">
                    <div class="center">
                        <i class="fas fa-plus orange-text"></i>
                        <h6 class="d-inline-block">افزودن کلاس</h6>
                    </div>
                    <form action="" id="formValidate" class="formValidate">
                        <div class="row mt-2">
                            <div class="col s12 m6 l4">
                                <div class="input-field">
                                    <i class="fad fa-chalkboard-teacher prefix"></i>
                                    <input id="icon_prefix" type="text" class="validate" name="class_name" required>
                                    <label for="icon_prefix">نام کلاس</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l4">
                                <div class="input-field">
                                    <i class="fad fa-user-tie prefix"></i>
                                    <select class="select2 browser-default error validate" id="class_assistant" name="class_assistant" required>
                                        <option value="0" disabled selected>انتخاب معاون</option>
                                        <option value="1" class="circle">محمدعلی راغبیان</option>
                                        <option value="2" class="circle">علی‌اکبر اسماعیلی</option>
                                        <option value="3" class="circle">محمدرضا مشهدی‌خواه</option>
                                        <option value="4" class="circle">مهدی شرقیان</option>
                                        <option value="5" class="circle">محمدرضا ابوئی</option>
                                    </select>
                                </div>     
                            </div>
                            <div class="col s12 m6 l4">
                                <div class="input-field">
                                    <i class="fad fa-eye-dropper prefix"></i>
                                    <select class="icons error validate" id="class_color" name="class_color" required>
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
                                <button type="submit" class="waves-effect waves-light btn green mr-3">ذخیره</button>
                                <a class="waves-effect waves-light btn red" id="section_add_class_hide">انصراف</a>
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
    <script src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $("#add_class").click(function(){
            $("#section_class").addClass("hide");
            $("#section_class").removeClass("animate fadeUp");
            $("#section_add_class").removeClass("hide");
            $("#section_add_class").addClass("animate fadeUp");
        });
        $("#section_add_class_hide").click(function(){
            $("#section_add_class").addClass("hide");
            $("#section_add_class").removeClass("animate fadeUp");
            $("#section_class").removeClass("hide");
            $("#section_class").addClass("animate fadeUp");
        });
        $(".select2").select2({
            dir: "rtl"
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
                class_name: {
                    required: true
                },
                class_assistant: {
                    required: true
                },
                class_color: {
                    required: true
                },
            },
            //For custom messages
            messages: {
                class_name:{
                    required: "نام کلاس را وارد کنید!"
                },
                class_assistant:{
                    required: "معاون کلاس را انتخاب کنید!"
                },
                class_color:{
                    required: "رنگ کلاس را انتخاب کنید!"
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