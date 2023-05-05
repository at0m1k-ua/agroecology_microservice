<?php

class Field {

    public string $name,
                  $area,
                  $grade,
                  $ph,
                  $humus,
                  $n,
                  $p2o5,
                  $k2o,
                  $mn,
                  $cu,
                  $co,
                  $zn,
                  $pb,
                  $cs,
                  $sr;
    public int $year;

    public static function from_db_row(array $db_row): Field {
        $field = new Field();
        $field->name = $db_row['name'];
        $field->year = $db_row['year'];
        $field->area = $db_row['area'];
        $field->grade = $db_row['grade'];
        $field->ph = $db_row['ph'];
        $field->humus = $db_row['humus'];
        $field->n = $db_row['n'];
        $field->p2o5 = $db_row['p2o5'];
        $field->k2o = $db_row['k2o'];
        $field->mn = $db_row['mn'];
        $field->cu = $db_row['cu'];
        $field->co = $db_row['co'];
        $field->zn = $db_row['zn'];
        $field->pb = $db_row['pb'];
        $field->cs = $db_row['cs'];
        $field->sr = $db_row['sr'];
        return $field;
    }

}
