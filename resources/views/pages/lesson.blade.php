{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title',$course->name)

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content p-0">  
            <img src="{{ asset('uploads/' . $course->image) }}" alt="پایه ها" class="w-100">
        </div>
    </div>
</div>

<div class="section">
    <div class="row">
        <div class="col s12 l3">
            <div class="card card-border center-align gradient-45deg-indigo-purple">
                <div class="card-content white-text">
                    <img class="responsive-img circle z-depth-4" width="100" src="{{ asset('images/avatar/avatar-1.png') }}" alt="سعید آسایش">
                    <h6 class="white-text mb-1">دبیر درس</h6>
                <p class="m-0 pt-10">{{ $course->teacherName }}</p>
                    {{-- <p class="mt-6">
                        saeedasayesh@gmail.com <i class="fas fa-envelope"></i> 
                    </p> --}}
                    {{-- <p class="mt-4">
                        saeed_asayesh@ <i class="fab fa-telegram"></i>
                    </p>
                    <p class="mt-4 direction-right">
                        09915640050 <i class="fab fa-whatsapp"></i>
                    </p> --}}
                    {{-- <a class="waves-effect waves-light btn gradient-45deg-deep-orange-orange border-round mt-7 z-depth-4">پیام به دبیر</a> --}}
                </div>
            </div>
            <div class="card card-border center-align gradient-45deg-amber-amber mt-10">
                <div class="card-content">
                    <h6 class="white-text pb-10 border-bottom-1">دانش آموزان درس</h6>
                    <ul class="collection mb-0 height-20vh scrollspy fixed-width">
                       
                        @foreach ($students as $s)
                        <li class="collection-item avatar">
                            <img src="{{ asset('uploads/'  ) }}" alt="" class="circle">
                            <p class="medium">{{ $s->fullName }}</p>
                            {{-- <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a> --}}
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center">
                    <a href="{{ url('/base/class/course/chemistry/introduction') }}">
                        <img src="{{ asset('images/icon/open-book.svg') }}" alt="images" class="width-40">
                        <h5 class="pt-10">درباره درس</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center">
                    <a href="{{ url('/base/class/course/chemistry/class') }}">
                        <img src="{{ asset('images/icon/online-class.svg') }}" alt="images" class="width-40">
                        <h5 class="pt-10">کلاس آنلاین</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center">
                    <img src="{{ asset('images/icon/test.svg') }}" alt="images" class="width-40">
                    <h5 class="pt-10">آزمون آنلاین</h5>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center">
                    <img src="{{ asset('images/icon/homework.svg') }}" alt="images" class="width-40">
                    <h5 class="pt-10">تکالیف</h5>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card gradient-shadow border-radius-3 border-padding">
                <div class="card-content border-dashed center">
                    <img src="{{ asset('images/icon/reading.svg') }}" alt="images" class="width-40">
                    <h5 class="pt-10">منابع مطالعاتی</h5>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
        </div>
        <div class="col s12 l3">
            
        </div>
    </div>
</div>

<div id="modal" class="modal modal-fixed-footer">
    <div class="modal-title">
        <i class="fas fa-plus orange-text"></i>
        افزودن پایه
    </div>
    <div class="modal-content">
        <div class="flexbox">
            <div class="input-field w-50">
                <i class="fas fa-users-class material-icons prefix"></i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">نام پایه</label>
            </div>
        </div>
        
    </div>
    <hr>
    <div class="modal-footer">
        <div class="flexbox">
            <a class="waves-effect waves-light btn modal-action modal-close green mr-3">ذخیره</a>
            <a class="waves-effect waves-light btn modal-action modal-close red">انصراف</a>
        </div>
    </div>
</div>

@endsection
