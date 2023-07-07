<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>
                            <div class="sb-sidenav-menu-heading">Logs</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Payments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="fees.php">Fees</a>
                                    <a class="nav-link" href="paymenthistory.php">Activity History</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Profile</div>
                            <a class="nav-link" href="profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-profile-alt"></i></div>User Profile</a>                     
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                        $stmt = $conn->prepare("SELECT admin_fname FROM master_admin_info WHERE admin_email = ?");
                        $stmt->bind_param("s", $inputEmail);
                            $inputEmail = mres($conn,$_SESSION['email']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        while ($row = $result->fetch_assoc()) {
                            echo $row['admin_fname'];
                        }
                        $stmt->close();
                        ?>
                    </div>
                </nav>
            </div>



            