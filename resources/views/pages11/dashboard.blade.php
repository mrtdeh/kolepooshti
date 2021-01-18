{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','پیشخوان')

{{-- page css --}}
@section('page-style')
    <link rel="stylesheet" href="{{ asset('vendors/map/ol.css') }}">
@endsection

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content">  
            <div class="carousel carousel-slider center" data-indicators="true">
                <a class="carousel-item" href="#one!"><img src="{{ asset('images/banner/banner.svg') }}"></a>
                {{-- <a class="carousel-item" href="#two!"><img src="{{ asset('images/banner/banner-1.png') }}"></a> --}}
                {{-- <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a> --}}
                {{-- <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a> --}}
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="card animate fadeRight">
        <div class="card-content">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab col m3"><a class="active" href="#test1"><i class="fad fa-exclamation-triangle"></i> اطلاعیه</a></li>
                        <li class="tab col m3"><a href="#test2"><i class="fad fa-radio-alt"></i> اخبار</a></li>
                        <li class="tab col m3"><a href="#test3"><i class="fad fa-calendar-week"></i> رویداد روز</a></li>
                        <li class="tab col m3"><a href="#test4"><i class="fad fa-check-square"></i> نظرسنجی</a></li>
                    </ul>
                </div>
                <div id="test1" class="col s12">
                    <div class="card animate fadeUp">
                        <div class="card-content">
                            <div class="row">
                                <p>از عموم دعوت میشود بازدید  دبیرستان را در برنامه خود داشته باشید.</p>
                                <br>
                                <div class="text-left"><span class="text-orange">امروز ساعت 12:45</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="card animate fadeUp">
                        <div class="card-content">
                            <div class="row">
                                <p>امکانات و فضای سبز مدرسه در حد مطلوب و ایده آل است.</p>
                                <br>
                                <div class="text-left"><span class="text-orange">دیروز ساعت 18:45</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="card animate fadeUp">
                        <div class="card-content">
                            <div class="row">
                                <p>دانش آموزان میتوانند در ۳ رشته تحصیلی ریاضی و تجربی و انسانی ثبت نام و ادامه تحصیل دهند.</p>
                                <br>
                                <div class="text-left"><span class="text-orange">دیروز ساعت 14:35</span></div>
                            </div>
                        </div>
                    </div>
                    <a class="btn waves-effect waves-light fixed-button animate fadeUp" type="button" name="action">
                        <span>نمایش تمام اطلاعیه ها</span>
                    </a>
                </div>
                <div id="test2" class="col s12">
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeUp">
                            <div class="card-image">
                                <div class="carousel carousel-slider center" data-indicators="true">
                                    <a class="carousel-item" href="#one!"><video src="{{ asset('images/blogs/blog.mp4') }}" type="video/mp4" controls></video></a>
                                </div>
                                <span class="card-title">
                                    عنوان خبر
                                    <p class="small">13 بهمن 1399</p>
                                </span>
                            </div>
                            <div class="card-content">
                                <p>
                                    تیزر معرفی دبیرستان دوره دوم شاهد شهید رمضانزاده (سه راه آبنما)
                                </p>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light fixed-button" type="button" name="action">
                                    <span>جزییات خبر</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeUp">
                            <div class="card-image">
                                <div class="carousel carousel-slider center" data-indicators="true">
                                    <a class="carousel-item" href="#one!"><img src="{{ asset('images/blogs/blog-9.jpg') }}"></a>
                                    <a class="carousel-item" href="#two!"><img src="{{ asset('images/blogs/blog-6.jpg') }}"></a>
                                    <a class="carousel-item" href="#three!"><img src="{{ asset('images/blogs/blog-8.jpg') }}"></a>
                                    <a class="carousel-item" href="#four!"><img src="{{ asset('images/blogs/blog-7.jpg') }}"></a>
                                </div>
                                <span class="card-title">
                                    عنوان خبر
                                    <p class="small">25 مهر 1399</p>
                                </span>
                            </div>
                            <div class="card-content">
                                <p>
                                    برگزاری مراسم عزاداری سرور و سالار شهیدان در روز محرم‌الحرام و برافراشته کردن پرچم متبارک امام حسین (ع)
                                </p>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light fixed-button" type="button" name="action">
                                    <span>جزییات خبر</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeUp">
                            <div class="card-image">
                                <div class="carousel carousel-slider center" data-indicators="true">
                                    <a class="carousel-item" href="#one!"><img src="{{ asset('images/blogs/blog-10.jpg') }}"></a>
                                    <a class="carousel-item" href="#two!"><img src="{{ asset('images/blogs/blog-11.jpg') }}"></a>
                                </div>
                                <span class="card-title">
                                    عنوان خبر
                                    <p class="small">29 آبان 1399</p>
                                </span>
                            </div>
                            <div class="card-content">
                                <p>
                                    حضور فارغ التحصیلان رشته ریاضی سال تحصیلی ۹۷- ۹۸ دبیرستان پسرانه شاهد شهید رمضانزاده
                                </p>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light fixed-button" type="button" name="action">
                                    <span>جزییات خبر</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test3" class="col s12">
                    <div class="col s12 m6">
                        <div class="card animate fadeUp">
                            <div class="card-content">
                                <h6 class="center">رویداد های مدرسه</h6>
                                <div class="pt-4 center">
                                    <span>بازدید ریاست آموزش پرورش از مدرسه</span>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">در جریان</span>
                                </div>
                                <div class="pt-4 center">
                                    <span>برگزاری آزمون گاج</span>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">ساعت 12:00 الی 13:00</span>
                                </div>
                                <div class="pt-4 center">
                                    <span>جلسه اولیاء با مربیان</span>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">ساعت 16:00 الی 17:00</span>
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light fixed-button" type="button" name="action">
                                    <span>نمایش تمام رویدادها</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card animate fadeUp">
                            <div class="card-content">
                                <h6 class="center">رویداد های من</h6>
                                <div class="pt-4 center">
                                    <a class="text-dark" href="#">کلاس جبرانی فیزیک</a>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">در حال برگزاری</span>
                                </div>
                                <div class="pt-4 center">
                                    <a class="text-dark" href="#">برگزاری آزمون زبان</a>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">ساعت 11:00 الی 13:00</span>
                                </div>
                                <div class="pt-4 center">
                                    <a class="text-dark" href="#">تحویل تکلیف ریاضی</a>
                                    <br>
                                    <span class="badge pink small border-radius float-none m-0">ساعت 17:00 الی 18:00</span>
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light fixed-button" type="button" name="action">
                                    <span>نمایش تمام رویدادها</span>
                                </a>
                            </div>
                        </div>
                    </div>  
                </div>
                <div id="test4" class="col s12">
                    <div class="col s12 m6">
                        <div class="card animate fadeUp">
                            <div class="card-content">
                                <form action="">
                                    <p>
                                        از عملکرد مدرسه در زمینه های آموزشی، پرورشی و عمرانی چه اندازه رضایت عمل دارید؟
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>زیاد</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>نسبتا خوب</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>متوسط</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>کم</span>
                                        </label>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card animate fadeUp">
                            <div class="card-content">
                                <form action="">
                                    <p>
                                        از عملکرد کوله پشتی در زمینه های کلاس آنلاین، آزمون و امکانات آنلاین چه اندازه رضایت عمل دارید؟
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>زیاد</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>نسبتا خوب</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>متوسط</span>
                                        </label>
                                    </p>
                                    <p class="mb-1 mt-3">
                                        <label>
                                            <input type="checkbox" id="vote">
                                            <span>کم</span>
                                        </label>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn waves-effect waves-light fixed-button animate fadeUp" type="button" name="action">
                        <span>نمایش تمام نظرسنجی ها</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div id="card-panel-type2" class="section">
        <div class="row">
            <div class="col s12">
                <div class="card animate fadeLeft">
                    <div class="card-content center yellow">
                        <img src="{{ asset('images/logo/shahed-logo.png') }}" width="100" alt="لوگوی شاهد رمضانزاده">
                        <h6 class="card-title font-weight-400">مدرسه شاهد رمضانزاده</h6>
                        <p>دبیرستان دوره دوم</p>
                    </div>
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a class="active" href="#test5"><i class="fad fa-school"></i> درباره مدرسه</a></li>
                            <li class="tab"><a href="#test6"><i class="fad fa-user-tie"></i> کادر مدرسه</a></li>
                            <li class="tab"><a href="#test7"><i class="fad fa-award"></i> افتخار آفرینان  مدرسه</a></li>
                            <li class="tab"><a href="#test8"><i class="fad fa-phone"></i> تماس با مدرسه</a></li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div id="test5" class="center">
                            <div class="row">
                                <div class="col s12 l4">
                                    <div class="card animate fadeUp">
                                        <div class="card-content p-0">
                                            <div class="carousel carousel-slider center border-radius" data-indicators="true">
                                                <a class="carousel-item" href="#one!"><img src="{{ asset('images/school/about/1.jpg') }}"></a>
                                                <a class="carousel-item" href="#two!"><img src="{{ asset('images/school/about/2.jpg') }}"></a>
                                                <a class="carousel-item" href="#three!"><img src="{{ asset('images/school/about/3.jpg') }}"></a>
                                                <a class="carousel-item" href="#four!"><img src="{{ asset('images/school/about/4.jpg') }}"></a>
                                                <a class="carousel-item" href="#five!"><img src="{{ asset('images/school/about/5.jpg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 l8">
                                    <div class="card animate fadeUp">
                                        <div class="card-content">
                                            <h6>تاریخچه:</h6>
                                            <p>سال تأسیس: 1370</p>
                                            <p class="pt-2"> دبیرستان شاهد رمضانزاده از جمله مدارسی است که از سال تاسیس تا کنون در ردیف مدارس موفق استان و کشور است
                                                رتبه های برتر و تک رقمی کشوری در کنکور از قبیل 
                                                رتبه ۲ ، ۴ ، ۵ ، ۷ ، ۹ و ۱۱ کشوری
                                                رتبه های اول کشوری در مسابقات فرهنگی هنری
                                                تربیت نیروهای متخصص و فوق تخصص در زمینه های مختلف پزشکی ، مهندسی و علوم انسانی
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card animate fadeUp">
                                        <div class="card-content">
                                            <h6 class="pt-3">مدیران:</h6>
                                            <p>محمدرضا باغستانی - ناصر مخترع زاده - محمدعلی راغبیان - مجید رهبران</p>
                                        </div>
                                    </div>
                                    <div class="card animate fadeUp">
                                        <div class="card-content">
                                            <h6 class="pt-3">واقفین:</h6>
                                            <p>واقف ، پدر شهید بزرگوار مرحوم محمد علی رمضانزاده</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="test6" class="center">
                            <div class="row">
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>مدیریت:</h6>
                                        <div class="row">
                                            <img src="{{ asset('images/avatar/avatar-1.jpg') }}" width="80" class="mt-2 border-radius" alt="مجید رهبران">
                                            <p class="medium">مجید رهبران</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>معاونت:</h6>
                                        <div class="row pt-2 flexbox"> 
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-1.png') }}" width="80" class="mt-2 border-radius" alt="محمدعلی راغبیان">
                                                <p class="medium">محمدعلی راغبیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-2.png') }}" width="80" class="mt-2 border-radius" alt="علی‌اکبر اسماعیلی">
                                                <p class="medium">علی‌اکبر اسماعیلی</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-3.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا مشهدی‌خواه یزد">
                                                <p class="medium">محمدرضا مشهدی‌خواه یزد</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-4.png') }}" width="80" class="mt-2 border-radius" alt="مهدی شرقیان">
                                                <p class="medium">مهدی شرقیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-5.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا ابوئی">
                                                <p class="medium">محمدرضا ابوئی </p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-6.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا شکاری">
                                                <p class="medium">محمدرضا شکاری </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>کادر اجرایی:</h6>
                                        <div class="row pt-2 flexbox"> 
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-6.png') }}" width="80" class="mt-2 border-radius" alt="محمدعلی راغبیان">
                                                <p class="medium">محمدعلی راغبیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-7.png') }}" width="80" class="mt-2 border-radius" alt="علی‌اکبر اسماعیلی">
                                                <p class="medium">علی‌اکبر اسماعیلی</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-8.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا مشهدی‌خواه یزد">
                                                <p class="medium">محمدرضا مشهدی‌خواه یزد</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-9.png') }}" width="80" class="mt-2 border-radius" alt="مهدی شرقیان">
                                                <p class="medium">مهدی شرقیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-10.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا ابوئی">
                                                <p class="medium">محمدرضا ابوئی </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>کادر آموزشی:</h6>
                                        <div class="row pt-2 flexbox"> 
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-11.png') }}" width="80" class="mt-2 border-radius" alt="محمدعلی راغبیان">
                                                <p class="medium">محمدعلی راغبیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-12.png') }}" width="80" class="mt-2 border-radius" alt="علی‌اکبر اسماعیلی">
                                                <p class="medium">علی‌اکبر اسماعیلی</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-13.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا مشهدی‌خواه یزد">
                                                <p class="medium">محمدرضا مشهدی‌خواه یزد</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-14.png') }}" width="80" class="mt-2 border-radius" alt="مهدی شرقیان">
                                                <p class="medium">مهدی شرقیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-15.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا ابوئی">
                                                <p class="medium">محمدرضا ابوئی </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="test7" class="center">
                            <div class="row">
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>حوزه آموزش:</h6>
                                        <div class="row">
                                            <img src="{{ asset('images/avatar/avatar-1.jpg') }}" width="80" class="mt-2 border-radius" alt="مجید رهبران">
                                            <p class="medium">مجید رهبران</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>حورزه پرورشی:</h6>
                                        <div class="row pt-2 flexbox"> 
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-1.png') }}" width="80" class="mt-2 border-radius" alt="محمدعلی راغبیان">
                                                <p class="medium">محمدعلی راغبیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-2.png') }}" width="80" class="mt-2 border-radius" alt="علی‌اکبر اسماعیلی">
                                                <p class="medium">علی‌اکبر اسماعیلی</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-3.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا مشهدی‌خواه یزد">
                                                <p class="medium">محمدرضا مشهدی‌خواه یزد</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-4.png') }}" width="80" class="mt-2 border-radius" alt="مهدی شرقیان">
                                                <p class="medium">مهدی شرقیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-5.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا ابوئی">
                                                <p class="medium">محمدرضا ابوئی </p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-6.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا شکاری">
                                                <p class="medium">محمدرضا شکاری </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card animate fadeUp">
                                    <div class="card-content p-1">
                                        <h6>حوزه ورزشی:</h6>
                                        <div class="row pt-2 flexbox"> 
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-6.png') }}" width="80" class="mt-2 border-radius" alt="محمدعلی راغبیان">
                                                <p class="medium">محمدعلی راغبیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-7.png') }}" width="80" class="mt-2 border-radius" alt="علی‌اکبر اسماعیلی">
                                                <p class="medium">علی‌اکبر اسماعیلی</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-8.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا مشهدی‌خواه یزد">
                                                <p class="medium">محمدرضا مشهدی‌خواه یزد</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-9.png') }}" width="80" class="mt-2 border-radius" alt="مهدی شرقیان">
                                                <p class="medium">مهدی شرقیان</p>
                                            </div>
                                            <div class="col s4 m3 l2 m-0 p-0">
                                                <img src="{{ asset('images/avatar/avatar-10.png') }}" width="80" class="mt-2 border-radius" alt="محمدرضا ابوئی">
                                                <p class="medium">محمدرضا ابوئی </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="test8" class="center">
                            <div class="row">
                                <div class="col s12 l6">
                                    <div class="card animate fadeUp">
                                        <div class="card-content p-0 border-radius">
                                            <div id="map" class="w-100 h-medium"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 l6">
                                    <div class="card animate fadeUp">
                                        <div class="card-content">
                                            <h6>اطلاعات تماس:</h6>
                                            <div class="row">
                                                <div class="col s12 pt-2">
                                                    <i class="fas fa-phone-square"></i>
                                                    03537246212 - 03537241020
                                                </div>
                                                <div class="col s12 pt-2">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    یزد - بلوار پاکنژاد - سه راه آبنما - خیابان هزار درخت - روبروی همبرگر یوسف - مدرسه شاهد رمضانزاده دبیرستان دوره دوم
                                                </div>
                                                <div class="col s12 pt-2">
                                                    <a class="text-dark" href="https://www.instagram.com/shahed_ramazan_zade/">
                                                        <i class="fab fa-instagram-square"></i>
                                                        shahed_ramazan_zade@
                                                    </a>
                                                </div>
                                                <div class="col s12 pt-2">
                                                    <a class="text-dark" href="https://t.me/dabirestan_ramazanzadeh">
                                                        <i class="fab fa-telegram"></i>
                                                        dabirestan_ramazanzadeh@
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- page js --}}
@section('page-script')
    <script src="{{ asset('js/scripts/cards-extended.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/map/ol.js') }}"></script>
    <script>
        // slider script
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
        autoplay();
        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 4500);
        }   
        // tab script
        $(document).ready(function(){
            $('tabs').tabs();
        });
        // map script
        const iconFeature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([54.349438, 31.891255])),
            name: 'Somewhere near Nottingham',
        });
        var map = new ol.Map({
            target: 'map',
            controls: ol.control.defaults({ attribution: false }),
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                new ol.layer.Vector({
                    source: new ol.source.Vector({
                        features: [iconFeature]
                    }),
                    style: new ol.style.Style({
                        image: new ol.style.Icon({
                            anchor: [0.5, 46],
                            anchorXUnits: 'fraction',
                            anchorYUnits: 'pixels',
                            src: 'https://openlayers.org/en/latest/examples/data/icon.png'
                        })
                    })
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([54.349438, 31.891255]),
                zoom: 15
            })
        });
    </script>
@endsection