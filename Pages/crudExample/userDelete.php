<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <button type="button" class="btn btn-primary btn-center" data-toggle="modal" data-target="#modal">
                Toevoegen
            </button>
            <?php
            $user = new UserCls();
            if(isset($_GET['id']))
            {
                echo $user->deleteUser($_GET['id']);
            }


            $tableColumns = array("#", "Email", "Wachtwoord" , "Rechten", "Voornaam", "Achternaam");
            $rows = array('userId', 'userEmail', 'userPassword', 'userRights', 'userFName', 'userLName');
            echo $user->userTable($tableColumns, $rows);



            ?>
        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>