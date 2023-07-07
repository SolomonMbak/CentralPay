<title>Dashboard - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');

// Get the user to determine their fees
$stmt = $conn->prepare("SELECT 	user_email, user_faculty, user_department, user_level, user_reg_number, user_state_of_origin FROM master_user_info WHERE user_email = ?");
$stmt->bind_param("s", $inputEmail);

$inputEmail = mres($conn, $sessionEmail);

$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows < 1) {
    echo 'No Outstanding Fees!';
} else {
    $row = $result->fetch_assoc();
    $user_email = $row['user_email'];
    $user_faculty = $row['user_faculty'];
    $user_department = $row['user_department'];
    $user_level = $row['user_level'];
    $user_reg_number = $row['user_reg_number'];
    $user_state_of_origin = $row['user_state_of_origin'];
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <hr>
            <br>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    

                        <?php
                        // Inner join the table that shows users that have paid
                        $stmt = $conn->prepare("SELECT fee_department, fee_category, fee_level, fee_amount, fee_lateness_date, fee_lateness_charge, fee_added_date, fee_status FROM master_fees WHERE fee_level = ?");
                        $stmt->bind_param("s", $user_level);

                        $stmt->execute();
                        $result = $stmt->get_result();

                        if($result->num_rows === 0) exit('No Outstanding Fees!');
                       
                        while($row = $result->fetch_assoc()) {
                            
                            // $row = $result->fetch_assoc();

                            $feeDepartment = $row['fee_department'];
                            $feeCategory = $row['fee_category'];
                            $feeLevel = $row['fee_level'];
                            $feeAmount = $row['fee_amount'];
                            $feeLatenessDate = $row['fee_lateness_date'];
                            $feeLatenessCharge = $row['fee_lateness_charge'];
                            $feeAddedDate = $row['fee_added_date'];
                            $feeStatus = $row['fee_status'];


                            // bring the card here
                            echo '<div class="card bg-secondary text-white mb-4">';
                            echo "<center> <b>";
                            echo '<div class="card-body">'. strtoupper($feeCategory) .'</div>
                            </b>
                            <h1> ₦'.number_format($feeAmount, 2, ".", ",") .'</h1>
                            <p>Deadline: ' . $feeLatenessDate . " - (Fee: ₦" . number_format($feeLatenessCharge, 2, ".", ",") . ')'. '</p>
                        </center>';
                        echo '<div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Pay Now</a>
                            <div class="small text-white">Unpaid</div>
                        </div> </div>';

                        }
                        $stmt->close();
                        ?>

                        
                    
                </div>
            </div>
         <!-- 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>

            </div> -->
        </div>
    </main>

    <?php
    include('widgets/footer.php');
    ?>