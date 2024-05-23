<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="mystyle.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>workshops Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: yellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>

  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
        
  </head>

  <header>

<body bgcolor="dimgray">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./image/logos.jpeg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./attendees.php">Attendees</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./certificates.php">Certificates</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./enrollments.php">Enrollments</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./feedback.php">Feedback</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./instructors.php">Instructors</a>
  </li>  <li style="display: inline; margin-right: 10px;"><a href="./materials.php">Materials</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./payments.php">Payments</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./project_management_resources.php">Project_management_resources</a>
  </li>
<li style="display: inline; margin-right: 10px;"><a href="./workshops.php">workshops</a>
  </li>
   
   
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>
   <h1><u>Workshops Profile Form</u></h1>

<form method="post" onsubmit="return confirmInsert();">

    <label for="workshop_id">Workshop_id:</label>
    <input type="number" id="driver_id" name="driver_id" required><br><br>

    <label for="instructor_id">Instructor_id:</label>
    <input type="number" id="user_id" name="user_id" required><br><br>

    <label for="title">Title:</label>
    <input type="text" id="license_number" name="license_number" required><br><br>

    <label for="description">Description:</label>
    <input type=text id="car_model" name="car_model" required><br><br>

    <label for="date">Date:</label>
    <input type="date" id="capacity" name="capacity" required><br><br>

    <label for="duration">Duration:</label>
    <input type="time" id="capacit" name="capacit" required><br><br>

    <label for="location">Location:</label>
    <input type="text" id="capaci" name="capaci" required><br><br>

    <label for="max_capacity">Max_capacity:</label>
    <input type="text" id="capac" name="capac" required><br><br>

    <input type="submit" name="add" value="Insert">
</form>

<?php
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO workshops(workshop_id, instructor_id, title, description, date,duration,location,max_capacity) VALUES (?, ?, ?, ?, ? ,? ,?,?)");
    $stmt->bind_param("isssssss", $workshop_id, $instructor_id, $title, $description, $date,$duration,$location,$max_capacity);
    // Set parameters and execute
    $workshop_id = $_POST['driver_id'];
    $instructor_id = $_POST['user_id'];
    $title = $_POST['license_number'];
    $description = $_POST['car_model'];
    $date = $_POST['capacity'];
    $duration = $_POST['capacit'];
    $location = $_POST['capaci'];
    $max_capacity = $_POST['capac'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>






<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>workshops</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Workshops Table</h2></center>
    <table border="3">
        <tr>
            <th>workshop_id</th>
            <th>instructor_id</th>
            <th>title</th>
            <th>description</th>
            <th>date</th>
            <th>duration</th>
            <th>location</th>
            <th>max_capacity</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
<?php
include('db_connection.php');

// Prepare SQL query to retrieve all workshops
$sql = "SELECT * FROM workshops";
$result = $connection->query($sql);

// Check if there are any workshops
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        $workshop_id = $row['workshop_id']; // Fetch the workshop_id
        echo "<tr>
            <td>" . $row['workshop_id'] . "</td>
            <td>" . $row['instructor_id'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['date'] . "</td>
             <td>" . $row['duration'] . "</td>
              <td>" . $row['location'] . "</td>
               <td>" . $row['max_capacity'] . "</td>
            <td><a style='padding:4px' href='delete_workshops.php?workshop_id=$workshop_id'>Delete</a></td> 
            <td><a style='padding:4px' href='update_workshops.php?workshop_id=$workshop_id'>Update</a></td> 
        </tr>";
    }

} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}
// Close the database connection
$connection->close();
?>
    </table>
</body>

</section>
 
<footer>
  <center> 
   <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by:MANZI BONHEUR</h2></b>
  </center>
</footer>
  
</body>
</html>

