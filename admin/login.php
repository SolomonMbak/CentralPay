<?php
session_start();
include('../app/conn.inc.php');
$msg_mail="";
// $_SESSION['email']= $sessionEmail;  // Initializing Session with value of PHP Variable

if (isset($_POST["btn_login"])) {
	
	$stmt = $conn->prepare("SELECT admin_email, admin_status, admin_password FROM master_admin_info WHERE (admin_email = ? AND admin_status = ?) AND admin_password = ? ");
    $stmt->bind_param("sss", $inputEmail, $adminStatus, $inputPassword);
          
        $inputEmail = mres($conn,$_POST['inputLogin']);
        $adminStatus = 'Active';
        $inputPassword = mres($conn,$_POST['inputPassword']);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows < 1){
        $msg_mail='
            <div id="Login-alert" class="alert alert-danger" col-sm-12">Invalid Login Credentials. Please try again.</div>';
    }else{
            $_SESSION["email"] = $inputEmail;
            header("Location: dashboard.php");
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - CentralPay</title>
        <link href="../styles/css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                    <?php echo $msg_mail;  ?>

                                        <form id="login_form" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputLogin" name="inputLogin" type="email" placeholder="Input your Email Address" required />
                                                <label for="inputLogin">Email Address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Forgot Password?</a>
                                                <input type="submit" name="btn_login" id="btn_login" class="btn btn-primary btn-block" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Sign Up!</a> | <a href="register.php">Contact Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <script>document.write(new Date().getFullYear())</script> | Powered by: GOJEMS</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../styles/js/scripts.js"></script>
    </body>
</html>
