<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <form method="post">
                <input type="submit" name="submit" value="select specific userrow">
            </form>
            <form method="post">
                <input type="submit" name="submit1" value="select all userrow">
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

            if(isset($_POST['submit1']))
            {
                $rows = array('*');
                $where = array(
                    array(
                        'name' => 'userEmail',
                        'symbol' => '<>',
                        'value' => '',
                        'syntax' => ''
                    )
                );


                $user = (new QueryBuildingCls('users', $where, $rows))->selectRows();
                $user = $user->fetchAll(PDO::FETCH_NAMED);
                foreach ($user as $value)
                {
                    echo "</br>";
                    echo "userEmail: ".$value['userEmail']. "</br>";
                    echo "userPassword: ".$value['userPassword']. "</br>";
                    echo "userRights: ".$value['userRights']. "</br>";
                    echo "userFName: ".$value['userFName']. "</br>";
                    echo "userLName: ".$value['userLName']. "</br>";
                }
            }
            ?>
        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>