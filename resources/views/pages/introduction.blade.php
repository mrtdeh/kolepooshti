{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','شیمی')

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card animate fadeLeft">
        <div class="card-content p-0">  
            <img src="{{ asset('images/banner/chemistry.jpg') }}" alt="پایه ها" class="w-100">
        </div>
    </div>
</div>

<div class="section">
    <div class="row">
        <div class="col s12">
            <div class="card card-border center-align">
                <div class="card-content">
                    خستین روزهایی که به مدرسه می رفتیم و پایه اول دبستان را شروع می کردیم، با کتابی آشنا شدیم که انگار جنس صحبت کردن آن با بقیه دروس فرق داشت؛ تنها کتابی که بیش از درس های دیگر مزه علم و دانش را می داد، همان کتاب علوم تجربی بود.

وقتی در دبیرستان با جسم نحیف و لاغر “شیمی” مواجه شده و کمی آن را ورق می زنیم، تازه متوجه نوع فصل بندی کتاب ارزشمند و پر خاطره دبستانمان می شویم و انگار دوستی ما با شیمی، ریشه ای در گذشته های نه چندان دور دارد.

هر چقدر که علوم تجربی را با لذت بیشتری خواندیم، در دبیرستان از زیبایی های درس شیمی فاصله گرفتیم و آن را محدود به سوال و جواب های بی هدف و البته غولی به نام کنکور نمودیم؛ و متأسفانه این اتفاق گریبان درس هایی همچون زیست، فیزیک و ریاضی را هم گرفت.

امروز که در منصب تربیت و توسعه شیمیدانان آینده ایران نشسته ایم و در کشتی ای به نام “کمولوژی” پیش می رویم، رؤیایی داریم تا همانند دوران کودکی خود، بتوانیم از درس و علم آموزی لذت برده و در کنار آن، اگر پیشرانه ای به نام آزمون شکل گرفت، با موفقیت سپری کنیم.

این مقدمه تلخ و شیرین هر چند که حقیقت جامعه آموزشی کشورمان را بیان کرده است، اما توجه به وظایف خودمان – چه به عنوان دانش آموز و چه به عنوان آموزگار – می تواند قدری از آسیب های چرخه علمی کشور را کاهش دهد.

شیمی چیست
بهترین و دقیق ترین تعریفی که می توان از شیمی مطرح کرد، آمیزه ای از متون کتاب علوم تجربی دبستان و شیمی (۱) در مقطع دبیرستان است.

شیمی، علم آشنایی با مواد و ترکیبات مختلف، تأثیر آنها بر یکدیگر و چگونگی رفتارشان در مواجه با شرایط محیطی متفاوت است.

همچون سایر موضوعات علمی، شیمی از زیر مجموعه های متفاوتی برخوردار است که جهت بررسی تخصصی و مطالعه عمیق هر کدام، دانش پژوهان یک زمینه آن را انتخاب می کنند. به گواه تاریخ، گستردگی و تعداد شاخه های دو علم زیست و شیمی از همان دوران اولیه پیدایش، برتری قابل توجهی در قیاس با سایر علوم داشته اند.

مباحثی از جمله شیمی محض، شیمی فیزیک، شیمی تجزیه، شیمی معدنی، پلیمرها و شیمی آلی جزو طبقه بندی تخصصی شیمی هستند.
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal" class="modal">
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

@section('page-script')
    <script src="{{ asset('js/scripts/cards-extended.js') }}"></script>
    <script src="{{ asset('js/scripts/advance-ui-modals.js') }}"></script>
@endsection