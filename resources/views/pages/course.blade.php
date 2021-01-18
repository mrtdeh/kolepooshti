{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','درس ها')

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
            <img src="{{ asset('images/banner/course.jpg') }}" alt="درس ها" class="w-100">
        </div>
    </div>
</div>

<div class="section animate fadeUp" id="section_course">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center border-intro-padding">
                    <a class="btn-floating btn-large waves-effect waves-light orange" id="add_course">
                        <i class="fas fa-plus"></i>
                    </a>
                    <p class="pt-10">افزودن درس</p>
                </div>
            </div>
        </div>
        
        @foreach ($courses as $course)
            <div class="col s12 m6 l3">
                <div class="card gradient-shadow border-radius-3 border-padding">
                    <div class="card-content border-dashed center">
                        <a class="btn-floating btn-large waves-effect waves-light red" 
                        href="{{ url('/base/class/course/chemistry?crs='.$course->id."&cls=".$room->id ) }}">
                            <i class="fal fa-infinity"></i>
                        </a>
                        <p class="pt-10">{{ $course->name }}</p>
                        <p class="small pt-10">{{ $course->teacherName }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
<div class="section hide" id="section_add_course">
    <div class="row">
        <div class="col s12">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed border-intro-padding">
                    <div class="center">
                        <i class="fas fa-plus orange-text"></i>
                        <h6 class="d-inline-block">افزودن درس</h6>
                    </div>
                    <form enctype="multipart/form-data"  action="/course/save" method="post" id="formValidate" class="formValidate">
                        {{-- {{dd($courses->first()->room())}} --}}
                        {{-- {{dd( $room->base())}} --}}
                        <input type="hidden" name="cls_id" value={{ $room->id }}>
                        <input type="hidden" name="base_id" value={{ $room->base->id }}>
                        @csrf
                        <div class="row mt-2">
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <i class="fad fa-chalkboard-teacher prefix"></i>
                                    <input id="icon_prefix" type="text" class="validate" name="course_name"  required>
                                    <label for="icon_prefix">نام درس</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <i class="fad fa-user-tie prefix"></i>
                                    <select class="select2 browser-default error validate" id="course_teacher" name="course_teacher" required>
                                        <option value="0" disabled selected>انتخاب دبیر</option>
                                       
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" class="circle">
                                                {{ $teacher->fullName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>     
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l6">
                                {{-- <div class="input-field">
                                    <i class="fad fa-icons-alt prefix"></i>
                                    <select class="icons error validate" id="course_icon" name="course_icon" required>
                                        <option value="" disabled selected>انتخاب نماد درس</option>
                                        <option value="abacus" data-icon="{{ asset('images/icon/abacus.svg') }}" class="circle">چرتکه</option>
                                        <option value="atom" data-icon="{{ asset('images/icon/atom.svg') }}" class="circle">اتم</option>
                                        <option value="book" data-icon="{{ asset('images/icon/book.svg') }}" class="circle">کتاب</option>
                                        <option value="books" data-icon="{{ asset('images/icon/books.svg') }}" class="circle">دسته کتاب</option>
                                        <option value="calculator" data-icon="{{ asset('images/icon/calculator.svg') }}" class="circle">ماشین حساب</option>
                                        <option value="calculator-alt" data-icon="{{ asset('images/icon/calculator-alt.svg') }}" class="circle">محاسبه</option>
                                        <option value="divide" data-icon="{{ asset('images/icon/divide.svg') }}" class="circle">تقسیم</option>
                                        <option value="empty-set" data-icon="{{ asset('images/icon/empty-set.svg') }}" class="circle">تهی</option>
                                        <option value="function" data-icon="{{ asset('images/icon/function.svg') }}" class="circle">تابع</option>
                                        <option value="globe-stand" data-icon="{{ asset('images/icon/globe-stand.svg') }}" class="circle">کره زمین</option>
                                        <option value="hexagon" data-icon="{{ asset('images/icon/hexagon.svg') }}" class="circle">پنج ضلعی</option>
                                        <option value="infinity" data-icon="{{ asset('images/icon/infinity.svg') }}" class="circle">بی‌نهایت</option>
                                        <option value="kaaba" data-icon="{{ asset('images/icon/kaaba.svg') }}" class="circle">کعبه</option>
                                        <option value="landmark" data-icon="{{ asset('images/icon/landmark.svg') }}" class="circle">کاخ تاریخی</option>
                                        <option value="landmark-alt" data-icon="{{ asset('images/icon/landmark-alt.svg') }}" class="circle">کاخ</option>
                                        <option value="less-than-equal" data-icon="{{ asset('images/icon/less-than-equal.svg') }}" class="circle">کوچکتر مساوی</option>
                                        <option value="magnet" data-icon="{{ asset('images/icon/magnet.svg') }}" class="circle">آهن‌ربا</option>
                                        <option value="mosque" data-icon="{{ asset('images/icon/mosque.svg') }}" class="circle">مسجد</option>
                                        <option value="not-equal" data-icon="{{ asset('images/icon/not-equal.svg') }}" class="circle">نامساوی</option>
                                        <option value="omega" data-icon="{{ asset('images/icon/omega.svg') }}" class="circle">امگا</option>
                                        <option value="percentage" data-icon="{{ asset('images/icon/percentage.svg') }}" class="circle">درصد</option>
                                        <option value="pi" data-icon="{{ asset('images/icon/pi.svg') }}" class="circle">پی</option>
                                        <option value="quran" data-icon="{{ asset('images/icon/quran.svg') }}" class="circle">قرآن</option>
                                        <option value="radiation" data-icon="{{ asset('images/icon/radiation.svg') }}" class="circle">هسته ای</option>
                                        <option value="rectangle-landscape" data-icon="{{ asset('images/icon/rectangle-landscape.svg') }}" class="circle">مستطیل</option>
                                        <option value="seedling" data-icon="{{ asset('images/icon/seedling.svg') }}" class="circle">برگ</option>
                                        <option value="sigma" data-icon="{{ asset('images/icon/sigma.svg') }}" class="circle">سیگما</option>
                                        <option value="square-root" data-icon="{{ asset('images/icon/square-root.svg') }}" class="circle">رادیکال</option>
                                        <option value="square-root-alt" data-icon="{{ asset('images/icon/square-root-alt.svg') }}" class="circle">رادیکال ایکس</option>
                                        <option value="subscript" data-icon="{{ asset('images/icon/subscript.svg') }}" class="circle">سابسکریب</option>
                                        <option value="theta" data-icon="{{ asset('images/icon/theta.svg') }}" class="circle">تتا</option>
                                        <option value="value-absolute" data-icon="{{ asset('images/icon/value-absolute.svg') }}" class="circle">قدرمطلق</option>
                                        <option value="water" data-icon="{{ asset('images/icon/water.svg') }}" class="circle">آب</option>
                                        <option value="wave-sine" data-icon="{{ asset('images/icon/wave-sine.svg') }}" class="circle">نمودار</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col s12 m6 l6">
                                {{-- <div class="input-field">
                                    <i class="fad fa-eye-dropper prefix"></i>
                                    <select class="icons error validate" id="course_color" name="course_color" required>
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
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="row mt-2">
                            <div class="file-field input-field">
                                <div class="btn">
                                <span>بارگذاری عکس</span>
                                <input type="file" name="course_image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="بنر درس"  required>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col s12 flexbox mt-5">
                                <button type="submit" class="waves-effect waves-light btn green mr-3">ذخیره</button>
                                <a class="waves-effect waves-light btn red" id="section_add_course_hide">انصراف</a>
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
        $("#add_course").click(function(){
            $("#section_course").addClass("hide");
            $("#section_course").removeClass("animate fadeUp");
            $("#section_add_course").removeClass("hide");
            $("#section_add_course").addClass("animate fadeUp");
        });
        $("#section_add_course_hide").click(function(){
            $("#section_add_course").addClass("hide");
            $("#section_add_course").removeClass("animate fadeUp");
            $("#section_course").removeClass("hide");
            $("#section_course").addClass("animate fadeUp");
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
                    course_name: {
                        required: true
                    },
                    course_teacher: {
                        required: true
                    },
                    class_icon: {
                        required: true
                    },
                    class_color: {
                        required: true
                    },
                },
                //For custom messages
                messages: {
                    course_name:{
                        required: "نام درس را وارد کنید!"
                    },
                    course_teacher:{
                        required: "دبیر درس را انتخاب کنید!"
                    },
                    course_icon:{
                        required: "نماد درس را انتخاب کنید!"
                    },
                    course_color:{
                        required: "رنگ درس را انتخاب کنید!"
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