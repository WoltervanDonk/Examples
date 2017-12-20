<?php

/**
 *
 */
class TableCls
{
    private $table;

    //Hier word de table dynamisch aangemaakt
    public function displayTable($columns, $values = 0, $updateButtons = "", $deleteButtons = "", $pdf = "")
    {
        $this->setTable("<table class='table table-striped table-hover'><thead class='thead-inverse'><tr>");

        foreach ($columns as $columnName) {
            $this->setTable($this->getTable() . "<th>" . $columnName . "</th>");
        }
        if ($updateButtons != "") {
            $this->setTable($this->getTable() . "<th>Aanpassen</th>");
        }
        if ($deleteButtons != "") {
            $this->setTable($this->getTable() . "<th>Verwijderen</th>");
        }
        if ($pdf != "") {
            $this->setTable($this->getTable() . "<th>PDF</th>");
        }
        $this->setTable($this->getTable() . "</tr></thead><tbody>");

        $z = 0;

        //De for loop regelt het maken van de tr(table row)
        for ($x = 0; $x != sizeof($values); $x++) {
            $this->setTable($this->getTable() . "<tr>");

            //Hier worden de td(table data) gemaakt.
            //Dit word gedaan op het aantal columns die er zijn meegestuurd
            for ($i = 0; $i != sizeof($columns); $i++) {
                if (strpos($columns[$i], 'Naar user') !== false) { //Kijkt of de text '(links)' in de variable $colums[$i] staat.
                    $this->setTable($this->getTable() . "<td><a href='userAdd.php?id=" . $values[$z][$i] . "'>" . $values[$z][$i] . "</td>");
                } else if (strpos($columns[$i], 'Naar team') !== false) { //Kijkt of de text '(links)' in de variable $colums[$i] staat.
                    $this->setTable($this->getTable() . "<td><a href='team.php?id=" . $values[$z][$i] . "'>" . $values[$z][$i] . "</td>");
                } else {
                    $this->setTable($this->getTable() . "<td>" . $values[$z][$i] . "</td>");
                }
            }

            //Hier word een link gemaakt voor het aanpassen van data.
            //Elke link heeft een appart id
            if ($updateButtons != "") {
                $this->setTable($this->getTable() . "<td><a class='btn btn-danger' href=?id=" . $values[$z][0] . ">".$updateButtons."</a></td>");
            }
            if ($deleteButtons != "") {
                $this->setTable($this->getTable() . "<td><a class='btn btn-danger' href=?id=" . $values[$z][0] . ">".$deleteButtons."</a></td>");
            }
            if ($pdf != "") {
                $this->setTable($this->getTable() . "<td><a class='btn btn-danger' href=createPDF.php?id=" . $values[$z][0] . ">".$pdf."</a></td>");
            }

            $z++;

            $this->setTable($this->getTable() . "</tr>");
        }

        $this->setTable($this->getTable() . "</tbody></table>");

        return $this->getTable();
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
