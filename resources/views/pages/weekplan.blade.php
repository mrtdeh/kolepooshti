{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','برنامه هفتگی')


@section('page-style')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2-materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/page-account-settings.css') }}">
@endsection

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content">  
            <img src="{{ asset('images/banner/weekplan.jpg') }}" alt="برنامه هفتگی" class="w-100">
        </div>
    </div>
</div>

<section class="tabs-vertical section animate fadeUp">
    <div class="row">
        <div class="col l4 s12">
            <!-- tabs  -->
            <div class="card-panel gradient-45deg-indigo-purple mt-5">
                <ul class="tabs">
                    <li class="tab">
                        <a class="white-text" href="#add_plan">
                            <i class="fas fa-plus"></i>
                            <span>افزودن برنامه هفتگی</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12ra">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم ریاضی الف</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12rb">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم ریاضی ب</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12ta">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم تجربی الف</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12tb">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم تجربی ب</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12tc">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم تجربی ج</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12na">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم انسانی الف</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="white-text" href="#12nb">
                            <i class="fas fa-calendar-alt"></i>
                            <span>برنامه هفتگی دوازدهم انسانی ب</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col l8 s12 add_week">
            <!-- tabs content -->
            <div class="animate fadeUp" id="add_plan">
                <div class="card border-padding">
                    <div class="card-content border-dashed">
                        <form action="/weekplan/save" method="post" id="formValidate" class="formValidate">
                            @csrf
                            <div class="row">
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-book prefix"></i>
                                        <select class="select2 browser-default error validate" id="course" name="classCourse" required>
                                            <option value="0" disabled selected>انتخاب درس</option>

                                            @foreach ($rooms as $room)
                                            <optgroup label="{{ $room->name }}" class="text-bold">
                                                {{-- {{dd( $room->courses()->get() )}} --}}
                                                @foreach ($room->courses()->get() as $course)
                                                <option value="{{ $room->id . "-" . $course->id . "-" . $course->teacherId}}">
                                                    {{ $course->name }}
                                                </option>
                                                @endforeach
                                                
                                            </optgroup>
                                            @endforeach
                                            
                                        
                                        </select>
                                    </div> 
                                </div>
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-clock prefix"></i>
                                        <select class="error validate" id="week_plan" name="timePlan" required>
                                            <option value="" disabled selected>انتخاب زمانبندی</option>
                                            
                                            @foreach ($times as $time)
                                            <option value="{{ $time->id }}">
                                                {{ $time->start ." - ". $time->end }}
                                            </option>
                                            @endforeach
                                        
                                            <option value="add_plan">+ افزودن زمانبندی جدید</option>
                                        </select>
                                    </div>
                                    {{-- <div class="input-field">
                                        <i class="fad fa-clock prefix"></i>
                                        <input type="text" class="timepicker validate" name="start_time" required>
                                        <label for="icon_prefix">ساعت شروع</label>
                                    </div> --}}
                                </div>
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-calendar-day prefix"></i>
                                        <select class="error validate" id="week_day" name="day" required>
                                            <option value="" disabled selected>انتخاب روز هفته</option>
                                            <option value="0">شنبه</option>
                                            <option value="1">یکشنبه</option>
                                            <option value="2">دوشنبه</option>
                                            <option value="3">سه‌شنبه</option>
                                            <option value="4">چهارشنبه</option>
                                            <option value="5">پنجشنبه</option>
                                            <option value="6">جمعه</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-retweet prefix"></i>
                                        <select class="error validate" id="week_turn" name="turn" required>
                                            <option value="" disabled selected>انتخاب نوبت هفته</option>
                                            <option value="0">عادی</option>
                                            <option value="1">زوج</option>
                                            <option value="2">فرد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 flexbox mt-5">
                                    <button type="submit" class="waves-effect waves-light btn green mr-3">ذخیره</button>
                                    <a class="waves-effect waves-light btn red" id="clear">انصراف</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="animate fadeUp" id="12ra">
                <div class="card border-padding">
                    <div class="card-content border-dashed">
                        <table class="subscription-table responsive-table bordered highlight centered">
                            <thead>
                                <tr>
                                    <th class="gray"></th>    
                                    <th class="pink white-text">09:30 - 08:00</th>    
                                    <th class="pink white-text">11:15 - 09:45</th>    
                                    <th class="pink white-text">13:00 - 11:30</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="pink white-text">شنبه</th>
                                    <td class="double"><span class="d-block border-bottom-1-dark pb-3">حسابان</span><span class="d-block pt-3">شیمی</span></td>
                                    <td>شیمی</td>
                                    <td>زبان انگلیسی</td>
                                </tr>
                                <tr>
                                    <th class="pink white-text">یکشنبه</th>
                                    <td>عربی</td>
                                    <td>ادبیات فارسی</td>
                                    <td>دین و زندگی</td>
                                </tr>
                                <tr>
                                    <th class="pink white-text">دوشنبه</th>
                                    <td>هندسه</td>
                                    <td>فیزیک</td>
                                    <td>دین و زندگی</td>
                                </tr>
                                <tr>
                                    <th class="pink white-text">سه‌شنبه</th>
                                    <td>گسسته</td>
                                    <td>شیمی</td>
                                    <td>زبان انگلیسی</td>
                                </tr>
                                <tr>
                                    <th class="pink white-text">چهارشنبه</th>
                                    <td>عربی</td>
                                    <td>ورزش</td>
                                    <td class="double"><span class="d-block border-bottom-1-dark pb-3">فیزیک</span><span class="d-block pt-3">هندسه</span></td>
                                </tr>
                                <tr>
                                    <th class="pink white-text">پنجشنبه</th>
                                    <td>شیمی</td>
                                    <td>حسابان</td>
                                    <td>هندسه</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l8 s12 hide add_plan">
            <!-- tabs content -->
            <div id="add_plan">
                <div class="card border-padding">
                    <div class="card-content border-dashed">
                        <form action="/weekplan/time/add" method="post" id="formValidate1" class="formValidate">
                            @csrf
                            <div class="row">
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-clock prefix"></i>
                                        <input type="text" class="timepicker validate" name="start" required>
                                        <label for="icon_prefix">ساعت شروع</label>
                                    </div>
                                </div>
                                <div class="col s12 l6">
                                    <div class="input-field">
                                        <i class="fad fa-clock prefix"></i>
                                        <input type="text" class="timepicker validate" name="end" required>
                                        <label for="icon_prefix">ساعت پایان</label>
                                    </div>
                                </div>
                                <div class="col s12 flexbox mt-5">
                                    <button type="submit" class="waves-effect waves-light btn green mr-3">ذخیره</button>
                                    <a class="waves-effect waves-light btn red" id="cancel">انصراف</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-script')
    <script src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/scripts/page-account-settings.js') }}"></script>
    <script>   
        $(document).ready(function(){
            $('.timepicker').timepicker();
        });
        $("#clear").click(function(){
            $("#formValidate").trigger("reset");
        });
        $("#cancel").click(function(){
            $(".add_plan").addClass("hide");
            $(".add_plan").removeClass("animate fadeUp");
            $(".add_week").removeClass("hide");
            $(".add_week").addClass("animate fadeUp");
        });
        $("#week_plan").change(function(){
            if($(this).val() == 'add_plan'){
                $(".add_week").addClass("hide");
                $(".add_week").removeClass("animate fadeUp");
                $(".add_plan").removeClass("hide");
                $(".add_plan").addClass("animate fadeUp");
            }
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
                course: {
                    required: true
                },
                week_plan: {
                    required: true
                },
                week_day: {
                    required: true
                },
                week_turn: {
                    required: true
                },
            },
            //For custom messages
            messages: {
                course:{
                    required: "درس را انتخاب کنید!"
                },
                week_plan:{
                    required: "روز هفته را انتخاب کنید!"
                },
                week_day:{
                    required: "روز هفته را انتخاب کنید!"
                },
                week_turn:{
                    required: "نوبت هفته را انتخاب کنید!"
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
        $("#formValidate1").validate({
            rules: {
                start_time: {
                    required: true
                },
                end_time: {
                    required: true
                },
            },
            //For custom messages
            messages: {
                start_time:{
                    required: "ساعت شروع را وارد کنید!"
                },
                end_time:{
                    required: "ساعت پایان را وارد کنید!"
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