
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- color of address bar in mobile browser -->
  <meta name="theme-color" content="#2B2B35">
  <!-- favicon  -->
  <link rel="shortcut icon" href="<?= base_url()?>templateprotfolio/assets/img/thumbnail.ico" type="image/x-icon">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?= base_url()?>templateprotfolio/assets/css/plugins/bootstrap.min.css">
  <!-- font awesome css -->
  <link rel="stylesheet" href="<?= base_url()?>templateprotfolio/assets/css/plugins/font-awesome.min.css">
  <!-- swiper css -->
  <link rel="stylesheet" href="<?= base_url()?>templateprotfolio/assets/css/plugins/swiper.min.css">
  <!-- fancybox css -->
  <link rel="stylesheet" href="<?= base_url()?>templateprotfolio/assets/css/plugins/fancybox.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="<?= base_url()?>templateprotfolio/assets/css/style.css">
<?= $this->renderSection('title') ?>
</head>

<body>

  <!-- app -->
  <div class="art-app">

    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">

      <!-- app container end -->
      <div class="art-app-container">

        <!-- info bar -->
        <?=$this->include('templateprotfolio/protfolioactive') ?>
        <!-- info bar end -->

        <!-- content -->
        <div class="art-content">

          <!-- curtain -->
          <div class="art-curtain"></div>

          <!-- top background -->
          <div class="art-top-bg" style="background-image: url(<?= base_url()?>templateprotfolio/assets/img/bg.jpg)">
            <!-- overlay -->
            <div class="art-top-bg-overlay"></div>
            <!-- overlay end -->
          </div>
          <!-- top background end -->

          <!-- swup container -->
          <div class="transition-fade" id="swup">
            <div id="scrollbar" class="art-scroll-frame">

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- banner -->
                    <div class="art-a art-banner" style="background-image: url(<?= base_url()?>templateprotfolio/assets/img/bg.jpg)">
                      <!-- banner back -->
                      <div class="art-banner-back"></div>
                      <!-- banner dec -->
                      <div class="art-banner-dec"></div>
                      <!-- banner overlay -->
                      <div class="art-banner-overlay">
                        <!-- main title -->
                        <div class="art-banner-title">
                          <!-- title -->
                          <h1 class="mb-15">Discover my Amazing <br>Art Space!</h1>
                          <!-- suptitle -->
                          <div class="art-lg-text art-code mb-25">&lt;<i>code</i>&gt; I build <span class="txt-rotate" data-period="2000"
                              data-rotate='[ "web interfaces.", "ios and android applications.", "design mocups.", "automation tools." ]'></span>&lt;/<i>code</i>&gt;</div>
                          <div class="art-buttons-frame">
                            <!-- button -->
                            <a href="/portfolio-3-col-masonry.html" class="art-btn art-btn-md"><span>Explore now</span></a>
                          </div>
                        </div>
                        <!-- main title end -->
                        <!-- photo -->
                        <img src="<?= base_url()?>templateprotfolio/assets/img/face-2.png" class="art-banner-photo" alt="Your Name">
                      </div>
                      <!-- banner overlay end -->
                    </div>
                    <!-- banner end -->

                  </div>
                  <!-- col end -->
                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">10</span><span class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Years Experience</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">143</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Completed Projects</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">114</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Happy Customers</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">20</span><span class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Honors and Awards</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
            <!-- scroll frame -->
            <?= $this->renderSection('protfolio') ?>
            <!-- scroll frame end -->
            <div class="container-fluid">

                <!-- footer -->
                <footer>
                  <!-- copyright -->
                  <div>© 2020 Artur Carter</div>
                  <!-- author ( Please! Do not delete it. You are awesome! :) -->
                  <div>Template author:&#160; <a href="https://themeforest.net/user/millerdigitaldesign" target="_blank">Nazar Miller</a></div>
                </footer>
                <!-- footer end -->

              </div>
              <!-- container end -->

            </div>
          </div>
          <!-- swup container end -->

        </div>
        <!-- content end -->

        <!-- menu bar -->
        <div class="art-menu-bar">

          <!-- menu bar frame -->
          <?=$this->include('templateprotfolio/sidebar') ?>
          <!-- menu bar frame -->

        </div>
        <!-- menu bar end -->

      </div>
      <!-- app container end -->

    </div>
    <!-- app wrapper end -->

    <!-- preloader -->
    <div class="art-preloader">
      <!-- preloader content -->
      <div class="art-preloader-content">
        <!-- title -->
        <h4>Artur Carter</h4>
        <!-- progressbar -->
        <div id="preloader" class="art-preloader-load"></div>
      </div>
      <!-- preloader content end -->
    </div>
    <!-- preloader end -->

  </div>
  <!-- app end -->

  <!-- jquery js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/jquery.min.js"></script>
  <!-- anime js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/anime.min.js"></script>
  <!-- swiper js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/swiper.min.js"></script>
  <!-- progressbar js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/progressbar.min.js"></script>
  <!-- smooth scrollbar js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- overscroll js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/overscroll.min.js"></script>
  <!-- typing js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/typing.min.js"></script>
  <!-- isotope js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/isotope.min.js"></script>
  <!-- fancybox js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/fancybox.min.js"></script>
  <!-- swup js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/plugins/swup.min.js"></script>

  <!-- main js -->
  <script src="<?= base_url()?>templateprotfolio/assets/js/main.js"></script>

</body>

</html>
