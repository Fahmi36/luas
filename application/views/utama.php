
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('') ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url('') ?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?= base_url('') ?>/assets/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url('') ?>/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('') ?>/assets/css/demo.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <?php $this->load->view('incl/sidebar') ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <?php $this->load->view($link_page) ?>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
<!--             <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Creative Tim
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav> -->

          </div>
        </footer>
      </div>
    </div>
<!--     <div class="fixed-plugin">
      <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
          <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
          <li class="header-title"> Sidebar Filters</li>
          <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger active-color">
              <div class="badge-colors ml-auto mr-auto">
                <span class="badge filter badge-purple" data-color="purple"></span>
                <span class="badge filter badge-azure" data-color="azure"></span>
                <span class="badge filter badge-green" data-color="green"></span>
                <span class="badge filter badge-warning" data-color="orange"></span>
                <span class="badge filter badge-danger" data-color="danger"></span>
                <span class="badge filter badge-rose active" data-color="rose"></span>
              </div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li class="header-title">Images</li>
          <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="<?= base_url('') ?>/assets/img/sidebar-1.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="<?= base_url('') ?>/assets/img/sidebar-2.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="<?= base_url('') ?>/assets/img/sidebar-3.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="<?= base_url('') ?>/assets/img/sidebar-4.jpg" alt="">
            </a>
          </li>
          <li class="button-container">
            <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
          </li>
         <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
              </li> -->
            </ul>
          </div>
        </div> 
        <!--   Core JS Files   -->
        <?php if ($this->uri->segment(1) != 'editlahan') {?>
        <script src="<?= base_url('') ?>/assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/core/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js "></script>
        <script src="<?= base_url('') ?>/assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="<?= base_url('') ?>/assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <!-- <script src="<?= base_url('') ?>/assets/js/plugins/jquery.validate.min.js"></script> -->
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="<?= base_url('') ?>/assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="<?= base_url('') ?>/assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?= base_url('') ?>/assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="<?= base_url('') ?>/assets/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBPHCpWOiSncpkYHFh8zh6zDKBuT2a1c&language=id&region=id&libraries=places,geometry,drawing" type="text/javascript"></script>
        <script src="<?= base_url('') ?>/assets/js/maps.js"></script>
        <!-- Chartist JS -->

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="<?= base_url('') ?>/assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?= base_url('') ?>/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="<?= base_url('') ?>/assets/js/demo.js"></script>
        <script>
          $(document).ready(function() {
            $("#kirimpolygon").submit(function (event) {
              var data = new FormData($(this)[0]);
              Swal.fire({
                title: 'Data Sudah benar ?',
                text: "Klik Ya",
                type: 'success',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Ya',
                preConfirm: () => { 
                  $.ajax({
                    url: '<?= site_url('Main/InsertData') ?>',
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                      console.log(response);
                      Swal.fire(
                        ''+response.msg+'',
                        );
                      $("#kirimpolygon")[0].reset();
                    },
                    error: function () {
                      Swal.fire(
                        ''+response.msg+'',
                        'Hubungi Tim Terkait',
                        );
                    }
                  });
                  return false;
                }
              });
            });

            $('#sel_kota').select2({
              placeholder: "Pilih Kota...",
              ajax: {
                url: '<?=site_url('Main/getKota')?>',
                dataType: 'json',
                processResults: function (data) {
                  return {
                    results: data
                  };
                },
                cache: false,
              }
            });
            $('#sel_kota').on('select2:select', function(event) {
              $("#idkab").val(event.params.data.id);
              $("#namekab").val(event.params.data.text);
            });
            $('#sel_kota').on('change.select2', function(event) {
              $("#idkab").val("");
              $("#namekab").val("");
              $("#sel_kec").val(null).trigger('change');
            });
            $('#sel_kec').select2({
              placeholder: "Silakan Pilih Kecamatan",
              ajax: {
                url: '<?=site_url('Main/getKec')?>',
                dataType: 'json',
                data: function (params) {
                  return {
                    idkab: $("#idkab").val()
                  };
                },
                processResults: function (data) {
                  return {
                    results: data
                  };
                },
                cache: false,
              }
            });
            $('#sel_kec').on('select2:select', function(event) {
              $("#idkec").val(event.params.data.id);
              $("#namekec").val(event.params.data.text);
            });
            $('#sel_kec').on('change.select2', function(event) {
              $("#idkec").val("");
              $("#namekec").val("");
              $("#sel_desa").val(null).trigger('change');
            });
            $('#sel_desa').select2({
              placeholder: "Pilih Kelurahan",
              ajax: {
                url: '<?=site_url('Main/getDesa')?>',
                dataType: 'json',
                data: function (params) {
                  return {
                    idkec: $("#idkec").val()
                  };
                },
                processResults: function (data) {
                  return {
                    results: data
                  };
                },
                cache: false,
              }
            });
            $('#sel_desa').on('select2:select', function(event) {
              $("#iddesa").val(event.params.data.id);
              $("#namedesa").val(event.params.data.text);
            });
            $('#sel_desa').on('change.select2', function(event) {
              $("#iddesa").val("");
              $("#namedesa").val("");
            });
            $("#datakontak").dataTable();
            $().ready(function() {
              $sidebar = $('.sidebar');

              $sidebar_img_container = $sidebar.find('.sidebar-background');

              $full_page = $('.full-page');

              $sidebar_responsive = $('body > .navbar-collapse');

              window_width = $(window).width();

              fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

              if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                  $('.fixed-plugin .dropdown').addClass('open');
                }

              }

              $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

              $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                  $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                  $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                  $sidebar_responsive.attr('data-color', new_color);
                }
              });

              $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                  $sidebar.attr('data-background-color', new_color);
                }
              });

              $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                  $sidebar_img_container.fadeOut('fast', function() {
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $sidebar_img_container.fadeIn('fast');
                  });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                  $full_page_background.fadeOut('fast', function() {
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    $full_page_background.fadeIn('fast');
                  });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                  var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                  $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
              });

              $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                  if ($sidebar_img_container.length != 0) {
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image', '#');
                  }

                  if ($full_page_background.length != 0) {
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image', '#');
                  }

                  background_image = true;
                } else {
                  if ($sidebar_img_container.length != 0) {
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                  }

                  if ($full_page_background.length != 0) {
                    $full_page.removeAttr('data-image', '#');
                    $full_page_background.fadeOut('fast');
                  }

                  background_image = false;
                }
              });

              $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                  $('body').removeClass('sidebar-mini');
                  md.misc.sidebar_mini_active = false;

                  $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                  $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                  setTimeout(function() {
                    $('body').addClass('sidebar-mini');

                    md.misc.sidebar_mini_active = true;
                  }, 300);
                }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
            });
});
</script>
<?php } ?>
</body>

</html>
