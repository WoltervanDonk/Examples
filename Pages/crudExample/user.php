<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!--            <form method="post">-->
            <!--                <input type="submit" name="submit">-->
            <!--            </form>-->
            <?php

            $user = new UserCls();
            echo $user->userForm('insert');

            if(isset($_POST['addUser']))
            {
                //Draai de UserCls()->createUser met de meegegeven benamingen (zie hieronder), vanaf php v7 wordt weergegeven waarvoor elke string dient
                echo $user->createUser($_POST['userEmail'], $_POST['userPassword'], "admin", $_POST['userFName'], $_POST['userLName']);
            }

            if(isset($_GET['id']))
            {
                echo $user->deleteUser($_GET['id']);
            }


//            if(isset($_GET['id']))
//            {
//                echo $user->updateUser($_GET['id']);
//            }

            $tableColumns = array("#", "Email", "Wachtwoord" , "Rechten", "Voornaam", "Achternaam");
            $rows = array('userId', 'userEmail', 'userPassword', 'userRights', 'userFName', 'userLName');
            echo $user->userTable($tableColumns, $rows);

            ?>

        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>