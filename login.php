<?php include("./includes/secrets.php") ?>
<?php
/* Redirects here after login */
$redirect_after_login = 'index.php';

/* Will not ask password again for */
$remember_password = strtotime('+30 days'); // 30 days

if (isset($_POST['password']) && $_POST['password'] == $password) {
    setcookie("password", $password, $remember_password);
    header('Location: ' . $redirect_after_login);
    exit;
}
?>
<?php include("./includes/header.php") ?>
<title>Gambee - Login</title>
</head>

<body>
    <div style="text-align:center;margin-top:50px;">
        Do you know the Gambee secret?
        <form method="POST">
            <input name="password" type="password">
        </form>
    </div>
</body>

</html>