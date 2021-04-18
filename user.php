<?php
include 'partials/client-header.php';
?>
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="./assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="./assets/img/mike.jpg" alt="...">
                    <h5 class="title">Chet Faker</h5>
                  </a>
                  <p class="description">
                    @chetfaker
                  </p>
                </div>
                <p class="description text-center">
                  "I like the way you work it <br>
                  No diggity <br>
                  I wanna bag it up"
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>12<br><small>Files</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB<br><small>Used</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="row">

                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Type of Registration</label>
                        <select id="type_of_registration" name="type_of_registration" class="form-control custom-select bg-white border-left-0 border-md select-box">
                          <option value="">Enter Type Of Registration</option>
                          <option value="Student" <?php if ($row['c_type'] == "Student") {
                                                    echo "Selected";
                                                  } ?>>Student</option>
                          <option value="International" <?php if ($row['c_type'] == "International") {
                                                          echo "Selected";
                                                        } ?>>International</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['c_e_mail']; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label for="">Gender</label>
                        <select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md select-box">
                          <option value="">Enter Gender</option>
                          <option value="Male" <?php if ($row['c_gender'] == "Male") {
                                                  echo "Selected";
                                                } ?>>Male</option>
                          <option value="Female" <?php if ($row['c_gender'] == "Female") {
                                                    echo "Selected";
                                                  } ?>>Female</option>
                          <option value="Transgender" <?php if ($row['c_gender'] == "Transgender") {
                                                        echo "Selected";
                                                      } ?>>Transgender</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" placeholder="Company" value="<?php echo $row['c_f_name']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" placeholder="Last Name" value="<?php echo $row['c_l_name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>DOB </label>
                        <input type="text" class="form-control" value="<?php echo $row['c_dob']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Mobile </label>
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile No" value="<?php echo $row['c_mobile']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Nic </label>
                        <input type="text" name="nic" class="form-control" placeholder="NIC" value="<?php echo $row['c_nic']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Home Address" value="<?php echo $row['c_address']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $row['c_city']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $row['c_country']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" name="postal_code" class="form-control" value="<?php echo $row['c_postal_code']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" name="request" value="Update Profile" class="btn btn-primary btn-round">
                      <!-- <button type="submit"  class="btn btn-primary btn-round">Update Profile</button> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
  <script src="./assets/demo/demo.js"></script>
</body>

</html>