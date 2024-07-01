<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR | Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include("header.php");
  ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include"topbar.php"; ?>
<?php include"sidebar.php"; ?>

  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $sql0 = "SELECT count(emp_id) As 'Total' FROM emp_list";
                $result0 = mysqli_query($db, $sql0);
                $row0 = mysqli_fetch_array($result0);
                $num0 = $row0['Total'];
                ?>
                <h3><?php echo $num0; ?></h3>

                <p>Employee / Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="employee_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $sql1 = "SELECT count(pos_id) As 'Pos' FROM emp_position";
                $result1 = mysqli_query($db, $sql1);
                $row1 = mysqli_fetch_array($result1);
                $num1 = $row1['Pos'];
                ?>
                <h3><?php echo $num1; ?></h3>

                <p>Total Positions</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="employee_positions.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $sql2 = "SELECT count(*) As 'Ontime' FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.attendance_timein <= emp_sched.sched_in AND emp_attendance.employee_id = emp_list.emp_card AND emp_sched.sched_id = emp_list.sched_id AND emp_attendance.attendance_date = CURDATE(); ";
                $result2 = mysqli_query($db, $sql2);
                $row2 = mysqli_fetch_array($result2);
                ?>
                <h3><?php echo $row2['Ontime']; ?></h3>

                <p>On Time Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="employee_attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $sql3 = "SELECT count(*) As 'Late' FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.attendance_timein > emp_sched.sched_in AND emp_attendance.employee_id = emp_list.emp_card AND emp_sched.sched_id = emp_list.sched_id AND emp_attendance.attendance_date = CURDATE(); ";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_array($result3);
                ?>
                <h3><?php echo $row3['Late']; ?></h3>
                <p>Late Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="employee_attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>

        <div class="row">
          <section class="col-lg-5 connectedSortable">


          </section>
        </div>

      </div>
    </section>

  </div>

</div>

<?php
include("footer.php");
?>
</body>
</html>
