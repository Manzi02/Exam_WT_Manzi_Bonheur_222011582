<?php
include('db_connection.php');

// Check if material_id is set
if(isset($_REQUEST['material_id'])) {
    $material_id = $_REQUEST['material_id'];
    
    $stmt = $connection->prepare("SELECT * FROM materials WHERE material_id=?");
    $stmt->bind_param("i", $material_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $title = $row['title'];
        $description = $row['description'];
        $link = $row['link'];
        $upload_date = $row['upload_date'];
    } else {
        echo "Material not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Materials Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update materials form -->
    <h2><u>Update Form for Materials</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
  
        <label for="workshop_id">Workshop ID:</label>
        <input type="number" name="workshop_id" value="<?php echo isset($workshop_id) ? $workshop_id : ''; ?>">
        <br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
        <br><br>
        
        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo isset($description) ? $description : ''; ?>">
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
  
    $workshop_id = $_POST['workshop_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $upload_date = $_POST['upload_date'];
    
    // Update the material in the database
    $stmt = $connection->prepare("UPDATE materials SET workshop_id=?, title=?, description=?, link=?, upload_date=? WHERE material_id=?");
    $stmt->bind_param("issssi", $workshop_id, $title, $description, $link, $upload_date, $material_id);
    $stmt->execute();
    
    // Redirect to materials.php
    header('Location: materials.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
