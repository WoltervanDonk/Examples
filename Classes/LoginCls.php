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
        $ErrorCls = new errorCls();
        if ($this->getStmt()->rowCount() == 1) {
            while ($row = $this->getStmt()->fetch(PDO::FETCH_NAMED)) {
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['userEmail'] = $_POST['userEmail'];
                    if (password_verify($this->getPassWord(), $row['userPassword']))
                    {
                        if ($row['userRoleId'] == "2") {

                            $_SESSION["loggedIn"] = true;
                            $_SESSION["admin"] = false;
                            echo '<meta http-equiv="refresh" content="0; url=myAccount.php"/>';
                        }


                        if ($row['userRoleId'] == "1") {
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["admin"] = true;
                            echo '<meta http-equiv="refresh" content="0; url=user.php"/>';

                        }
                    }
                    else {
                        echo "error geen account met wachtwoord, gebruikersnaam bestaad wel";
                    }
            }
        }
        else
            {
                echo $ErrorCls->bootstrapAlert('danger', 'title', 'ur a maggot');
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