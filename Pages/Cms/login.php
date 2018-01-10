<?php
session_start();
require_once "../../Includes/init.php";
?>

<head>
    <script>
    <?php include_once "../../Includes/Js/custom.js"; ?>
    </script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../Includes/Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../Includes/Lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../../Includes/Lib/css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
</head>


<!--Login-form met css-->
<body class="bg-dark">
<div class="container" style="margin-top: 10%">

    <div class="card card-login mx-auto mt-5">
        <div class="card-header bg-transparent">
            Login
        </div>
        <div class="card-body bg-transparent">
            <form method="post" name="loginForm" action="<?= $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label>Gebruikersnaam</label>
                    <input type="text" class="form-control" name="userEmail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gebruikersnaam">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input type="password" class="form-control" name="userPassword" id="exampleInputPassword1" placeholder="Password">
                </div>
                <input type="submit" value="Login" name="login" class="btn btn-primary btn-block" />
            </form>
        </div>
    </div>
</div>
</body>


<?php

if(isset($_POST['login']))
{
    $rows = array('users.userId ','users.userEmail', 'users.userPassword', 'users.userFName', 'users.userLName', 'users.userRoleId','roles.rolesName');
    $where = array(
        array(
            'name' => 'userEmail',
            'symbol' => '=',
            'value' => $_POST['userEmail'],
            'jointype' => 'INNER',
            'jointable' => 'roles',
            'joinvalue1' => 'users.userRoleId',
            'joinvalue2' => 'roles.rolesId',
            'syntax' => ''
        )
    );

    //Select userEmail,userPassword, userRights, userFName, userLName
    $user = (new QueryBuildingCls('users', $where, $rows))->selectRows();
    $login = new loginCls($user, $_POST['userPassword']);
    $login = $login->login();
}


?>
<script type="text/javascript">
    removeError();
</script>


