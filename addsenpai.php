<?php include("config.php"); 

session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
  }

  $type_id = $_SESSION['type_id'] ;

  $id = $_SESSION['id'];

$sql = "SELECT kd_prodi FROM tb_dosen WHERE nik = '$id'";
$query = mysqli_query($db, $sql);

while ($kd_prodi = mysqli_fetch_array($query)) {
  $prodi = $kd_prodi['kd_prodi'];
}


?>


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
	<div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            UIB
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Senpai Kouhai
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="./home.php">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./sentreport.php">
              <i class="tim-icons icon-send"></i>
              <p>Sent Report</p>
            </a>
          </li>
          <li>
            <a href="./received.php">
              <i class="tim-icons icon-email-85"></i>
              <p>Received Message</p>
            </a>
          </li>
          <li class="active">
            <?php 
            if ($type_id == 1) {
              echo "<a href='./managesenpai.php'>
              <i class='tim-icons icon-atom'></i>
              <p>Manage</p></a>";
            }
            if ($type_id == 2) {

            }
            if ($type_id == 3) {
              echo "<a href='./manage.php'>
              <i class='tim-icons icon-atom'></i>
              <p>Manage</p></a>";
            }


             ?>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">MANAGE</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link">
                  

                    <?php 

                      $sql1 = "SELECT subject FROM tb_surat WHERE receiver = '$id' OR receiver = '$prodi' OR receiver = 'all' ORDER BY sent_date DESC LIMIT 5 ";

                      $query1 = mysqli_query($db, $sql1);

                      while($notif = mysqli_fetch_array($query1)){

                        echo "<a href='./received.php' class='nav-item dropdown-item'> ".$notif['subject']." </a>";
                      }



                     ?>




                  </li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="pic/Avatar/avatar.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <a href="logout.php" class="d-lg-none"> 
                    Log out
                  </a>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="./home.php" class="nav-item dropdown-item"><?php echo $id; ?></a>
                  </li>
                  <li class="nav-link">
                    <a href="./usersetting.php" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="logout.php" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="content">
        <div class="row">

          <div class="col-md-8">
            <div class="card ">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Lists</h5>
                    <h2 class="card-title">Senpai</h2>
                  </div>
                  <div class="col-sm-6">
                    <?php 
                    if ($type_id == 3) {
                    ?>
                      <div class='btn-group btn-group-toggle float-right' data-toggle='buttons'>
                        <label class='btn btn-sm btn-primary btn-simple' id='0' onclick="javascript:movepage('1')">
                          <input type='radio' name='options' checked>
                          <span class='d-none d-sm-block d-md-block d-lg-block d-xl-block'>Lecturer</span>
                          <span class='d-block d-sm-none'>
                            <i class='tim-icons icon-single-02'></i>
                          </span>
                        </label>
                        <label class='btn btn-sm btn-primary btn-simple active' id='1' onclick="javascript:movepage('2')">
                          <input type='radio' class='d-none d-sm-none' name='options'>
                          <span class='d-none d-sm-block d-md-block d-lg-block d-xl-block'>Senpai</span>
                          <span class='d-block d-sm-none'>
                            <i class='tim-icons icon-gift-2'></i>
                          </span>
                        </label>
                        <label class='btn btn-sm btn-primary btn-simple' id='2' onclick="javascript:movepage('3')">
                          <input type='radio' class='d-none' name='options'>
                          <span class='d-none d-sm-block d-md-block d-lg-block d-xl-block'>Kouhai</span>
                          <span class='d-block d-sm-none'>
                            <i class='tim-icons icon-tap-02'></i>
                          </span>
                        </label>
                      </div>
                    <?php
                    } 

                    if ($type_id == 1) {
                    ?>
                      <div class='btn-group btn-group-toggle float-right' data-toggle='buttons'>
                        <label class='btn btn-sm btn-primary btn-simple active' id='1' onclick="javascript:movepage('2')">
                          <input type='radio' class='d-none d-sm-none' name='options'>
                          <span class='d-none d-sm-block d-md-block d-lg-block d-xl-block'>Senpai</span>
                          <span class='d-block d-sm-none'>
                            <i class='tim-icons icon-gift-2'></i>
                          </span>
                        </label>
                        <label class='btn btn-sm btn-primary btn-simple' id='2' onclick="javascript:movepage('3')">
                          <input type='radio' class='d-none' name='options'>
                          <span class='d-none d-sm-block d-md-block d-lg-block d-xl-block'>Kouhai</span>
                          <span class='d-block d-sm-none'>
                            <i class='tim-icons icon-tap-02'></i>
                          </span>
                        </label>
                      </div>
                    <?php
                    }



                     ?>
                  </div>
                  <div class="col-md-12">
                    <div class="float-right">
                      <div class="form-inline ml-auto">
                          <div class="form-group no-border">
                            <input type="text" class="form-control" placeholder="Search">
                          </div>
                          <button type="submit" class="btn btn-info btn-link btn-icon btn-sm">
                              <i class="tim-icons icon-zoom-split"></i>
                          </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          NPM
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Study Program
                        </th>
                        <th class="text-center">
                        Semester
                        </th>
                      </tr>
                    </thead>
                    <tbody>
      
       
                      <?php 
                      if ($type_id == 3) {
                        $sql = "SELECT tb_senpai.npm, tb_senpai.nama,tb_senpai.semester ,tb_prodi.nama_prodi FROM tb_prodi INNER JOIN tb_senpai ON tb_prodi.kd_prodi = tb_senpai.kd_prodi ";

                        $query = mysqli_query($db,$sql);

                        while ($senpai = mysqli_fetch_array($query)) {
                          echo "<tr>";
                          echo "<td>" .$senpai['npm']."</td>";
                          echo "<td>" .$senpai['nama']."</td>";
                          echo "<td>" .$senpai['nama_prodi']."</td>";
                          echo "<td class='text-center'>" .$senpai['semester']."</td>";
                          echo "</tr>";
                        }

                      }

                      else if ($type_id == 1) {
                        $sql = "SELECT tb_senpai.npm, tb_senpai.nama,tb_senpai.semester ,tb_prodi.nama_prodi FROM tb_prodi INNER JOIN tb_senpai ON tb_prodi.kd_prodi = tb_senpai.kd_prodi WHERE tb_senpai.kd_prodi = '$prodi' ";

                        $query = mysqli_query($db,$sql);

                        while ($senpai = mysqli_fetch_array($query)) {
                          echo "<tr>";
                          echo "<td>" .$senpai['npm']."</td>";
                          echo "<td>" .$senpai['nama']."</td>";
                          echo "<td>" .$senpai['nama_prodi']."</td>";
                          echo "<td class='text-center'>" .$senpai['semester']."</td>";
                          echo "</tr>";
                        }

                      }
                      
                      
                       ?>




                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>




          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Add New</h5>
                    <h2 class="card-title">Senpai</h2>
                  </div>
                </div>
              </div>

              
              <div class="card-body">


                <form action="proses-crud.php" method="POST">
                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label>NPM</label>
                        <input type="text" class="form-control" placeholder="NPM" value="" name="npm">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="" name="nama">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Study Program</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="program_studi">

                        <?php if ($type_id == 1) {
                          $sql = "SELECT * FROM tb_prodi WHERE kd_prodi = '$prodi'";
                          $query = mysqli_query($db, $sql);

                          while ($exec = mysqli_fetch_array($query)) {
                            $nama_prodi = $exec['nama_prodi'];
                            echo "<option class='text-info' value='$prodi'>$nama_prodi</option>";
                          }

                        } ?>
                        
                        <?php if ($type_id == 3) {  
                        ?>
                          <option class="text-info" value="31">Information System</option>
                          <option class="text-info" value="41">Accounting</option>
                          <option class="text-info" value="51">Law Science</option>
                          <option class="text-info" value="42">Management</option>
                          <option class="text-info" value="11">Civil Engineer</option>
                          <option class="text-info" value="21">Electronic Engineer</option>
                          <option class="text-info" value="61">English Education</option>
                          <option class="text-info" value="43">Tourism</option>
                        <?php } ?>

                        
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" placeholder="e.g. = 3" name="semester">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="username">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 pr-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                      </div>
                    </div>
                  </div>
                </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-fill btn-primary" value="Add" name="addsenpai"></input>
                <a href="managesenpai.php" class="btn btn-fill btn-secondary">Cancel</a>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> All rights reserved. Designed by 
            <a href="https://www.instagram.com/blackcurrantt_/">Alvin Matthew</a>
          </div>
        </div>
      </footer>
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
          window.location.assign("manage.php")
        }
        else if (choose == "2"){
          window.location.assign("managesenpai.php")
        }
        else if (choose == "3"){
          window.location.assign("managekouhai.php")
        }
           
      }
    </script>
</body>
</html>