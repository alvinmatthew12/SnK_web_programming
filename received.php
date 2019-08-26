<?php include("config.php"); 

session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
  }

  $type_id = $_SESSION['type_id'] ;

  $id = $_SESSION['id'];

if ($type_id == 1) {
  $sql = "SELECT kd_prodi FROM tb_dosen WHERE nik = '$id'";
  $query = mysqli_query($db, $sql);

  while ($kd_prodi = mysqli_fetch_array($query)) {
    $prodi = $kd_prodi['kd_prodi'];
  }
}

else if ($type_id == 2) {
  $sql = "SELECT kd_prodi FROM tb_senpai WHERE npm = '$id'";
  $query = mysqli_query($db, $sql);

  while ($kd_prodi = mysqli_fetch_array($query)) {
    $prodi = $kd_prodi['kd_prodi'];
  }
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
          <li class="active">
            <a href="./received.php">
              <i class="tim-icons icon-email-85"></i>
              <p>Received Message</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="javascript:void(0)">RECEIVED MESSAGE</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
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

      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>


      <!-- content -->
      <div class="content"  style="width: 100%;">
        <div class="row"  style="width: 100%;">
        <!-- report -->
        <div class="row"  style="width: 100%;">
          <div class="col-lg-11 col-md-11"  style="width: 100%;">

            <div class="card" style="width: 100%;">

              <div class="card-header ">
                <h6 class="title d-inline">RECEIVED MESSAGE</h6>
                <div class="dropdown">
                </div>
              </div>

              <div class="card-body " style="width: 100%;">
                <div class="table-full-width table-responsive"  style="width: 100%;">

                  <table class="table table-hover"  style="width: 100%;">
                    <tbody>

                      <?php 

                        if ($type_id == 1) {


                          $sql = "SELECT tb_surat.* FROM tb_surat WHERE tb_surat.receiver = '$id' OR receiver = 'all' ORDER BY tb_surat.sent_date DESC";

                          $query = mysqli_query($db, $sql);

                          while ($report = mysqli_fetch_array($query)) {

                            $sql1 = "SELECT tb_senpai.nama FROM tb_surat INNER JOIN tb_senpai ON tb_surat.sender = tb_senpai.npm WHERE tb_surat.receiver = '$id' AND kd_surat = '".$report['kd_surat']."'";

                            $query1 = mysqli_query($db, $sql1);

                            while ($exec = mysqli_fetch_array($query1)) {
                              $nama_receiver = $exec['nama'];
                            }

                            echo "
                            <tr>
                            <td>
                              <p class='title'>".$report['subject']."</p>
                              <p class=''>".$report['message']."</p>";
                              if ($query1->num_rows > 0) {
                                echo "<p class='card-category d-inline'>From: ".$report['sender']." - ".$nama_receiver."";
                              } 
                              else{
                                echo "<p class='card-category d-inline'>From: ".$report['sender']."";
                              }

                            echo "</p>
                            </td>
                            <td class='td-actions text-center' style='width: 10%;'>
                              <p class='card-category d-inline'>".$report['sent_date']."</p>
                            </td>
                            <td class='td-actions text-center' style='width: 5%;>
                              <a href = ''></a>
                              <a href='replyreport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='reply' class='btn btn-info btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                              <i class='tim-icons icon-send'></i>
                              </button></a>
                              <a href = 'proses-deletereceivereport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='delete' class='btn btn-danger btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                                <i class='tim-icons icon-trash-simple'></i>
                              </button></a>
                            </td>
                          </tr>";
                          }
                        }




                        if ($type_id == 2) {


                          $sql = "SELECT tb_surat.* FROM tb_surat WHERE tb_surat.receiver = '$id' OR tb_surat.receiver = '$prodi' OR receiver = 'all' ORDER BY tb_surat.sent_date DESC";

                          $query = mysqli_query($db, $sql);

                          while ($report = mysqli_fetch_array($query)) {

                            $sql1 = "SELECT tb_dosen.nama FROM tb_surat INNER JOIN tb_dosen ON tb_surat.sender = tb_dosen.nik WHERE tb_surat.receiver = '$id' OR tb_surat.receiver = '$prodi' AND kd_surat = '".$report['kd_surat']."'";

                            $query1 = mysqli_query($db, $sql1);

                            while ($exec = mysqli_fetch_array($query1)) {
                              $nama_receiver = $exec['nama'];
                            }

                            $sql2 = "SELECT tb_dosen.nama FROM tb_surat INNER JOIN tb_dosen ON tb_surat.sender = tb_dosen.nik INNER JOIN tb_prodi ON tb_surat.receiver = tb_prodi.kd_prodi WHERE tb_surat.receiver = '$id' OR tb_surat.receiver = '$prodi' AND kd_surat = '".$report['kd_surat']."'";

                            $query2 = mysqli_query($db, $sql1);

                            while ($exec = mysqli_fetch_array($query2)) {
                              $nama_receiver = $exec['nama'];
                            }

                            
                            echo "
                            <tr>
                            <td>
                              <p class='title'>".$report['subject']."</p>
                              <p class=''>".$report['message']."</p>"; 

                              if ($query1->num_rows > 0) {
                                echo "<p class='card-category d-inline'>From: ".$nama_receiver."";
                              } else if ($query2->num_rows > 0) {
                                echo "<p class='card-category d-inline'>Announced by: ".$nama_receiver."";
                              } else{
                                echo "<p class='card-category d-inline'>From: ".$report['sender']."";
                              }

                            echo "</p>
                            </td>
                            <td class='td-actions text-center' style='width: 10%;'>
                              <p class='card-category d-inline'>".$report['sent_date']."</p>
                            </td>
                            <td class='td-actions text-center' style='width: 5%;>
                              <a href = ''></a>
                              <a href='replyreport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='reply' class='btn btn-info btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                              <i class='tim-icons icon-send'></i>
                              </button></a>
                              <a href = 'proses-deletereceivereport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='delete' class='btn btn-danger btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                                <i class='tim-icons icon-trash-simple'></i>
                              </button></a>
                            </td>
                          </tr>";
                          }
                        }





                        if ($type_id == 3) {

                          $sql = "SELECT tb_surat.* FROM tb_surat WHERE tb_surat.receiver = '$id' ORDER BY tb_surat.sent_date DESC";

                          $query = mysqli_query($db, $sql);

                          while ($report = mysqli_fetch_array($query)) {

                            $sql1 = "SELECT tb_dosen.nama FROM tb_surat INNER JOIN tb_dosen ON tb_surat.sender = tb_dosen.nik WHERE tb_surat.receiver = '$id' AND kd_surat = '".$report['kd_surat']."'";

                            $query1 = mysqli_query($db, $sql1);

                            while ($exec = mysqli_fetch_array($query1)) {
                              $namadosen_receiver = $exec['nama'];
                            }

                            $sql2 = "SELECT tb_senpai.nama FROM tb_surat INNER JOIN tb_senpai ON tb_surat.sender = tb_senpai.npm WHERE tb_surat.receiver = '$id' AND kd_surat = '".$report['kd_surat']."'";

                            $query2 = mysqli_query($db, $sql2);

                            while ($exec = mysqli_fetch_array($query2)) {
                              $namasenpai_receiver = $exec['nama'];
                            }
                            
                            echo "
                            <tr>
                            <td>
                              <p class='title'>".$report['subject']."</p>
                              <p class=''>".$report['message']."</p>"; 

                              if ($query1->num_rows > 0) {
                                echo "<p class='card-category d-inline'>From: ".$namadosen_receiver."";
                              }
                              else if ($query2->num_rows > 0) {
                                echo "<p class='card-category d-inline'>From: ".$report['sender']." - ".$namasenpai_receiver.""; 
                              }
                              else{
                                echo "<p class='card-category d-inline'>From: ".$report['sender']."";
                              }

                            echo "</p>
                            </td>
                            <td class='td-actions text-center' style='width: 10%;'>
                              <p class='card-category d-inline'>".$report['sent_date']."</p>
                            </td>
                            <td class='td-actions text-center' style='width: 5%;>
                              <a href = ''></a>
                              <a href='replyreport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='reply' class='btn btn-info btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                              <i class='tim-icons icon-send'></i>
                              </button></a>
                              <a href = 'proses-deletereceivereport.php?kd_surat=".$report['kd_surat']."'><button type='button' rel='tooltip' title='delete' class='btn btn-danger btn-link btn-icon btn-sm' data-original-title='Edit Task'>
                                <i class='tim-icons icon-trash-simple'></i>
                              </button></a>
                            </td>
                          </tr>";
                          }
                        }



                       ?>





                    </tbody>
                  </table>

                </div>
              </div>

            </div>

          </div>
        </div>
        
      </div>
    </div>







      <?php if (isset($_GET['status'])): ?>
        <?php 
          if ($_GET['status']=='deletesuccess') { ?>
            <div data-notify="container" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-check-2"></span>
            <span data-notify="title"></span> 
            <span data-notify="message">Delete <b>Message</b> Success</span><a href="#" target="_blank" data-notify="url"></a></div>
            
        <?php } ?>
           
        <?php 
          if ($_GET['status']=='deletefailed') { ?>
            <div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning alert-with-icon" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-alert-circle-exc"></span>
            <span data-notify="title"></span> 
            <span data-notify="message">Failed to Delete <b>Message</b></span><a href="#" target="_blank" data-notify="url"></a></div>
            
        <?php } ?>
          
      <?php endif; ?>






















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
</body>
</html>