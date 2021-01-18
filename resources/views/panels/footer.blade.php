<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span><a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
          target="_blank">قوانین</a> | <a href="">درباره کوله پشتی</a> | <a href="">تماس با ما</a>
      </span>
      <span class="right hide-on-small-only">
        طراحی و توسعه توسط شرکت کاسپین، تمامی حقوق محفوظ است.&copy;
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->