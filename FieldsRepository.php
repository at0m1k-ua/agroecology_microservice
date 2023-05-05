<?php

include_once 'Field.php';

class FieldsRepository {

    private mysqli $connection;

    public function __construct(mysqli $connection) {
        $this->connection = $connection;
    }

    public function get_by_year(int $year): array {
        $query = 'SELECT * FROM fields WHERE year = ?';
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $year);
        $statement->execute();
        $result = $statement->get_result();

        $fields = array();
        while ($row = $result->fetch_assoc()) {
            $fields[] = Field::from_db_row($row);
        }
        return $fields;
    }

    public function get_years(): array {
        $result = $this->connection->query('SELECT year FROM fields GROUP BY year  ORDER BY year DESC');

        $years = array();
        while ($row = $result->fetch_assoc()) {
            $years[] = $row['year'];
        }
        return $years;
    }

}
