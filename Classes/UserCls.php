<?php

class UserCls
{
    private $userEmail;
    private $userPassword;
    private $userFName;
    private $userLName;
    private $userRights;



    public function userTable($tableColumns, $rows, $where, $buttons = array(''))
    {
        $table = new TableCls();

        $tableResult = $table->displayTable($tableColumns, $selector = (new QueryBuildingCls('users', $where, $rows))->selectRows(), $buttons);
        return $tableResult;
    }

    public function createUser($userEmail, $userPassword ,$userFName, $userLName, $userRights)
    {
        $this->setUserEmail($userEmail);
        $this->setUserPassword($userPassword);
        $this->setUserFName($userFName);
        $this->setUserLName($userLName);
        $this->setUserRights($userRights);

        //dit is de array voor alle options van de insertRows
        //dus de query wordt met deze options bijvoorbeeld
        //INSERT INTO users(userEmail, userPassword, userRights, userFName, userLName) VALUES($this->getuUserEmail etc);
        //de getters zijn de meegestuurde parameters die worden opgehaald
        $options = array(
            array(
                "name" => 'userEmail',
                "value" => $this->getUserEmail()
            ),
            array(
                "name" => 'userPassword',
                "value" => $this->getUserPassword()
            ),
            array(
                "name" => 'userFName',
                "value" => $this->getUserFName()
            ),
            array(
                "name" => 'userLName',
                "value" => $this->getUserLName()
            ),

            array(
                "name" => 'userRoleId',
                "value" => $this->getUserRights()
            ),

            array(
                "name" => 'userTestId',
                "value" => 2
            )


        );
        if($this->getUserEmail() || $this->getUserPassword()  || $this->getUserFName() || $this->getUserLName() != "")
        {
            echo (new QueryBuildingCls('users', $options))->insertRows();
        }
        else
        {
            echo (new errorCls())->bootstrapAlert('danger', 'Fout', 'Vul alstublieft alle velden in.');
            exit;
        }

    }


    public function deleteUser($id)
    {
        $options = array(
            array(
                "name" => 'userId',
                "value" => $id
            )
        );

        $db = new QueryBuildingCls('users', $options);
        $db->deleteRows();
    }

    public function uploadImage()
    {
        $target_dir = "../img/";
        $fileName = $_FILES['fileToUpload']["name"];
        $splitName = explode(".", $fileName);
        $fileExtension = end($splitName);
        $newFileName = $_SESSION['userId'].'.'.$fileExtension;
        $target_file = $target_dir . $newFileName;
        $uploadOk = 1;


        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1)
        {
            $options = array(
                array(
                    "name" => 'userProfilePhoto',
                    "symbol" => '=',
                    "value" => $target_file,
                    "syntax" => 'WHERE'
                ),

                array(
                    "name" => 'userId',
                    "symbol" => '=',
                    "value" => $_SESSION['userId'],
                    "syntax" => ''
                )
            );

            $db = new QueryBuildingCls('users', $options);
            $db->updateRows();

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param mixed $userPassword
     */
    public function setUserPassword($userPassword)
    {
        //make password hashed
        $this->userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getUserRights()
    {
        return $this->userRights;
    }

    /**
     * @param mixed $userRights
     */
    public function setUserRights($userRights)
    {
        $this->userRights = $userRights;
    }

    /**
     * @return mixed
     */
    public function getUserFName()
    {
        return $this->userFName;
    }

    /**
     * @param mixed $userFName
     */
    public function setUserFName($userFName)
    {
        $this->userFName = $userFName;
    }

    /**
     * @return mixed
     */
    public function getUserLName()
    {
        return $this->userLName;
    }

    /**
     * @param mixed $userLName
     */
    public function setUserLName($userLName)
    {
        $this->userLName = $userLName;
    }


}