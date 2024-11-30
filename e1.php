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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>UOB Student Enrollment Data</title>
</head>
<body>
    <main class="container">
        <h1>University of Bahrain - Student Enrollment Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Programs</th>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the data to display rows
                foreach ($records as $record) {

                    echo "<tr>
                        <td>{$record['year']}</td>
                        <td>{$record['semester']}</td>
                        <td>{$record['the_programs']}</td>
                        <td>{$record['nationality']}</td>
                        <td>{$record['colleges']}</td>
                        <td>{$record['number_of_students']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>

