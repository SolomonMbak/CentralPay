<title>User Activity - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Activity Logs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Activity Logs</li>
                        </ol>
                        <hr>
                        <br>
                        <div>
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
                        </div>
                    </div>
                </main>
               
<?php
include('widgets/footer.php');
?>