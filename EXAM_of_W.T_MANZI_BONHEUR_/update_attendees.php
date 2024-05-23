<?php
include('db_connection.php');

// Check if attendee_id is set
if(isset($_REQUEST['attendee_id'])) {
    $attendee_id = $_REQUEST['attendee_id'];
    
    $stmt = $connection->prepare("SELECT * FROM attendees WHERE attendee_id=?");
    $stmt->bind_param("i", $attendee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $workshop_id = $row['workshop_id'];
        $registration_date = $row['registration_date'];
    } else {
        echo "Attendee not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Attendees Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update attendees form -->
    <h2><u>Update Form for Attendees</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>

        <label for="workshop_id">Workshop ID:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($workshop_id) ? $workshop_id : ''; ?>">
        <br><br>
        
        <label for="registration_date">Registration Date:</label>
        <input type="text" name="registration_date" value="<?php echo isset($registration_date) ? $registration_date : ''; ?>">
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
    $registration_date = $_POST['registration_date'];
    
    // Update the attendee in the database
    $stmt = $connection->prepare("UPDATE attendees SET user_id=?, workshop_id=?, registration_date=? WHERE attendee_id=?");
    $stmt->bind_param("iisi", $user_id, $workshop_id, $registration_date, $attendee_id);
    $stmt->execute();
    
    // Redirect to attendees.php or any desired page
    header('Location: attendees.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
