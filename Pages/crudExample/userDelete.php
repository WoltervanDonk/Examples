<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <?php
            if(isset($_GET['id']))
            {
                ?>
                <script>
                    $(document).ready(function () {
                        $("#confirm-delete").modal('show');
                    });
                </script>

                <?php


                echo (new ModalCls())->modal('confirm delete');

                if (isset($_POST['delete']))
                {
                    echo $_GET['id'];
                    echo '<meta http-equiv="refresh" content="0; url=userDelete.php" />';
                }
            }

            $rows = array('users.userId, users.userEmail, users.userPassword, users.userFName, users.userLName, roles.rolesName');
            $where = array(
                array(
                    'name' => 'userEmail',
                    'symbol' => '<>',
                    'value' => "0",
                    'jointype' => 'INNER',
                    'jointable' => 'roles',
                    'joinvalue1' => 'users.userRoleId',
                    'joinvalue2' => 'roles.rolesId',
                    'syntax' => ''
                    )
                );

            $tableColumns = array("#", "Email", "Wachtwoord" , "Voornaam", "Achternaam", "Rol", "Actie");

            $buttons = array(
                array(
                    'data-target' => "#confirm-delete",
                    'class' => 'btn btn-danger',
                    'href' => 'userDelete.php?id=',
                    'name' => "Verwijderen"
                )
            );
            $userCls = new UserCls();
            echo $userCls->userTable($tableColumns, $rows, $where, $buttons);
            ?>

        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>