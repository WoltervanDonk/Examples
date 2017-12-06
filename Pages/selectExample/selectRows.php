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
                $rows = array('userEmail', 'userPassword','userRights', 'userFName', 'userLName');
                $where = array(
                    array(
                        'name' => 'userEmail',
                        'symbol' => '=',
                        'value' => "Example_Email",
                        'syntax' => ''
                    )
                );


                $user = (new QueryBuildingCls('users', $where, $rows))->selectRows();
                $user = $user->fetch(PDO::FETCH_ASSOC);
                echo "userEmail: ".$user['userEmail']. "</br>";
                echo "userPassword: ".$user['userPassword']. "</br>";
                echo "userRights: ".$user['userRights']. "</br>";
                echo "userFName: ".$user['userFName']. "</br>";
                echo "userLName: ".$user['userLName']. "</br>";

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