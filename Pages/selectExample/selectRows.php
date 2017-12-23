<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <form method="post">
                <input type="submit" name="submit" value="select specific userrow">
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $rows = array('users.userEmail', 'roles.rolesName', 'test.testName');
                $where = array(
                    array(
                        'name' => 'userEmail',
                        'symbol' => '=',
                        'value' => "test@gmail.com",
                        'jointype' => 'INNER',
                        'jointable' => 'roles',
                        'joinvalue1' => 'users.userRoleId',
                        'joinvalue2' => 'roles.rolesId',
                        'syntax' => ''
                    ),

                    array(
                        'name' => '',
                        'symbol' => '',
                        'value' => '',
                        'jointype' => 'INNER',
                        'jointable' => 'test',
                        'joinvalue1' => 'users.userTestId',
                        'joinvalue2' => 'test.testId',
                        'syntax' => ''
                    )
                );


                $user = (new QueryBuildingCls('users', $where, $rows))->selectRows();
                $user = $user->fetch(PDO::FETCH_ASSOC);
                echo "</br>userEmail: ".$user['userEmail']. "</br>";
                echo "userRol: ".$user['rolesName']. "</br>";
                echo "userTest: ".$user['testName']. "</br>";

            }
            ?>
        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>