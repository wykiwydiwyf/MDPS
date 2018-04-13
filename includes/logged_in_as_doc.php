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
  echo "<h5>MYSQL Query1 - Join Query :Information for all surgeries </h5>";
  echo "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name,pd2.disease,pd2.treatment<br>";
  echo "from doctor as d, pat_doc_2 as pd2 ,patient_1 as p<br>";
  echo "where d.doc_id = pd2.doc_id and p.pat_id = pd2.pat_id and pd2.if_surge = 1<br>";
  echo str_repeat('&nbsp;', 5);
    ?>
  <form action="" method="post">
    <input type="submit" name="query1" class="btn btn-primary btn-lg" value="Run Query1" style="text-align:right;margin:10px" />
  </form>
  <table class="table thead-light table-bordered" style="margin-top:100px;margin-bottom:100px;margin-left:100px;margin-right:300px">
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
  echo "<h5>MYSQL Query2 - Join Query :Show who is/are the doctors for each patients </h5>";
  echo "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name<br>
from doctor as d, pat_doc_1 as pd1 ,patient_1 as p<br>
where d.doc_id = pd1.doc_id and p.pat_id = pd1.pat_id<br>
order by p.pat_id
<br>";
  echo str_repeat('&nbsp;', 5);
    ?>
  <form action="" method="post">
    <input type="submit" name="query2" class="btn btn-primary btn-lg" value="Run Query2" style="text-align:right;margin:10px" />
  </form>
  <table class="table thead-light table-bordered" style="margin-top:100px;margin-bottom:100px;margin-left:100px;margin-right:300px">
    <thead>
      <tr>
        <th scope="col">Patient ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
      </tr>
    </thead>

    <tbody id="queryTable2">
      <?php
            if(isset($_POST["query2"]) && $_POST["query2"] != "") {

$query = "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name
from doctor as d, pat_doc_1 as pd1 ,patient_1 as p
where d.doc_id = pd1.doc_id and p.pat_id = pd1.pat_id 
order by p.pat_id";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "</tr>";
                    }
            }
            ?>

    </tbody>
  </table>


  <?php
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Query3 - Division Query :Show all inpatient’s information who hasn’t been signed with a doctor </h5>";
  echo "SELECT *<br>
from patient_1 as p1<br>
Where exists<br>
	(select doc_id<br>
    from doctor as d<br>
    where not exists<br>
    (select pd1.doc_id<br>
    from pat_doc_1 as pd1<br>
where pd1.pat_id= p1.pat_id))
<br>";
  echo str_repeat('&nbsp;', 5);
    ?>
  <form action="" method="post">
    <input type="submit" name="query3" class="btn btn-primary btn-lg" value="Run Query3" style="text-align:right;margin:10px" />
  </form>
  <table class="table thead-light table-bordered" style="margin-top:100px;margin-bottom:100px;margin-left:100px;margin-right:300px">
    <thead>
      <tr>
        <th scope="col">Patient ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Visit Date</th>
        <th scope="col">AGE</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Hospital Name</th>
      </tr>
    </thead>

    <tbody id="queryTable3">
      <?php
            if(isset($_POST["query3"]) && $_POST["query3"] != "") {

$query = "SELECT *
from patient_1 as p1
Where exists
	(select doc_id
    from doctor as d
    where not exists
    (select pd1.doc_id
    from pat_doc_1 as pd1
where pd1.pat_id= p1.pat_id))
";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["visit_date"]."</td>";
                        echo "<td>".$rows["age"]."</td>";
                        echo "<td>".$rows["gender"]."</td>";
                        echo "<td>".$rows["address"]."</td>";
                        echo "<td>".$rows["hos_name"]."</td>";
                        echo "</tr>";
                    }
            }
            ?>

    </tbody>
  </table>

  <?php
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Query4 - Simple Query :Show all doctor information </h5>";
  echo "SELECT *<br>
from doctor
<br>";
  echo str_repeat('&nbsp;', 5);
    ?>
  <form action="" method="post">
    <input type="submit" name="query4" class="btn btn-primary btn-lg" value="Run Query4" style="text-align:right;margin:10px" />
  </form>
  <table class="table thead-light table-bordered" style="margin-top:100px;margin-bottom:100px;margin-left:100px;margin-right:300px">
    <thead>
      <tr>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">AGE</th>
      </tr>
    </thead>

    <tbody id="queryTable3">
      <?php
            if(isset($_POST["query4"]) && $_POST["query4"] != "") {

$query = "SELECT *
from doctor
";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "<td>".$rows["age"]."</td>";
                        echo "</tr>";
                    }
            }
            ?>

    </tbody>
  </table>


  <?php 
$query1 = "SELECT pat_id
from patient_1 as p1
Where exists
	(select doc_id
    from doctor as d
    where not exists
    (select pd1.doc_id
    from pat_doc_1 as pd1
where pd1.pat_id= p1.pat_id))
";
$query2 = "SELECT doc_id from doctor";

                    $result1 = mysqli_query($conn, $query1);
                    $result2 = mysqli_query($conn, $query2);
  ?>


  <select name="categories">
    <option value="Select School">Doctor ID</option>
    <?php
    while ($row = mysqli_fetch_array($result2)) {
        echo "<option value='" . $row['path'] . "'>'" . $row['name'] . "'</option>";
    }
    ?>
  </select>
  
  
  <form action="signup.inc2.php" method="POST" style="text-align:left;margin-bottom:300px,margin-top:200px,margin-left:100px;margin-right:600px" >
    <div class="form-group">
      <label for="form1">Patient ID</label>
      <select class="custom-select" name="pat_id" id="form1">
        <?php 
while ($row = mysql_fetch_array($result1))
{
    echo "<option value='".$row['path']."'>'".$row['name']."'</option>";
}
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="form2">Doctor ID</label>
      <select class="custom-select" name="doc_id" id="form2">
        <?php 


while ($row = mysql_fetch_array($result2))
{
    echo "<option value='".$row['path']."'>'".$row['name']."'</option>";
}
?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>