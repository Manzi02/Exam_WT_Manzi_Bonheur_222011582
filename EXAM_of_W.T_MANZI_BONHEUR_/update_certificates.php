<?php
include('db_connection.php');

// Check if certificate_id is set
if(isset($_REQUEST['certificate_id'])) {
    $certificate_id = $_REQUEST['certificate_id'];
    
    $stmt = $connection->prepare("SELECT * FROM certificates WHERE certificate_id=?");
    $stmt->bind_param("i", $certificate_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $workshop_id = $row['workshop_id'];
        $issue_date = $row['issue_date'];
    } else {
        echo "Certificate not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Certificates Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update certificates form -->
    <h2><u>Update Form for Certificates</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
  
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>

        <label for="workshop_id">Workshop ID:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($workshop_id) ? $workshop_id : ''; ?>">
        <br><br>
        
        <label for="issue_date">Issue Date:</label>
        <input type="text" name="issue_date" value="<?php echo isset($issue_date) ? $issue_date : ''; ?>">
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
    $issue_date = $_POST['issue_date'];
    
    // Update the certificate in the database
    $stmt = $connection->prepare("UPDATE certificates SET user_id=?, workshop_id=?, issue_date=? WHERE certificate_id=?");
    $stmt->bind_param("iisi", $user_id, $workshop_id, $issue_date, $certificate_id);
    $stmt->execute();
    
    // Redirect to certificates.php
    header('Location: certificates.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
