<?php
// API Endpoint
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch data from API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if data retrieval was successful
if (!$data || !isset($data['records'])) {
    die("Error: Unable to retrieve data from the API.");
}

$records = $data['records'];

//Display records
foreach ($records as $record) { 
    echo "ID: " . $record['record']['id'] . "<br>";
    echo "College: " . $record['record']['colleges'] . "<br>";
    echo "Program: " . $record['record']['the_programs'] . "<br>";
}
?>

