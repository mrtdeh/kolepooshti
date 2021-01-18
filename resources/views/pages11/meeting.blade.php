{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','شیمی')

{{-- page css --}}
@section('page-style')
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
@endsection

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
        <div class="col s12 l3">
            <div class="card card-border center-align gradient-45deg-indigo-purple">
                <div class="card-content">
                    <h6 class="white-text pb-10 border-bottom-1">جلسه پیش رو</h6>
                    <p class="white-text pt-10">دوشنبه 17 آذر 1399</p>
                    <p class="white-text pt-6">ساعت 08:00 الی 09:00</p>
                    {{-- موقع فعال شدن کلاس gradient-45deg-deep-orange-orange به کلاس های المان زیر اضافه شود --}}
                    <a class="waves-effect waves-light btn border-round mt-10 z-depth-4 disabled">ورود به جلسه</a>
                </div>
            </div>
            <div class="card card-border center-align gradient-45deg-amber-amber mt-10">
                <div class="card-content">
                    <h6 class="white-text pb-10 border-bottom-1">فایل ارائه کلاس</h6>
                    <input type="file" id="input-file-disable-remove" class="dropify" data-disable-remove="true" data-max-file-size="100M"/>
                </div>
            </div>
        </div>
        <div class="col s12 l9">
            <div class="card card-border center-align border-padding">
                <div class="card-content border-dashed">
                    <h6 class="pb-3 border-bottom-1-dark">جلسات برگزار شده</h6>
                    <table class="subscription-table responsive-table highlight centered">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>تاریخ برگزاری</th>
                                <th>ساعت شروع</th>
                                <th>ساعت پایان</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>جلسه 1</td>
                                <td>1399/07/22</td>
                                <td><span class="badge green lighten-5 green-text text-accent-4">08:00</span></td>
                                <td><span class="badge red lighten-5 red-text text-accent-2">09:30</span></td>
                                <td><a href="#"><i class="fas fa-video blue-text m-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fas fa-clipboard-user orange-text m-2 modal-trigger" href="#modal"></i></a></td>
                            </tr>
                            <tr>
                                <td>جلسه 2</td>
                                <td>1399/08/13</td>
                                <td><span class="badge green lighten-5 green-text text-accent-4">09:45</span></td>
                                <td><span class="badge red lighten-5 red-text text-accent-2">11:15</span></td>
                                <td><a href="#"><i class="fas fa-video blue-text m-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fas fa-clipboard-user orange-text m-2 modal-trigger" href="#modal"></i></a></td>
                            </tr>
                            <tr>
                                <td>جلسه 3</td>
                                <td>1399/09/08</td>
                                <td><span class="badge green lighten-5 green-text text-accent-4">11:30</span></td>
                                <td><span class="badge red lighten-5 red-text text-accent-2">13:00</span></td>
                                <td><a href="#"><i class="fas fa-video blue-text m-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fas fa-clipboard-user orange-text m-2 modal-trigger" href="#modal"></i></a></td>
                            </tr>
                            <tr>
                                <td>جلسه 4</td>
                                <td>1399/09/29</td>
                                <td><span class="badge green lighten-5 green-text text-accent-4">11:30</span></td>
                                <td><span class="badge red lighten-5 red-text text-accent-2">13:00</span></td>
                                <td><a href="#"><i class="fas fa-video blue-text m-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fas fa-clipboard-user orange-text m-2"></i></a></td>
                            </tr>
                            <tr>
                                <td>جلسه 5</td>
                                <td>1399/10/03</td>
                                <td><span class="badge green lighten-5 green-text text-accent-4">08:00</span></td>
                                <td><span class="badge red lighten-5 red-text text-accent-2">09:30</span></td>
                                <td><a href="#"><i class="fas fa-video blue-text m-2"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fas fa-clipboard-user orange-text m-2"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal" class="modal modal-fixed-footer">
    <div class="modal-title">
        <i class="fas fa-clipboard-user orange-text"></i>
        <h6 class="d-inline-block">گزارش جلسه</h6>
    </div>
    <div class="modal-content p-sm-0">
        <div class="row">
            <div class="col s12">
                <table class="subscription-table responsive-table bordered highlight centered">
                    <thead>
                        <tr>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>نقش</th>
                            <th>ساعت ورود</th>
                            <th>مدت زمان حضور</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>میلاد</td>
                            <td>صادقی</td>
                            <td><span class="badge green lighten-5 green-text text-accent-4">معلم</span></td>
                            <td>08:04</td>
                            <td>83 دقیقه</td>
                            <td><a href="#"><i class="fas fa-clipboard-list orange-text m-2 modal-trigger" href="#"></i></a></td>
                        </tr>
                        <tr>
                            <td>حسین</td>
                            <td>طبیب زاده</td>
                            <td><span class="badge red lighten-5 red-text text-accent-4">دانش آموز</span></td>
                            <td>08:06</td>
                            <td>74 دقیقه</td>
                            <td><a href="#"><i class="fas fa-clipboard-list orange-text m-2 modal-trigger" href="#"></i></a></td>
                        </tr>
                        <tr>
                            <td>مرتضی</td>
                            <td>دهقانی زاده</td>
                            <td><span class="badge red lighten-5 red-text text-accent-4">دانش آموز</span></td>
                            <td>08:15</td>
                            <td>73 دقیقه</td>
                            <td><a href="#"><i class="fas fa-clipboard-list orange-text m-2 modal-trigger" href="#"></i></a></td>
                        </tr>
                        <tr>
                            <td>محسن</td>
                            <td>گذشتی</td>
                            <td><span class="badge red lighten-5 red-text text-accent-4">دانش آموز</span></td>
                            <td>08:44</td>
                            <td>30 دقیقه</td>
                            <td><a href="#"><i class="fas fa-clipboard-list orange-text m-2 modal-trigger" href="#"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="flexbox">
            <a class="waves-effect waves-light btn modal-action modal-close green mr-3">چاپ</a>
            <a class="waves-effect waves-light btn modal-action modal-close red">انصراف</a>
        </div>
    </div>
</div>

@endsection

@section('page-script')
    <script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('js/scripts/form-file-uploads.js') }}"></script>
    <script src="{{ asset('js/scripts/advance-ui-modals.js') }}"></script>
@endsection