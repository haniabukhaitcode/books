<?php
// set default page to one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

// LIMIT clause formula => [(5*1) -5]=0
$from_record_num = ($records_per_page * $page) - $records_per_page;
