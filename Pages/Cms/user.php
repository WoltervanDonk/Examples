<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <?php

            $userCls = new UserCls();
            if(isset($_GET['deleteId']))
            {
                ?>
                <script type="text/javascript">
                    $(window).load(function(){
                        $('#confirm-delete').modal('show');
                    });
                </script>

                <?php

                echo (new ModalCls())->modal('delete');


                if (isset($_POST['delete']))
                {
                    $userCls->deleteUser($_GET['deleteId']);
                    echo '<meta http-equiv="refresh" content="0; url=user.php" />';
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
                    'href' => 'user.php?deleteId=',
                    'name' => "Verwijderen",
                ),
                array(
                    'data-target' => "#confirm-update",
                    'class' => 'btn btn-info',
                    'href' => 'user.php?updateId=',
                    'name' => "Aanpassen"
                )
            );

            echo $userCls->userTable($tableColumns, $rows, $where, $buttons);
            ?>

        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>