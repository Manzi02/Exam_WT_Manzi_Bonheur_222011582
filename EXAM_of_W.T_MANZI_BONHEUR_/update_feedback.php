<?php
include('db_connection.php');

// Check if feedback_id is set
if(isset($_REQUEST['feedback_id'])) {
    $feedback_id = $_REQUEST['feedback_id'];
    
    $stmt = $connection->prepare("SELECT * FROM feedback WHERE feedback_id=?");
    $stmt->bind_param("i", $feedback_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $user_id = $row['user_id'];
        $rating = $row['rating'];
        $comments = $row['comments'];
        $feedback_date = $row['feedback_date'];
    } else {
        echo "Feedback not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Feedback Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update feedback form -->
    <h2><u>Update Form for Feedback</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="workshop_id">Workshop ID:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($workshop_id) ? $workshop_id : ''; ?>">
        <br><br>

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>
        
        <label for="rating">Rating:</label>
        <input type="text" name="rating" value="<?php echo isset($rating) ? $rating : ''; ?>">
        <br><br>
        
        <label for="comments">Comments:</label>
        <textarea name="comments"><?php echo isset($comments) ? $comments : ''; ?></textarea>
        <br><br>
        
        <label for="feedback_date">Feedback Date:</label>
        <input type="text" name="feedback_date" value="<?php echo isset($feedback_date) ? $feedback_date : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $workshop_id = $_POST['workshop_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $feedback_date = $_POST['feedback_date'];
    
    // Update the feedback in the database
    $stmt = $connection->prepare("UPDATE feedback SET workshop_id=?, user_id=?, rating=?, comments=?, feedback_date=? WHERE feedback_id=?");
    $stmt->bind_param("iiissi", $workshop_id, $user_id, $rating, $comments, $feedback_date, $feedback_id);
    $stmt->execute();
    
    // Redirect to feedback.php or any desired page
    header('Location: feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
