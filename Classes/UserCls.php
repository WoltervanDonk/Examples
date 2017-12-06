<?php

class UserCls
{
    private $formProperties;
    private $userEmail;
    private $userPassword;
    private $userRights;
    private $userFName;
    private $userLName;



    public function userTable($tableColumns, $rows)
    {
        $table = new TableCls();

        $tableResult = $table->displayTable($tableColumns, $selector = (new QueryBuildingCls('users', $rows, 'fetchAll'))->selectAllRows(), 1, 1);
        return $tableResult;
    }

    public function createUser($userEmail, $userPassword, $userRights ,$userFName, $userLName)
    {
        $this->setUserEmail($userEmail);
        $this->setUserPassword($userPassword);
        $this->setUserRights($userRights);
        $this->setUserFName($userFName);
        $this->setUserLName($userLName);

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
                "name" => 'userRights',
                "value" => 'admin'
            ),
            array(
                "name" => 'userFName',
                "value" => $this->getUserFName()
            ),
            array(
                "name" => 'userLName',
                "value" => $this->getUserLName()
            ),
        );

        $db = new QueryBuildingCls('users', $options);
        $db->insertRows();
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
     * @param mixed $formPropeties
     */
    public function setFormPropeties($formProperties)
    {
        $this->formProperties = $formProperties;
    }

    /**
     * @return mixed
     */
    public function getFormProperties()
    {
        return $this->formProperties;
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