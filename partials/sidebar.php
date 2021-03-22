<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="../assets/img/logo-small.png">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="" class="simple-text logo-normal">
            <?php $email = $_SESSION['staff'];
            $sql = "SELECT * FROM staffs inner join staff_type on staffs.s_type_id=staff_type.s_type_id where s_e_mail='$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['s_f_name'] . " " . $row['s_l_name'];
            ?>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="../index.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="">
                <a href="./admin.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Admin Profile</p>
                </a>
            </li>
            <?php if ($_SESSION['staff_type_id'] == '1') { ?>
                <li class="">
                    <a href="./foodstaff.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Food Staff</p>
                    </a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['staff_type_id'] == '1') { ?>
                <li class="">
                    <a href="./roomstaff.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Room Staff</p>
                    </a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['staff_type_id'] == '1' || $_SESSION['staff_type_id'] == '3') { ?>
                <li class="">
                    <a href="./foodsection.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Food Section</p>
                    </a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['staff_type_id'] == '1'  || $_SESSION['staff_type_id'] == '2') { ?>
                <li class="">
                    <a href="./roomsection.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Room Section</p>
                    </a>
                </li>
            <?php } ?>
             <?php if ($_SESSION['staff_type_id'] == '9') { ?>
                <li class="">
                    <a href="./viewcomplaints.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>View Complaints</p>
                    </a>
                </li>
            <?php } ?>
            <li class="">
                <form action="" method="post">
                    <input type="submit" class="form-control" name="request" value="logout">
                </form>
            </li>
        </ul>
    </div>
</div>