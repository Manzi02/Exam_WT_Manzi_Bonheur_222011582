<?php
include('db_connection.php');

// Check if resource_id is set
if(isset($_REQUEST['resource_id'])) {
    $resource_id = $_REQUEST['resource_id'];
    
    $stmt = $connection->prepare("SELECT * FROM project_management_resources WHERE resource_id=?");
    $stmt->bind_param("i", $resource_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
        $link = $row['link'];
        $upload_date = $row['upload_date'];
    } else {
        echo "Resource not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Project Management Resources Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update project management resources form -->
    <h2><u>Update Form for Project Management Resources</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
        <br><br>

        <label for="description">Description:</label>
        <textarea name="description"><?php echo isset($description) ? $description : ''; ?></textarea>
        <br><br>
        
        <label for="link">Link:</label>
        <input type="text" name="link" value="<?php echo isset($link) ? $link : ''; ?>">
        <br><br>
        
        <label for="upload_date">Upload Date:</label>
        <input type="text" name="upload_date" value="<?php echo isset($upload_date) ? $upload_date : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $upload_date = $_POST['upload_date'];
    
    // Update the resource in the database
    $stmt = $connection->prepare("UPDATE project_management_resources SET title=?, description=?, link=?, upload_date=? WHERE resource_id=?");
    $stmt->bind_param("ssssi", $title, $description, $link, $upload_date, $resource_id);
    $stmt->execute();
    
    // Redirect to resources.php or any desired page
    header('Location: project_management_resources.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
