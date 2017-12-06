<?php
include_once "../../Includes/init.php";
include_once "../Shared/Cms/header.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <form method="post">
                <input type="submit" name="submit">
            </form>
            <?php

            if (isset($_POST['submit']))
            {
                //Draai de UserCls()->createUser met de meegegeven benamingen (zie hieronder), vanaf php v7 wordt weergegeven waarvoor elke string dient
                echo (new UserCls())->createUser('Example_Email', 'Example_Password', "Example_userrights", "Example_Voornaam", "Example_Achternaam");
            }

            ?>
        </div>
    </div>
<?php
include_once "../Shared/Cms/footer.php";
?>