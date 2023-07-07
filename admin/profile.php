<title>Profile - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');


$stmt = $conn->prepare("SELECT admin_fname, admin_oname, admin_email, admin_phone, admin_gender FROM master_admin_info WHERE admin_email = ?");
$stmt->bind_param("s", $inputEmail);
$inputEmail = mres($conn, $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $row['admin_fname'];

  $inputFirstName = $row['admin_fname'];
  $inputOtherNames = $row['admin_oname'];
  $inputEmail = $row['admin_email'];
  $inputNumber = $row['admin_phone'];
  $inputGender = $row['admin_gender'];
}
$stmt->close();
?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">User Profile</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li> <li class="breadcrumb-item active">Profile</li>
      </ol>
      <hr>
      <br>
      <div class="container">
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                      <h1><?php echo ucfirst($inputFirstName) . " " . ucfirst($inputOtherNames); ?></h1>
                      <p class="text-secondary mb-1">ADMIN</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email Address: </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $inputEmail; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $inputNumber; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $inputGender; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
include('widgets/footer.php');
?>