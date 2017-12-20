<?php

//Deze class verzorgt het inloggen in het systeem
class LoginCls extends DBconn
{
    private $stmt;
    private $passWord;

    public function __construct($stmt, $passWord)
    {
        $this->openConnection();
        $this->setStmt($stmt);
        $this->setPassWord($passWord);
    }

    public function login()
    {
        if ($this->getStmt()->rowCount() == 1) {
            while ($row = $this->getStmt()->fetch(PDO::FETCH_NAMED)) {
                    if (password_verify($this->getPassWord(), $row['userPassword']))
                    {
                        if ($row['userRights'] == "user") {
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["admin"] = false;
                            echo '<meta http-equiv="refresh" content="0; url=../Home/myAccount.php"/>';
                        }


                        if ($row['userRights'] == "admin") {
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["admin"] = true;
                            echo '<meta http-equiv="refresh" content="0; url=../crudExample/userAdd.php"/>';

                        }
                    }
                    else {
                        echo "error geen account met wachtwoord, gebruikersnaam bestaad wel";
                    }
            }
        }
        else
            {
            echo "error geen account met gegevens";
        }

        return true;
        }


    /**
     * @param mixed $stmt
     */
    public function setStmt($stmt)
    {
        $this->stmt = $stmt;
    }

    /**
     * @param mixed $passWord
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;
    }

    /**
     * @return mixed
     */
    public function getStmt()
    {
        return $this->stmt;
    }
    /**
     * @return mixed
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

}