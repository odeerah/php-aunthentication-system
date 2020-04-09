 <?php include_once("lib/header.php"); ?>

 <?php
// define variables and set to empty values
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><strong>Welcome, please register</strong></p>
<p>All fields are required</p>

<form method="POST" action="processregister.php">

    <p>
        <label>First Name</label><br/>
        <input type="text" name="first_name" placeholder="First Name"/>
    </p>
    
    <p>
        <label>Last Name</label><br/>
        <input type="text" name="Last_name" placeholder="Last Name"/> 
    </p>

    <p>
        <label>Email</label><br/>
        <input type="text" email="email" placeholder="email"/>
    </p>
    
    <p>
        <label>Password</label><br/>
        <input type="password " password="password" placeholder="password"/>
    </p>

    <p>
        <label>Gender</label><br/>
        <select name="Gender">
            <option>Male</option>
            <option>Female</option>
        </select>
    </p>
    
    <p>
        <label>Designation</label><br/>
        <select name="designation">
            <option>Medical Team (MT)</option>
            <option>Patients</option>
        </select>
    <p>
        <label>Department</label><br />
        <input type="text" name="department" placeholder="department"/>
    
    </p>
    <p>
        <button type="submit">Register</button>
    </p>

    <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>

 <?php include_once("lib/footer.php"); ?>
    
