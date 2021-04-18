<?php
include 'partials/client-header.php';
?>
      <!-- End Navbar -->
      <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Bookings</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="complaintstatus">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Booking ID</th>
                                                <th>Check IN</th>
                                                <th>Checkout Out</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT `B_ID`, `B_CHECK_IN_DATE`, `B_CHECK_OUT_DATE` FROM `bookings` WHERE C_ID='$cid'";
                                            $result = mysqli_query($conn, $sql);
                                            $i=1;
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <th><?php echo $i;?></th>
                                                    <td><?php echo $data['B_ID'] ?></td>
                                                    <td><?php echo $data['B_CHECK_IN_DATE'] ?></td>
                                                    <td><?php echo $data['B_CHECK_OUT_DATE'] ?></td>
                                                    <td><a href="bookingdetails.php?bid=<?php echo $data['B_ID']?>" class="btn btn-primary">View Details</a></td>
                                                </tr>
                                            <?php 
                                            $i++;
                                        } ?>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">
                                    </ul>
                                </div>
                                <!-- Table component end -->
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
    </div>
  </div>
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

</html>