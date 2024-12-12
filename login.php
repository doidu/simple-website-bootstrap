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
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400&display=swap');
    </style>
</head>

<body class="d-flex flex-column h-100">
    <div>
        <div class="container">
            <?php include 'header.php'; ?>
            <?php include 'nav.php'; ?>
            <div class="row mx-1 text-center justify-content-center">
                <div class="col-6">
                    <h2 class="courier-prime-bold mb-2">Log-In Page</h2>
                    <div class="form-control py-4 reg-div border-0">
                        <?php
                        require('mysqli_connect.php');
                        $em = $p = NULL;
                        $emailErr = $pwordErr = '';
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (!empty($_POST['email'])) {
                                $em = mysqli_real_escape_string($dbconn, $_POST['email']);
                            } else {
                                $emailErr = 'Email Address is required';
                            }
                            if (!empty($_POST['psword1'])) {
                                $p = hash('md5', mysqli_real_escape_string($dbconn, $_POST['psword1']));
                            } else {
                                $pwordErr = 'Password is required';
                            }
                            if ($em && $p) {
                                $sql = "SELECT email, psword, user_level FROM users WHERE email = '$em' AND psword = '$p'";
                                $result = @mysqli_query($dbconn, $sql);
                                if (mysqli_num_rows($result) == 1) {
                                    session_start();
                                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $_SESSION['user_level'] = (int)$_SESSION['user_level'];
                                    $url = ($_SESSION['user_level'] === 1) ? 'admin.php' : 'member.php';
                                    header("Location:" . $url);
                                    mysqli_free_result($result);
                                    mysqli_close($dbconn);
                                    exit();
                                } else {
                                    echo '<h5><span class="text-danger-emphasis ubuntu-mono-regular-italic">Incorrect Email or Password</span></br>Please try again or 
                                    <input class="btn btn-outline-dark rounded-pill mt-1 mb-2 ms-1" style="width: 30%" type="button" onclick="location.href=\'register.php\'" value="Register Here"></h5>';
                                }
                                mysqli_close($dbconn);
                            }
                        } ?>
                        <form method="POST">
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
                            <div>
                                <p>
                                    <input class="btn btn-outline-dark px-4" type="submit" id="submit" name="submit" value="Log-In">
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