<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {

 include('db_connection.php');

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        '
attendees' => "SELECT  attendee_id FROM 
attendees WHERE attendee_id LIKE '%$searchTerm%'",
        'certificates' => "SELECT certificate_id FROM certificates WHERE certificate_id LIKE '%$searchTerm%'",
        'enrollments' => "SELECT  enrollment_id FROM enrollments WHERE  enrollment_id LIKE '%$searchTerm%'",
        'feedback' => "SELECT  feedback_id FROM feedback WHERE feedback_id LIKE '%$searchTerm%'",
        'payments' => "SELECT payment_id FROM payments WHERE payment_id LIKE '%$searchTerm%'",
        'instructors' => "SELECT instructor_id FROM instructors WHERE instructor_id LIKE '%$searchTerm%'",
        'materials' => "SELECT title FROM materials WHERE title LIKE '%$searchTerm%'",
        'project_management_resources' => "SELECT resource_id FROM project_management_resources WHERE resource_id LIKE '%$searchTerm%'",
        'workshops' => "SELECT workshop_id FROM workshops WHERE workshop_id LIKE '%$searchTerm%'",
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>



