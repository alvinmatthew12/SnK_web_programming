
<!DOCTYPE html>
<html>
<head>
  <title>Senpai Kouhai</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="pic/uib-logo/uib-toplogo.png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="assets/css/black-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-12 text-left">
                <h5 class="card-category">Add</h5>
                <h2 class="card-title">Subject</h2>
              </div>




          
          <div class="card-body">
            
               <form action="proses-crud.php" method="POST">
                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label for="nik">Kode Subject</label>
                        <input type="text" class="form-control" placeholder="NPM" name="kd_subject">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label for="nama">Subject</label>
                        <input type="text" class="form-control" placeholder="Name" name="subject">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                      <div class="col-md-11 pr-md-1">
                        <div class="form-group">
                          <label for="program_studi">Study Program</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="program_studi">
                            <option class="text-info" value="31">Information System</option>
                            <option class="text-info" value="41">Accounting</option>
                            <option class="text-info" value="51">Law Science</option>
                            <option class="text-info" value="42">Management</option>
                            <option class="text-info" value="11">Civil Engineer</option>
                            <option class="text-info" value="21">Electronic Engineer</option>
                            <option class="text-info" value="61">English Education</option>
                            <option class="text-info" value="43">Tourism</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-11 pr-md-1">
                        <div class="form-group">
                          <label for="position">Semester</label>
                          <input type="text" class="form-control" placeholder="e.g. = 3" name="semester">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label for="position">Lecture</label>                        
                        <select class="form-control" id="exampleFormControlSelect1" name="nik_dosen">
                          <?php 

                          $id = $_GET['id'];

                          $sql1 = "SELECT nik, CONCAT(nik, ' - ', nama) AS nama_dosen FROM tb_dosen WHERE kd_prodi = '$prodi'";

                          $query1 = mysqli_query($db,$sql1);
                          while ($sbj1 = mysqli_fetch_array($query1)) {
                            echo "<option class='text-info' value='".$sbj1['nik']."'>".$sbj1['nama_dosen']."</option>";

                          }

                           ?>
                        </select>
                      </div>
                    </div>



                  </div>
                <div class="card-footer">
                  <input type="submit" onclick="demo.showNotification('top','center')" class="btn btn-fill btn-primary" value="Add" name="addmahasiswa"></input>
                  <a href="index.php" class="btn btn-fill btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






      <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <script>
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');
          $navbar = $('.navbar');
          $main_panel = $('.main-panel');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');
          sidebar_mini_active = true;
          white_color = false;

          window_width = $(window).width();

          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



          $('.fixed-plugin a').click(function(event) {
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $('.fixed-plugin .background-color span').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data', new_color);
            }

            if ($main_panel.length != 0) {
              $main_panel.attr('data', new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data', new_color);
            }
          });

          $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              sidebar_mini_active = false;
              blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
            } else {
              $('body').addClass('sidebar-mini');
              sidebar_mini_active = true;
              blackDashboard.showSidebarMessage('Sidebar mini activated...');
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

          $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (white_color == true) {

              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').removeClass('white-content');
              }, 900);
              white_color = false;
            } else {

              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').addClass('white-content');
              }, 900);

              white_color = true;
            }


          });

          $('.light-badge').click(function() {
            $('body').addClass('white-content');
          });

          $('.dark-badge').click(function() {
            $('body').removeClass('white-content');
          });
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

      });
    </script>
    <script type="text/javascript">
      function movepage(choose){
        if (choose == "1"){
          window.location.assign("index.php")
        }
        else if (choose == "2"){
          window.location.assign("mahasiswa.php")
        }
        else if (choose == "3"){
          window.location.assign("subject.php")
        }
        else if (choose == "4"){
          window.location.assign("addlecturer.php")
        }
           
      }
    </script>
</body>
</html>