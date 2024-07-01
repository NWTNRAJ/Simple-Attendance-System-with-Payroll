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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
            <h1 class="m-0 text-dark">Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.employee_id = emp_list.emp_card AND emp_list.sched_id = emp_sched.sched_id";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                  if($row['attendance_timein'] <= $row['sched_in']) {
                ?>
                <tr>
                  <td><?php echo $row['attendance_date']; ?></td>
                  <td><?php echo $row['employee_id']; ?></td>
                  <td><?php echo $row['employee_name']; ?></td>
                  <td><?php echo $row['attendance_timein']; ?> <span class="float-right badge bg-success">On Time</span></td>
                  <td><?php echo $row['attendance_timeout']; ?></td>
                </tr>
                <?php
                  }
                  else {
                ?>
                <tr>
                  <td><?php echo $row['attendance_date']; ?></td>
                  <td><?php echo $row['employee_id']; ?></td>
                  <td><?php echo $row['employee_name']; ?></td>
                  <td><?php echo $row['attendance_timein']; ?> <span class="float-right badge bg-warning">Late</span></td>
                  <td><?php echo $row['attendance_timeout']; ?></td>
                </tr>
                <?php
                  }
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
