<?php

//Deze class genereert formpjes
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