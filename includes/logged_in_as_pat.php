<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body>
  
  <h1 style="color:navy;text-align:center;">INFS7901 Project: Medical Database Processing System(MEPS) </h1>

  <?php 
        // SETUP PHP CONNECTION
        $servername = "localhost";
        $username = "root";
        $password = "d74dbdad52b2dfe8";
        $dbname = "project_hospital";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("<h3>Connection failed: ".$conn->connect_error."</h3>");
        }
    ?>

  <form>
    <input type="button" value="GO BACK " class="btn btn-outline-warning" onclick="history.go(-1);return false;" />
    <input type="button" value="Home " class="btn btn-outline-warning" onclick="window.location.href='https://yifei.uqcloud.net/MDPS/index.php'" />
  </form>
  <?php  
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Insertion1</h5>";
  echo "<h5>Insert New Patient Information</h5>";

    ?>




  <form action="signup.inc1.php" method="POST" style="text-align:left;margin-bottom:300px,margin-top:200px,margin-left:100px;margin-right:600px" >
    <div class="form-group">
      <label for="form1">Patient's Name</label>
      <input type="text" class="form-control" id="form1" name="pat_name" placeholder="First Name   Last Name">
    </div>
    <div class="form-group">
      <label for="form2">Age</label>
      <input type="text" class="form-control" id="form2" name="age" placeholder="Age">
    </div>
    <div class="form-group">
      <label for="form3">Gender</label>
      <select class="custom-select" name="gender" id="form3">
        <option selected="">Choose...</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group">
      <label for="form4">Home Address</label>
      <input type="text" class="form-control" id="form4" name="address" placeholder="111 Hollywood Ave">
    </div>
    <div class="form-group">
      <label for="form5">Visit Date</label>
      <input type="text" class="form-control" id="form5" name="visit_date" placeholder="Visit Date (xxxx-xx-xx)">
    </div>
    <div class="form-group">
      <label for="form6">Symptom</label>
      <input type="text" class="form-control" id="form6" name="symptom" placeholder="Symptom">
    </div>
    <div class="form-group">
      <label for="form7">Inpatient or Outpatient</label>
      <select class="custom-select" name="T" id="form7">
        <option selected="">Choose...</option>
        <option value="1">Inpatient</option>
        <option value="0">Outpatient</option>
      </select>
    </div>
    <div class="form-group">
      <label for="form8">How Many Days You Expect to Stay in Hospital</label>
      <input type="text" class="form-control" id="form8" name="dur_in_hos" placeholder="Input NULL for Outpatient">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>