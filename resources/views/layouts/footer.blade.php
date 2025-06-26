  <footer id="footer-area">
      <div class="container pb-3">
          <div class="row">

              <div class="col-6 footer-widget pe-5 about">
                  <ul class="p-0">
                      <li><a href="tel: {{ $components['phone'] }}">@lang('stg.contact')</a></li>
                      <li><a href="mailto: {{ $components['mail'] }}">@lang('stg.mailus')</a> </li>
                  </ul>
              </div>
              <div class="col-md-6 footer-widget mt-3">
                  <div class="pe-5">
                      <h4 class="text-start">@lang('stg.follow') </h4>
                      <ul class="d-flex gap-2 text-white p-0">
                          <li><a href="{{ $components['facebook'] }}"><i class="fab fa-facebook"></i></a></li>
                          <li><a href="{{ $components['X-twitter'] }}"><i class="fab fa-x-twitter"></i></a></li>
                          <li><a href="{{ $components['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                          <li><a href="{{ $components['linked-in'] }}"><i class="fab fa-linkedin"></i></a></li>
                          <li><a href="{{ $components['youtube'] }}"><i class="fab fa-youtube"></i></a></li>
                          <li><a href="{{ $components['telegram'] }}"><i class="fab fa-telegram-plane"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-copyright py-4 ps-3">
          <div> STG © 2025 </div>
      </div>
  </footer>
