<?php

/**
 *
 */
class TableCls
{
    private $table;

    //Hier word de table dynamisch aangemaakt
    public function displayTable($columns, $values = 0, $buttons)
    {
        $fetchValues = $values->fetchAll();

        $table = $this->getTable();

        $table .= '<table class="table">';

        $table .= '<thead><tr>';
        //Vullen van table columns
        foreach ($columns as $value)
        {
            $table .= '<th scope="col">'. $value. '</th>';
        }
        $table .= '</tr></thead><tbody>';

        //Als er geen buttons worden aangevraagd pas de counter aan naar default
        if ($buttons[0] != '')
        {
            $buttonsCalc = 1 + count($buttons);
        }
        else
        {
            $buttonsCalc = 1;
        }

        foreach ($fetchValues as $value)
        {
            //Vullen van tablerows
            $table .= "<tr>";
            for ($x = 0; $x <= sizeof($columns) - $buttonsCalc; $x++) {
                $table .= '<td>' . $value[$x] . '</td>';
            }
            //Aanmaken van buttons (indien meegegeven
            if ($buttons[0] != '')
            {
                foreach ($buttons as $button)
                {
                    $table .= "<td><a class='" . $button['class'] . "' data-target='".$button['data-target']."'   href=" . $button['href'] . $value[0] . ">" . $button['name'] . "</a></td>";
                }
            }
            $table .= "</tr>";
        }

        $table .= '</tbody>';
        $table .= '</table>';

        return $table;
    }

    public function getTable()
    {
        return $this->table;
    }
    public function setTable($table)
    {
        $this->table = $table;
    }
}
