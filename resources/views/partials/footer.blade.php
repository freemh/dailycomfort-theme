<footer>

  {{-- # Infos --}}
  <div class="footer-infos">
    <div class="container">
      <div class="footer-logo">
        <a href="#"><img src="{{ get_template_directory_uri() }}/assets/images/brand-footer.png" alt="" /></a>
      </div>
      <div class="footer-menu">
        <ul>
          @foreach($pages = get_pages() as $page)
            <li><a href="{{ get_permalink($page->ID) }}">{{ $page->post_title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="footer-social">
        <a href="http://twitter.com/arbaoui_mehdi"><i class="la la-twitter"></i></a>
        <a href="http://facebook.com"><i class="la la-pinterest"></i></a>
        <a href="http://instagram.com"><i class="la la-instagram"></i></a>
        <a href="http://googleplus.com"><i class="la la-google-plus"></i></a>
        <a href="http://dribbble.com"><i class="la la-dribbble"></i></a>
      </div>
    </div>
  </div>

  {{-- # Copyright --}}
  <div class="footer-copyright">
    <div class="container">
      Copyrights © 2017 by <a href="https://arbaouimehdi.com">Arbaoui Mehdi</a>. All Rights Reserved.
    </div>
  </div>

</footer>
