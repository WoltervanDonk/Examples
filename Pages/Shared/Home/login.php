<?php
session_start();
$_SESSION['loggedIn'] = false;
$_SESSION['admin'] = false;
require_once "../../Includes/init.php";
echo phpversion();
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../../Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../Lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../../Lib/css/sb-admin.css" rel="stylesheet">
</head>

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
                    <input type="text" class="form-control" name="userName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gebruikersnaam">
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
    $rows = array("id","userEmail", "userPassword", "userRights", "userFName", "userLName");
    $where = array
    (

        array(
            "name" => "userEmail",
            "symbol" => "=",
            "value" => $_POST['userName'],
            "syntax" => " "
        )
    );
    $userRow = (new QueryBuildingCls('users', $where, $rows))->selectRows();


    $db = new DBconn();
    $db = $db->openConnection();
    $login = new loginCls($userRow, $_POST['userPassword']);
    if($login->login() == true)
    {
        $_SESSION["userMail"] = $_POST['userName'];
    }

}
?>

<!-- Bootstrap core JavaScript -->
<script src="../../Lib/jquery/jquery.min.js"></script>
<script src="../../Lib/popper/popper.min.js"></script>
<script src="../../Lib/bootstrap/js/bootstrap.min.js"></script>


