<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>



            <?php

            $rows = array('userProfilePhoto');
            $where = array(
                array(
                    'name' => 'userId',
                    'symbol' => '=',
                    'value' => $_SESSION['userId'],
                    'jointype' => '',
                    'jointable' => '',
                    'joinvalue1' => '',
                    'joinvalue2' => '',
                    'syntax' => ''
                )
            );

            //Select userEmail,userPassword, userRights, userFName, userLName
            $photo = (new QueryBuildingCls('users', $where, $rows))->selectRows();
            $photo = $photo->fetch(PDO::FETCH_ASSOC);

            $filename = '..//img/102.jpg';


            echo "<div class='myAccountPhoto'><h1>Profiel foto :</h1>";
            if(file_exists($filename))
            {
                echo '<img src="'.$photo['userProfilePhoto'].'" width="220" height="200" style="float: right>';
            }
            else
            {

                echo '<img src="../img/noImage.jpg" width="220" height="200" style="float: right">';
            }
            echo "</div>";

            $user = new UserCls();


            if(isset($_POST['submit']))
            {
                 $user->uploadImage();
            }

            ?>
        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>