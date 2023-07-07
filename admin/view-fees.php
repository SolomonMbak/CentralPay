<?php
include('widgets/header.php');
include('widgets/sidebar.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View Fees</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Fees</li>
            </ol>
            <hr>
            <br>
            <div class="container">
                <div class="form-control justify-content-center">
                    <div class="">


                        <table class="bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Fee Category</th>
                                    <th>Level</th>
                                    <th>Amount</th>
                                    <th>Late Payment Fee</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php
                            $stmt = $conn->prepare("SELECT fee_department, fee_category, fee_level, fee_amount, fee_lateness_charge, fee_status, fee_added_date, fee_status FROM master_fees");
                            // $stmt->bind_param("ss", $inputDepartment, $inputFeeCategory);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) {
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<td>' . $row['fee_department'] . "</td>
                                     <td>" . $row['fee_category'] . "</td>
                                     <td>" . $row['fee_level'] . "</td>
                                     <td>" . $row['fee_amount'] . "</td>
                                     <td>" . $row['fee_lateness_charge'] . "</td>
                                     <td>" . $row['fee_status'] . "</td>
                                     <td>";
                                echo '</tr>';
                                echo '</tbody>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <center>
        <div class="mt-4 mb-0 col-lg-7">
            <div class="d-grid">
                <a href="add-fees.php" type="button" name="btn_fees" id="btn_fees" class="btn btn-primary btn-block">Add Fees</a>
            </div>
        </div>
    </center>
    <?php
    include('widgets/footer.php');
    ?>