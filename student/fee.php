<?php
session_start();
ob_start();
if(!isset($_SESSION['student_username'])){
  header("Location: 404.php");
}else{
    echo $student_username_session = $_SESSION['student_username'];
}
?>
<?php include "../includes/db.php"; ?>
<?php
$query_student_detail = "SELECT * FROM `student` WHERE `student`.`student_roll` = '$student_username_session'";
$select_student_detail = mysqli_query($connection,$query_student_detail);
                    $student_detail = mysqli_fetch_assoc($select_student_detail);
                    $student_id = $student_detail['student_id'];
                    $student_name = $student_detail['student_name'];
                    $student_img = $student_detail['student_img'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fee | ECI </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">




<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>


  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
      <img src="../images/Logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Edu Crafters Institute</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php if(isset($student_img)){echo $student_img;}else {echo '../upload/user.jpg';} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php if(isset($student_name)){echo $student_name;} ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher" style='font-size:21px'></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="results.php" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher" style='font-size:21px'></i>
              <p>
                Result / Performance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="attendance.php" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher" style='font-size:21px'></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-chalkboard-teacher" style='font-size:21px'></i>
              <p>
                Fees Details
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="work_assigned.php" class="nav-link">
              <i class="nav-icon fas fa-chart-bar" style='font-size:21px'></i>
              <p>
                Work Assigned
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tt.php" class="nav-link">
                <i class="nav-icon fas fa-edit" style='font-size:21px'></i>
              <p>
                Time Table
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reference_book.php" class="nav-link">
              <i class="nav-icon fas fa-tasks" style='font-size:20px'></i>
              <p>
                Reference Book
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="prev_ques_paper.php" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check" style='font-size:23px'></i>
              <p>
                Previous Questions Papers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../login.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt" style='font-size:22px'></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fee</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="">

        <?php
        
            $query_student_detail = "SELECT * FROM `student` WHERE `student`.`student_roll` = '$student_username_session'";
            $select_student_detail = mysqli_query($connection,$query_student_detail);
            while($student_detail = mysqli_fetch_assoc($select_student_detail)){
                $student_id = $student_detail['student_id'];
                $student_std = $student_detail['student_std'];
                $student_board = $student_detail['student_board'];
            }
            $query_student_fee_detail = "SELECT * FROM `fee` WHERE `fee`.`student_id`=$student_id";
            $select_student_fee_detail = mysqli_query($connection,$query_student_fee_detail);
            while($student_fee_detail = mysqli_fetch_assoc($select_student_fee_detail)){
                $fee_id = $student_fee_detail['fee_id'];
                $student_id = $student_fee_detail['student_id'];
                $amount = $student_fee_detail['amount'];
                $mode = $student_fee_detail['mode'];
                $date = $student_fee_detail['date'];
                $refer = $student_fee_detail['refer'];
                $fee_destribution = $student_fee_detail['fee_destribution'];
                $installments = $student_fee_detail['installments'];

                if($mode == 'Online Transfer'){
                  $msg = "Transfer ID: ";
                }elseif ($mode == 'Check') {
                  $msg = "Check Number: ";
                }else{
                  $msg="";
                }

                if($fee_destribution == 'Fully Paid'){
                  echo"<div class='callout callout-success'>";
                  echo"<h5>Fully Paid: Rs. $amount</h5>";

                  echo"<p>Paid On: $date through $mode by $msg $refer </p>";
                  echo"</div>";
                }elseif ($fee_destribution == 'Two installments') {
                  echo"<div class='callout callout-success'>";
                  echo"<h5>Two Installments of $installments Paid: Rs. $amount</h5>";

                  echo"<p>Paid On: $date through $mode by $msg $refer </p>";
                  echo"</div>";
                }elseif ($fee_destribution == 'Three installments') {
                  echo"<div class='callout callout-success'>";
                  echo"<h5>Three Installments of $installments Paid: Rs. $amount</h5>";

                  echo"<p>Paid On: $date through $mode by $msg $refer </p>";
                  echo"</div>";
                }else{
                  echo"<div class='callout callout-success'>";
                  echo"<h5>No Record</h5>";

                  echo"<p></p>";
                  echo"</div>";
                }
                

            }
        
        ?>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
 <script type="text/javascript">
     //Near checkboxes
      $(document).ready(function(){
        $("#selectAllPresent").click(function(event){
          if(this.checked){
            $('.checkBoxes').each(function(){
              this.checked = true;
            });
          }else{
            $('.checkBoxes').each(function(){
              this.checked = false;
            });
          }
        });
      });
  </script>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>