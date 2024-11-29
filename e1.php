<?php
// API Endpoint
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch data from API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if data retrieval was successful
if (!$data || !isset($data['results'])) {
    die("Error: Unable to retrieve data from the API.");
}

$records = $data['results'] ?? [];

//Display records
foreach ($records as $record) { 
    echo "Year: " . $record['record']['year'] . "<br>";
    echo "Semester: " . $record['record']['semester'] . "<br>";
    echo "Programs: " . $record['record']['programs'] . "<br>";
    echo "Nationality: " . $record['record']['nationality'] . "<br>";
    echo "Colleges: " . $record['record']['colleges'] . "<br>";
    echo "Number of students: " . $record['record']['number of students'] . "<br>";
}
?>

