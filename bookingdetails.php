<?php
include 'partials/client-header.php';
$bid=$_GET['bid'];
//echo $bid;
$sql="SELECT b.B_CHECK_IN_DATE,b.B_CHECK_OUT_DATE,b.NUM_OF_ADULT,b.NUM_OF_CHILD,b.ROOM_ID,P.PAYMENT_ID,P.PAYMENT_STATUS,p.PAYMENT_AMOUNT FROM `bookings` AS b INNER JOIN `payment` AS p ON b.B_ID=p.B_ID Where b.B_ID='$bid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">BOOKING SUMARY:</h5>
              </div>
              <div class="card-body">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>field name</th>
        <th>field value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Booking Id</td>
        <td><?php echo $bid;?></td>
      </tr>
      <tr>
        <td>Room Id</td>
        <td><?php echo $row['ROOM_ID'];?></td>
      </tr>
      <tr>
        <td>Check In Date</td>
        <td><?php echo $row['B_CHECK_IN_DATE'];?></td>
      </tr>
      <tr>
        <td>Check Out Date</td>
        <td><?php echo $row['B_CHECK_OUT_DATE'];?></td>
      </tr>
      <tr>
        <td>No of child</td>
        <td><?php echo $row['NUM_OF_CHILD'];?></td>
      </tr>
      <tr>
        <td>No of adult</td>
        <td><?php echo $row['NUM_OF_ADULT'];?></td>
      </tr>
      <tr>
        <td>Total Payment</td>
        <td><?php echo $row['PAYMENT_AMOUNT'];?></td>
      </tr>
      <tr>
        <td>Payment Id</td>
        <td><?php echo $row['PAYMENT_ID'];?></td>
      </tr>
      <tr>
        <td>Payment Status</td>
        <td><?php echo $row['PAYMENT_STATUS'];?></td>
      </tr>
    </tbody>
  </table>
              </div>
            </div>
          </div>
        </div>
      </div>v
                        
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="./assets/demo/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#complaintstatus').DataTable();
    });
  </script>
</body>

</html>v