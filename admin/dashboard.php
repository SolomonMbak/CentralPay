<title>Dashboard - CentralPay</title>
<?php
include('widgets/header.php');
include('widgets/sidebar.php');
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
                                <div class="card bg-primary text-white mb-4">
                                        <b><div class="card-body">Tuition fee</div></b>
                                    <center><h2>20,000,000</h2></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tuition-fee.php">Pay Now</a>
                                        <div class="small text-white">Unpaid</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <b><div class="card-body">Faculty Dues</div></b>
                                    <center><h2>20,000,000</h2></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Pay Now</a>
                                        <div class="small text-white">Unpaid</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <b><div class="card-body">Departmental Dues</div></b>
                                    <center><h2>20,000,000</h2></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Pay Now</a>
                                        <div class="small text-white">Unpaid</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <b><div class="card-body">Other Fees</div></b>
                                    <center><h2>20,000,000</h2></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Pay Now</a>
                                        <div class="small text-white">Unpaid</div>
                                    </div>
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
                </main>
               
<?php
include('widgets/footer.php');
?>