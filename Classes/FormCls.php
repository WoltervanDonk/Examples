<?php

//Deze class genereert formpjes
class FormCls
{
    //properties
    private $formProperties;


    //Methods
    //door een array mee te geven met/de onderstaanden waardes maakt het een formpje aan.
    public function formCreator()
    {
        $formProperties = $this->getFormProperties();

        $result = "";

        $result .= "<form method='post'>";
        foreach ($formProperties as $value)
        {
            switch ($value['type'])
            {
                case ('submit'):
                    $result .= '
                    <input class="btn btn-default" type=' . $value['type'] . ' name=' . $value['name'] . ' value=' . $value['value']. '>
                    <br>';
                    break;

                case ('text' || 'password' || 'e-mail'):

                    $result .= '
                    <label>' . $value['label'] . '</label> </br>
                    <input class="' . $value['class'] . '" type=' . $value['type'] . ' name=' . $value['name'] . ' placeholder=' . $value['placeholder'] . '>
                    <br>';
                    break;


            }
        }
        $result .= "</form>";

        return $result;
    }

    public function userForm($formtype)
    {
        //if formtype is insert prepare the form.
        switch ($formtype) {
            case ('insert'):
                $this->setFormProperties(array
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

        echo $this->formCreator();
    }

    /**
     * @return mixed
     */
    public function getFormProperties()
    {
        return $this->formProperties;
    }

    /**
     * @param mixed $formProperties
     */
    public function setFormProperties($formProperties)
    {
        $this->formProperties = $formProperties;
    }


}