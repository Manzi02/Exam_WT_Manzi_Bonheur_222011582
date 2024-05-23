<?php
include('db_connection.php');

// Check if instructor_id is set
if(isset($_REQUEST['instructor_id'])) {
    $instructor_id = $_REQUEST['instructor_id'];
    
    $stmt = $connection->prepare("SELECT * FROM instructors WHERE instructor_id=?");
    $stmt->bind_param("i", $instructor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $bio = $row['bio'];
        $expertise_area = $row['expertise_area'];
    } else {
        echo "Instructor not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Instructors Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update instructors form -->
    <h2><u>Update Form for Instructors</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
  
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>

        <label for="bio">Bio:</label>
        <textarea name="bio"><?php echo isset($bio) ? $bio : ''; ?></textarea>
        <br><br>
        
        <label for="expertise_area">Expertise Area:</label>
        <input type="text" name="expertise_area" value="<?php echo isset($expertise_area) ? $expertise_area : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
  
    $user_id = $_POST['user_id'];
    $bio = $_POST['bio'];
    $expertise_area = $_POST['expertise_area'];
    
    // Update the instructor in the database
    $stmt = $connection->prepare("UPDATE instructors SET user_id=?, bio=?, expertise_area=? WHERE instructor_id=?");
    $stmt->bind_param("issi", $user_id, $bio, $expertise_area, $instructor_id);
    $stmt->execute();
    
    // Redirect to instructors.php
    header('Location: instructors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
