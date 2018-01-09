<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
var_dump($_SESSION['userId']);
?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <?php
            if(isset($_GET['deleteId']))
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
                    echo '<meta http-equiv="refresh" content="0; url=userDelete.php" />';
                }
            }

            $rows = array('users.userId, users.userEmail, users.userFName, users.userLName, roles.rolesName');
            $where = array(
                array(
                    'name' => 'userId',
                    'symbol' => '<>',
                    'value' => $_SESSION['userId'],
                    'jointype' => 'INNER',
                    'jointable' => 'roles',
                    'joinvalue1' => 'users.userRoleId',
                    'joinvalue2' => 'roles.rolesId',
                    'syntax' => 'AND'
                ),

                array(
                    'name' => 'userRoleId',
                    'symbol' => '<>',
                    'value' => '3',
                    'jointype' => '',
                    'jointable' => '',
                    'joinvalue1' => '',
                    'joinvalue2' => '',
                    'syntax' => ''
                )

            );

            $tableColumns = array("#", "Email" , "Voornaam", "Achternaam", "Rol", "Verwijderen", "Updaten");
            $buttons = array(
                array(
                    'data-target' => "#confirm-delete",
                    'class' => 'btn btn-danger',
                    'href' => 'userDelete.php?deleteId=',
                    'name' => "Verwijderen",
                ),
                array(
                    'data-target' => "#confirm-update",
                    'class' => 'btn btn-info',
                    'href' => 'userDelete.php?updateId=',
                    'name' => "Aanpassen"
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