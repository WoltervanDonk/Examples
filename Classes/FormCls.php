<?php

//Commentaar over wat de class doet
class FormCls
{
    //properties
    private $formProperties;
    
    //Constructor    
    public function __construct($formProperties)
    {
        $this->setFormProperties($formProperties);
    }
     
    //Methods
    //Commentaar over wat de functie doet
    public function formCreator()
    {
        $formProperties = $this->getFormProperties();

        $result = "";

        $result .= "<form method='post'>";
        foreach ($formProperties as $value)
        {
            if($value['label'] != "")
            {
                $result .= '
                <label>' . $value['label'] . '</label> </br>
                <input class="' . $value['class'] . '" type=' . $value['type'] . ' name=' . $value['name'] . ' placeholder=' . $value['placeholder'] . '>
            <br>
            ';
            }
            else
            {
                $result .= '
                <input class="' . $value['class'] . '" type=' . $value['type'] . ' name=' . $value['name'] . ' placeholder=' . $value['placeholder'] . '>
            <br>
            ';
            }
        }
        $result .= "<button type='submit' name='submit'>Submit</button>";
        $result .= "</form>";

        return $result;
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