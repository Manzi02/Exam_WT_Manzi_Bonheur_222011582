<?php
include('db_connection.php');

// Check if workshop_id is set
if(isset($_REQUEST['workshop_id'])) {
    $workshop_id = $_REQUEST['workshop_id'];
    
    $stmt = $connection->prepare("SELECT * FROM workshops WHERE workshop_id=?");
    $stmt->bind_param("i", $workshop_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $instructor_id = $row['instructor_id'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
        $duration = $row['duration'];
        $location = $row['location'];
        $max_capacity = $row['max_capacity'];
    } else {
        echo "Workshop not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Workshops Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update workshops form -->
    <h2><u>Update Form for Workshops</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
  
        <label for="instructor_id">Instructor ID:</label>
        <input type="number" name="instructor_id" value="<?php echo isset($instructor_id) ? $instructor_id : ''; ?>">
        <br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
        <br><br>
        
        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo isset($description) ? $description : ''; ?>">
        <br><br>
        
        <label for="date">Date:</label>
        <input type="text" name="date" value="<?php echo isset($date) ? $date : ''; ?>">
        <br><br>
        
        <label for="duration">Duration:</label>
        <input type="text" name="duration" value="<?php echo isset($duration) ? $duration : ''; ?>">
        <br><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php echo isset($location) ? $location : ''; ?>">
        <br><br>
        
        <label for="max_capacity">Max Capacity:</label>
        <input type="text" name="max_capacity" value="<?php echo isset($max_capacity) ? $max_capacity : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
  
    $instructor_id = $_POST['instructor_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $location = $_POST['location'];
    $max_capacity = $_POST['max_capacity'];
    
    // Update the workshop in the database
    $stmt = $connection->prepare("UPDATE workshops SET instructor_id=?, title=?, description=?, date=?, duration=?, location=?, max_capacity=? WHERE workshop_id=?");
    $stmt->bind_param("ississsi", $instructor_id, $title, $description, $date, $duration, $location, $max_capacity, $workshop_id);
    $stmt->execute();
    
    // Redirect to workshops.php
    header('Location: workshops.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
