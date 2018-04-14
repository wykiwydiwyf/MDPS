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
  echo "<h5>MYSQL Insert1</h5>";
  echo "<h5>Assign a doctor to un-assigned patient</h5>";
  echo str_repeat('&nbsp;', 5);
    ?>

  <form method="POST" style="text-align:left;margin-bottom:300px,margin-top:200px,margin-left:100px;margin-right:600px" >
    <div class="form-group">
      <label for="form1">Patient ID</label>
      <select class="custom-select" name="pat_id" id="form1">
        <?php
$query = "SELECT pat_id
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

            ?>
        <option selected="">Choose...</option>
        <?php 
          while ($row = mysqli_fetch_array($result)) {
          echo "<option value=".$row["pat_id"].">".$row["pat_id"]."</option>";
          }
           ?>

      </select>
    </div>
    <div class="form-group">
      <label for="form2">Doctor ID</label>
      <select class="custom-select" name="doc_id" id="form1">
        <?php
$query = "SELECT *
from doctor
";

$result = mysqli_query($conn, $query);

            ?>
        <option selected="">Choose...</option>
        <?php 
          while ($row = mysqli_fetch_array($result)) {
          echo "<option value=".$row["doc_id"].">".$row["doc_id"]."</option>";
          }
           ?>

      </select>
    </div>
    
    <div class="form-group">
    <label for="table1">Diagnosis Date</label>
    <table border="0" cellspacing="0" id="table1">

<tr><td  align=left  >   

<select name=month value=''>Select Month</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>



</td><td  align=left  >   

Date<select name=dt >

<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>

</td><td  align=left  >   
Year(yyyy)<input type=text name=year size=4 value=2005>

</table>

</div>

     <input type="submit" name="insert1" class="btn btn-primary btn-lg" value="Assign Doctor" style="text-align:right;margin:10px" />
  </form>

<?php 


$doc_id=$_POST['doc_id'];
$pat_id=$_POST['pat_id'];
$todo=$_POST['todo'];
$month=$_POST['month'];
$dt=$_POST['dt'];
$year=$_POST['year'];

$date="$year-$month-$dt";



if(isset($_POST["insert1"]) && $_POST["insert1"] != "") {

  $sql = "INSERT INTO patient_1(pat_id,doc_id,date) VALUES($pat_id,$doc_id,$date);";
  mysqli_query($conn, $sql);

  //let them know the person has been added. 
  echo "<span style='color:#AFA;text-align:center;'> PatientID $pat_id has successfully assigned with DoctorID $doc_id for diagnosis date $date ... ";
  echo str_repeat('&nbsp;', 100);
}


?>


  <?php
  echo str_repeat('&nbsp;', 100);
  echo "<h5>MYSQL Query - Division Query :Show all inpatient’s information who hasn’t been signed with a doctor </h5>";
  echo str_repeat('&nbsp;', 5);
    ?>

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
            ?>

    </tbody>
  </table>
  
  <?php
  echo str_repeat('&nbsp;', 10);
  echo "<h5>MYSQL Query - Simple Query :Show all doctor information </h5>";
  echo str_repeat('&nbsp;', 5);
    ?>

  <table class="table thead-light table-bordered" style="margin-top:100px;margin-bottom:100px;margin-left:100px;margin-right:300px">
    <thead>
      <tr>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">AGE</th>
      </tr>
    </thead>

    <tbody id="queryTable4">
      <?php

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
            ?>

    </tbody>
  </table>


  
  
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>