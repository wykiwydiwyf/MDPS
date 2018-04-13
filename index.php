<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body>

  <h1>INFS7901 Project: Medical Database Processing System(MEPS)</h1>

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

  <?php
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Query1 :Information for all surgeries </h5>";
  echo "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name,pd2.disease,pd2.treatment<br>";
  echo "from doctor as d, pat_doc_2 as pd2 ,patient_1 as p<br>";
  echo "where d.doc_id = pd2.doc_id and p.pat_id = pd2.pat_id and pd2.if_surge = 1<br>";
  echo str_repeat('&nbsp;', 5);
    ?>
  <form action="" method="post">
    <input type="submit" name="query1" class="btn btn-primary btn-lg" value="Run Query1" style="text-align:right;margin:10px" />
  </form>
  <table class="table thead-light table-bordered">
    <thead>
      <tr>
        <th scope="col">Patient ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Disease</th>
        <th scope="col">Treatment</th>
      </tr>
    </thead>

    <tbody id="queryTable1">
      <?php
            if(isset($_POST["query1"]) && $_POST["query1"] != "") {

                    $query = "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name,pd2.disease,pd2.treatment from doctor as d, pat_doc_2 as pd2 ,patient_1 as p where d.doc_id = pd2.doc_id and p.pat_id = pd2.pat_id and pd2.if_surge = 1";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "<td>".$rows["disease"]."</td>";
                        echo "<td>".$rows["treatment"]."</td>";
                        echo "</tr>";
                    }
            }
            ?>

    </tbody>
  </table>



  <?php  
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Insertion1</h5>";
  echo "<h5>Insert New Patient Information</h5>";

    ?>




  <form action="includes/signup.inc.php" method="POST" style="text-align:left;margin-left:300px;margin-right:300px" >
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
      <label for="form4">Address</label>
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