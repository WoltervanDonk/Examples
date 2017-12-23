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

    public function updateUser($id)
    {
        $options = array(
            array(
               "name" => 'userEmail',
               "symbol" => '=',
               "value" => 'Example_update',
               "syntax" => 'WHERE'
            ),

            array(
                "name" => 'userId',
                "symbol" => '=',
                "value" => $id,
                "syntax" => ''
            )
        );

        $db = new QueryBuildingCls('users', $options);
        $db->updateRows();
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