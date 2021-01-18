<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
  <nav
    class="{{$configData['navbarMainClass']}} @if($configData['isNavbarDark']=== true) {{'navbar-dark'}} @elseif($configData['isNavbarDark']=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
    <div class="nav-wrapper">
      <div class="header-search-wrapper hide-on-med-and-down">
        <i class="fad fa-search"></i>
        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="جستجو..."
          data-search="starter-kit-list">
        <ul class="search-list collection display-none"></ul>
      </div>
      <ul class="navbar-list right">
        {{-- <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="#"
            data-target="translation-dropdown">
            <span class="flag-icon flag-icon-gb"></span>
          </a>
        </li> --}}
        <li>
          <a class="waves-effect waves-block waves-light help-button" href="javascript:void(0);"
          data-target="help-dropdown">
            <i class="fad fa-question-circle"></i>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light support-button" href="javascript:void(0);">
            <i class="fad fa-user-headset"></i>
          </a>
        </li>
        <li class="hide-on-large-only search-input-wrapper">
          <a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
            <i class="fad fa-search"></i>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"
            data-target="notifications-dropdown">
            <i class="fad fa-bell"><small class="notification-badge">5</small></i>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
            data-target="profile-dropdown">
            <span class="avatar-status avatar-online">
              <img src="{{asset('images/avatar/avatar-7.png')}}" alt="avatar"><i></i>
            </span>
          </a>
        </li>
        {{-- <li>
          <a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right">
            <i class="material-icons">format_indent_increase</i>
          </a>
        </li> --}}
      </ul>
      <!-- translation-button-->
      {{-- <ul class="dropdown-content" id="translation-dropdown">
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
            <i class="flag-icon flag-icon-gb"></i>
            English
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/fr')}}" data-language="fr">
            <i class="flag-icon flag-icon-fr"></i>
            French
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/pt')}}" data-language="pt">
            <i class="flag-icon flag-icon-pt"></i>
            Portuguese
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/de')}}" data-language="de">
            <i class="flag-icon flag-icon-de"></i>
            German
          </a>
        </li>
      </ul> --}}
      <!-- notifications-dropdown-->
      <ul class="dropdown-content" id="notifications-dropdown">
        <li>
          <h6>اطلاعیه‌ها<span class="new badge">5</span></h6>
        </li>
        <li class="divider"></li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
            لورم اپیسوم
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 ساعت قبل</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle red small">stars</span>
            لورم اپیسوم
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 روز قبل</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle teal small">settings</span>
            لورم اپیسوم یک متن ساختگی است.
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 روز قبل</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle deep-orange small">today</span>
            لورم ایپسوم متن ساختگی با تولید سادگی
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 روز قبل</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle amber small">trending_up</span>
            لورم اپیسوم یک متن ساختگی است.
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 هفته قبل</time>
        </li>
      </ul>
      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="fad fa-user-cog orange-text"></i>&hairsp;
            پروفایل   
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="fad fa-user-lock orange-text"></i>&hairsp;
            قفل حساب
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="fad fa-door-open orange-text"></i>&hairsp;
            خروج
          </a>
        </li>
      </ul>
      <!-- help-dropdown-->
      <ul class="dropdown-content" id="help-dropdown">
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="fad fa-directions orange-text"></i>&hairsp;
            پیمایش
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="fad fa-photo-video orange-text"></i>&hairsp;
            تصویری
          </a>
        </li>
      </ul>
    </div>
    <nav class="display-none search-sm">
      <div class="nav-wrapper">
        <form id="navbarForm">
          <div class="input-field search-input-sm">
            <input class="search-box-sm mb-0" type="search" required="" placeholder='جستجو...' id="search"
              data-search="starter-kit-list">
            <label class="label-icon" for="search">
              <i class="material-icons search-sm-icon"></i>
            </label>
            <i class="material-icons search-sm-close">close</i>
            <ul class="search-list collection search-list-sm display-none"></ul>
          </div>
        </form>
      </div>
    </nav>
  </nav>
</div>
<!-- search ul  -->
<ul class="display-none" id="default-search-main">
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">FILES</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="{{asset('images/icon/pdf-image.png')}}" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">
              Two new item submitted</span>
            <small class="grey-text">Marketing Manager</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">17kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="{{asset('images/icon/doc-image.png')}}" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">52 Doc file Generator</span>
            <small class="grey-text">FontEnd Developer</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">550kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="{{asset('images/icon/xls-image.png')}}" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">25 Xls File Uploaded</span>
            <small class="grey-text">Digital Marketing Manager</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">20kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="{{asset('images/icon/jpg-image.png')}}" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Anna Strong</span>
            <small class="grey-text">Web Designer</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">37kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">MEMBERS</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="{{asset('images/avatar/avatar-7.png')}}" width="30" alt="sample image"></div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">John Doe</span>
            <small class="grey-text">UI designer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="{{asset('images/avatar/avatar-8.png')}}" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Michal Clark</span>
            <small class="grey-text">FontEnd Developer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="{{asset('images/avatar/avatar-10.png')}}" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Milena Gibson</span>
            <small class="grey-text">Digital Marketing</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="{{asset('images/avatar/avatar-12.png')}}" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Anna Strong</span>
            <small class="grey-text">Web Designer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
</ul>
<ul class="display-none" id="page-search-title">
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">PAGES</h6>
    </a>
  </li>
</ul>
<ul class="display-none" id="search-not-found">
  <li class="auto-suggestion">
    <a class="collection-item display-flex align-items-center" href="#">
      <span class="material-icons">error_outline</span>
      <span class="member-info">No results found.</span>
    </a>
  </li>
</ul>