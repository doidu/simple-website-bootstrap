<?php require 'mysqli_connect.php' ?>

<!DOCTYPE html>
<html lang="eng" class="h-100">

<head>
    <title>Website ni Valzado</title>
    <meta charset="utf-8">
    <link href="./bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="include.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    </style>
</head>


<body class="d-flex flex-column h-100">
    <div>
        <div class="container">
            <?php include('header.php'); ?>
            <?php include('nav.php'); ?>
            <div class="row mx-1 text-center justify-content-center">
                <?php
                $error = array();
                $fnameErr = $lnameErr = $emailErr = $pwordErr = '';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    if (empty($_POST['fname'])) {
                        $fnameErr = 'First Name is required';
                        $error[] = $fnameErr;
                    } else {
                        $fn = trim($_POST['fname']);
                    }
                    if (empty($_POST['lname'])) {
                        $lnameErr = 'Last Name is required';
                        $error[] = $lnameErr;
                    } else {
                        $ln = trim($_POST['lname']);
                    }
                    if (empty($_POST['email'])) {
                        $emailErr = 'Email Address is required';
                        $error[] = $emailErr;
                    } else {
                        $em = trim($_POST['email']);
                    }
                    if (!empty($_POST['psword1']) || !empty($_POST['psword2'])) {
                        if ($_POST['psword1'] != $_POST['psword2']) {
                            $pwordErr = 'Passwords do not match';
                            $error[] = $pwordErr;
                        } else {
                            $p = hash('md5', trim($_POST['psword1']));
                        }
                    } else {
                        $pwordErr = 'Password is required';
                        $error[] = $pwordErr;
                    }
                    if (empty($error)) {

                        $sql = "INSERT INTO users (fname, lname, email, psword, registration_date, user_level) VALUES ('$fn', '$ln', '$em', '$p', NOW(), 0)";
                        $result = @mysqli_query($dbconn, $sql);

                        if ($result) {
                            header("Location: register-success.php");
                            exit();
                        } else {
                            echo '<h2>System Error</h2>
                            <p class="error".>Sorry for the inconvenience.</p>';
                            echo '<p>' . mysqli_error($dbconn) . '</p>';
                        }
                        mysqli_close($dbconn);
                        exit();
                    }
                    // else {
                    //     // echo '<h2>Error!</h2>
                    //     // <pclass="error">The following error(s) occured:<br/>';
                    //     // foreach ($error as $msg) {
                    //     //     echo " - $msg<br/>\n";
                    //     // }
                    //     // echo '</p><h3 style="color: red;">Pleas Try Again.</h3><br/><br/>';
                    // }
                } ?>
                <div class="col-6">
                    <h2 class="courier-prime-bold mb-2">Registration Page</h2>
                    <div class="form-control py-4 reg-div border-0">
                        <form method="POST">
                            <div class="form-floating">
                                <p>
                                    <label for="fname">First Name: </label>
                                    <input class="form-control text-center <?php echo !$fnameErr ?: 'is-invalid' ?>" type="text" id="fname" name="fname" size="30" maxlength="40" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
                                    <small class="text-danger-emphasis ubuntu-mono-regular-italic"><?php echo !$fnameErr ? '' : "$fnameErr" ?></small>

                                </p>
                            </div>
                            <div class="form-floating">
                                <p>
                                    <label for="lname">Last Name: </label>
                                    <input class="form-control text-center <?php echo !$lnameErr ?: 'is-invalid' ?>" type="text" id="lname" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
                                    <small class="text-danger-emphasis ubuntu-mono-regular-italic"><?php echo !$lnameErr ? '' : "$lnameErr" ?></small>
                                </p>
                            </div>
                            <div class="form-floating">
                                <p>
                                    <label for="email">Email Address: </label>
                                    <input class="form-control text-center <?php echo !$emailErr ?: 'is-invalid' ?>" type="email" id="email" name="email" size="30" maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                    <small class="text-danger-emphasis ubuntu-mono-regular-italic"><?php echo !$emailErr ? '' : "$emailErr" ?></small>
                                </p>
                            </div>
                            <div class="form-floating">
                                <p>
                                    <label for="psword1">Password: </label>
                                    <input class="form-control text-center <?php echo !$pwordErr ?: 'is-invalid' ?>" type="password" id="psword1" name="psword1" size="20" maxlength="40" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>">
                                    <small class="text-danger-emphasis ubuntu-mono-regular-italic"><?php echo !$pwordErr ? '' : "$pwordErr" ?></small>
                                </p>
                            </div>
                            <div class="form-floating">
                                <p>
                                    <label for="psword2">Re-Enter Password: </label>
                                    <input class="form-control text-center <?php echo !$pwordErr ?: 'is-invalid' ?>" type="password" id="psword2" name="psword2" size="20" maxlength="40" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>">
                                    <small class="text-danger-emphasis ubuntu-mono-regular-italic"><?php echo !$pwordErr ? '' : "$pwordErr" ?></small>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <input class="btn btn-outline-dark px-4" type="submit" id="submit" name="submit" value="Register">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>