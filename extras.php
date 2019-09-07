function readAll($from_record_num, $records_per_page)
{
$query = " SELECT * FROM
" . $this->table_name . "
ORDER BY
author ASC
LIMIT {$from_record_num}, {$records_per_page}";


$stmt = $this->conn->prepare($query);

$stmt->execute();

return $stmt;
}