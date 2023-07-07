<title>Profile - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');


                        $stmt = $conn->prepare("SELECT user_first_name, user_other_names, user_email, user_phone, user_gender, user_program, user_faculty, user_department, user_level, user_reg_number, user_nationality, user_state_of_origin, user_dob, user_marital_status, user_password, user_status FROM master_user_info WHERE user_email = ?");
                        $stmt->bind_param("s", $inputEmail);
                            $inputEmail = mres($conn,$_SESSION['email']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        while ($row = $result->fetch_assoc()) {
                            $row['user_first_name'];

                            $inputFirstName = $row['user_first_name']; 
                            $inputOtherNames = $row['user_other_names']; 
                            $inputEmail = $row['user_email']; 
                            $inputNumber = $row['user_phone']; 
                            $inputGender = $row['user_gender']; 
                            $inputProgram = $row['user_program']; 
                            $inputFaculty = $row['user_faculty']; 
                            $inputDepartment = $row['user_department']; 
                            $inputLevel = $row['user_level']; 
                            $inputRegNumber = $row['user_reg_number']; 
                            $inputCountry = $row['user_nationality']; 
                            $inputState = $row['user_state_of_origin']; 
                            $inputDOB = $row['user_dob']; 
                            $inputMaritalStatus = $row['user_marital_status']; 
                            $inputPassword = $row['user_status'];
                        }
                        $stmt->close();
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Profile</li> | <li class="breadcrumb-item active">Profile</li>
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
                      <h2><?php echo ucfirst($inputFirstName) ." ". ucfirst($inputOtherNames); ?></h2>
                      <p class="text-secondary mb-1"><?php echo strtoupper($inputProgram) ." > ". strtoupper($inputLevel); ?></p>
                      <p class="text-secondary mb-1"><?php echo strtoupper($inputFaculty). " > " . strtoupper($inputDepartment); ?></p>
                      <p class="text-secondary mb-1"><?php echo strtoupper($inputRegNumber); ?></p>
                 

                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
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
                      <h6 class="mb-0">Nationality</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $inputCountry; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State of Origin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $inputState; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $inputDOB; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Marital Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucfirst($inputMaritalStatus); ?>
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>




















<!-- 

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                           
                        </div>
                    </div>
                </main> -->
               
<?php
include('widgets/footer.php');
?>