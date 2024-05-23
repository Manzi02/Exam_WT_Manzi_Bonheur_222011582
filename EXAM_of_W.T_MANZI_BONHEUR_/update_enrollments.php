<?php
include('db_connection.php');

// Check if enrollment_id is set
if(isset($_REQUEST['enrollment_id'])) {
    $enrollment_id = $_REQUEST['enrollment_id'];
    
    $stmt = $connection->prepare("SELECT * FROM enrollments WHERE enrollment_id=?");
    $stmt->bind_param("i", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $workshop_id = $row['workshop_id'];
        $enrollment_date = $row['enrollment_date'];
    } else {
        echo "Enrollment not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Enrollments Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update enrollments form -->
    <h2><u>Update Form for Enrollments</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>

        <label for="workshop_id">Workshop ID:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($workshop_id) ? $workshop_id : ''; ?>">
        <br><br>
        
        <label for="enrollment_date">Enrollment Date:</label>
        <input type="text" name="enrollment_date" value="<?php echo isset($enrollment_date) ? $enrollment_date : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $user_id = $_POST['user_id'];
    $workshop_id = $_POST['workshop_id'];
    $enrollment_date = $_POST['enrollment_date'];
    
    // Update the enrollment in the database
    $stmt = $connection->prepare("UPDATE enrollments SET user_id=?, workshop_id=?, enrollment_date=? WHERE enrollment_id=?");
    $stmt->bind_param("iisi", $user_id, $workshop_id, $enrollment_date, $enrollment_id);
    $stmt->execute();
    
    // Redirect to enrollments.php or any desired page
    header('Location: enrollments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
