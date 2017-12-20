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

    public function userForm($formtype)
    {
        //if formtype is insert prepare the form.
        switch ($formtype) {
            case ('insert'):
                $this->setFormPropeties(array
                    (
                        array
                        (
                            "label" => "E-mail:",
                            "class" => "form-control",
                            "type" => "email",
                            "value" => "",
                            "name" => "userEmail",
                            "placeholder" => "E-mail"
                        ),

                        array(
                            "label" => "Wachtwoord:",
                            "class" => "form-control",
                            "type" => "password",
                            "value" => "",
                            "name" => "userPassword",
                            "placeholder" => "Wachtwoord"
                        ),

                        array(
                            "label" => "Voornaam:",
                            "class" => "form-control",
                            "type" => "text",
                            "value" => "",
                            "name" => "userFName",
                            "placeholder" => "Voornaam"
                        ),

                        array(
                            "label" => "Achternaam:",
                            "class" => "form-control",
                            "type" => "text",
                            "value" => "",
                            "name" => "userLName",
                            "placeholder" => "Achternaam"
                        ),

                        array(
                            "label" => "",
                            "class" => "",
                            "type" => "submit",
                            "value" => "Verstuur",
                            "name" => "addUser",
                            "placeholder" => ""
                        )
                    )
                );
            break;
        }

        echo (new FormCls($this->getFormProperties()))->formCreator();
    }

    public function createUser($userEmail, $userPassword, $userRights ,$userFName, $userLName)
    {
        if($userEmail || $userPassword || $userRights || $userFName || $userLName == "")
        {
            echo "Vul alstublieft alle velden in";
            exit;
        }
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
                "value" => $this->getUserRights()
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

        echo (new QueryBuildingCls('users', $options))->insertRows();
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