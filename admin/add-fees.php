<title>Fees - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');
$msg_mail = "";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Fees</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Fees</li>
            </ol>
            <hr>
            <br>
        </div>

        <?php
        if (isset($_POST["btn_fees"])) {

            $stmt = $conn->prepare("SELECT fee_department, fee_category FROM master_fees WHERE fee_department = ? AND fee_category = ?");
            $stmt->bind_param("ss", $inputDepartment, $inputFeeCategory);

            $inputDepartment = mres($conn, $_POST['inputDepartment']);
            $inputFeeCategory = mres($conn, $_POST['inputFeeCategory']);

            $stmt->execute();
            $result = $stmt->get_result();
            // $data = $result->fetch_assoc();

            if ($result->num_rows > 0) {
                $msg_mail = '
            <div id="Login-alert" class="alert alert-danger" col-sm-12">It seems you already have fees within this categogy and deparment. Please scroll down to review them.</div>';
            } else {

                $stmt = $conn->prepare("INSERT INTO master_fees (fee_department, fee_category, fee_level, fee_amount, fee_lateness_charge, fee_status, fee_added_date, fee_addedd_by) VALUES (?,?,?,?,?,?,?,?)");

                $stmt->bind_param('sssissss', $inputDepartment, $inputFeeCategory, $inputLevel, $inputFeeAmount, $inputLatenessFee, $inputFeeStatus, $inputAddedDate, $inputAddedBy);

                $inputDepartment = mres($conn, $_POST['inputDepartment']);
                $inputFeeCategory = mres($conn, $_POST['inputFeeCategory']);
                $inputLevel = mres($conn, $_POST['inputLevel']);
                $inputFeeAmount = mres($conn, $_POST['inputFeeAmount']);
                $inputLatenessFee = mres($conn, $_POST['inputLatenessFee']);
                $inputFeeStatus = mres($conn, $_POST['inputFeeStatus']);
                $inputAddedDate = mres($conn, '');
                $inputAddedBy = mres($conn, $sessionEmail);

                $stmt->execute();

                $msg_mail = '
            <div id="Login-alert" class="alert alert-success" col-sm-12">Fee Addedd Successfuly. Scroll Down to see the fee you have just added.</div>';
            }
            $stmt->close();
        }
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light">Add Fees</h3>
                        </div>
                        <div class="card-body">
                            <?php echo $msg_mail; ?>
                            <form id="signup_form" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-select" id="inputFeeCategory" name="inputFeeCategory" aria-label="Fee Category" required>
                                                <option disabled selected>Fee Category</option>
                                                <option value="School Fees">School Fees</option>
                                                <option value="Faculty Dues">Faculty Dues</option>
                                                <option value="Departmental Dues">Departmental Dues</option>
                                                <option value="Medical Dues">Medical Dues</option>
                                            </select>
                                            <label for="inputFirstName">Fee Category</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLatenessDate" name="inputLatenessDate" type="date" placeholder="Date Before Lateness" required />
                                            <label for="inputAmount">Date Before Lateness</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-select" id="inputDepartment" name="inputDepartment" aria-label="Level" required>
                                                <option disabled selected>Department</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Mathematic and Statistics">Mathematic and Statistics</option>
                                            </select>
                                            <label for="inputFirstName">Department</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="inputLevel" name="inputLevel" aria-label="Level" required>
                                                <option disabled selected>Level</option>
                                                <option value="100 Level">100 Level</option>
                                                <option value="200 Level">200 Level</option>
                                                <option value="300 Level">300 Level</option>
                                                <option value="400 Level">400 Level</option>
                                                <option value="500 Level">500 Level</option>
                                                <option value="Spill Over 1">Spill Over 1</option>
                                                <option value="Spill Over 2">Spill Over 2</option>
                                                <option value="Spill Over 3">Spill Over 3</option>
                                            </select>
                                            <label for="inputLevel">Level</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFeeAmount" name="inputFeeAmount" type="number" placeholder="Amount" required />
                                            <label for="inputFeeAmount">Amount</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLatenessFee" name="inputLatenessFee" type="number" placeholder="Lateness Charge" value="0" required />
                                            <label for="inputLatenessFee">Lateness Charge</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="inputFeeStatus" name="inputFeeStatus" type="text" value="Open" hidden />
                                        <!-- <input id="inputFeeStatus" name="inputFeeStatus" type="text" value="Open" hidden /> -->
                                    </div>
                                </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <input type="submit" name="btn_fees" id="btn_fees" class="btn btn-success btn-block" value="Add Fee"> <br>
                                <a href="view-fees.php" type="button" name="btn_fees" id="btn_fees" class="btn btn-primary btn-block">Veiw Added Fee</a>
                            </div>
                        </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include('widgets/footer.php');
    ?>