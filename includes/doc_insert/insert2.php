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
  echo str_repeat('&nbsp;', 100);
  echo "<h5>MYSQL Insert2</h5>";
  echo "<h5>Update Diagnosis Result for Existing Patient</h5>";
  echo str_repeat('&nbsp;', 50);
  echo "Select the Patient's ID and Doctor ID to Update";
  echo str_repeat('&nbsp;', 50);
    ?>

      <form method="POST" style="text-align:left;margin-bottom:300px,margin-top:200px,margin-left:100px;margin-right:600px" >
    <div class="form-group">
      <label for="form1">Patient ID</label>
      <select class="custom-select" name="pat_id" id="form1">
        <?php
$query = "SELECT p.pat_id
from doctor as d, pat_doc_1 as pd1 ,patient_1 as p
where d.doc_id = pd1.doc_id and p.pat_id = pd1.pat_id 
order by p.pat_id
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
    <?php 
          echo "Enter The New Information Below";
           ?>
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
<div class="form-group">
      <label for="form3">Does Patient Need Undertake A Surgery?</label>
      <select class="custom-select" name="if_surge" id="form3">
      <option selected="">Choose...</option>
      <option value="0">No</option>
      <option value="1">Yes</option>
      </select>
</div>
<div class="form-group">
      <label for="form4">Diagnostic Result</label>
      <input type="text" class="form-control" id="form4" name="disease" placeholder="Name of Disease Paitent has">
</div>
<div class="form-group">
      <label for="form5">Treatment</label>
      <input type="text" class="form-control" id="form5" name="treatment" placeholder="Treatment">
</div>
     <input type="submit" name="insert1" class="btn btn-primary btn-lg" value="Update Diagnostic Result" style="text-align:right;margin:10px" />
  </form>

<?php 


$doc_id=$_POST['doc_id'];
$pat_id=$_POST['pat_id'];
$todo=$_POST['todo'];
$month=$_POST['month'];
$dt=$_POST['dt'];
$year=$_POST['year'];
$if_surge=$_POST['if_surge'];
$disease=$_POST['disease'];
$treatment=$_POST['treatment'];
$date="$year-$month-$dt";



if(isset($_POST["insert1"]) && $_POST["insert1"] != "") {

              $sql  = "UPDATE pat_doc_1 SET date = '$date' Where doc_id = '$doc_id' AND pat_id = '$pat_id';";
              $sql .= "UPDATE pat_doc_2 SET if_surge = '$if_surge', disease = '$disease', treatment = '$treatment' Where doc_id = '$doc_id' AND pat_id = '$pat_id';";

              
              // Execute multi query
              if (mysqli_multi_query($conn,$sql))
              {
                do
                  {
                  // Store first result set
                  if ($result=mysqli_store_result($conn)) {
                    // Fetch one and one row
                    while ($row=mysqli_fetch_row($result))
                      {
                      printf("%s\n",$row[0]);
                      }
                    // Free result set
                    mysqli_free_result($result);
                    }
                  }
                while (mysqli_next_result($conn));
              }
                                      //let them know the person has been added. 
                                      echo mysqli_errno($conn);
                                      echo "<span style='color:Green;'> Diagnotic information for PatientID $pat_id has successfully updated ... </span>";
                                      echo str_repeat('&nbsp;', 300);
            }
?>

 <?php
  echo str_repeat('&nbsp;', 100);
  echo "<h5>MYSQL Query - Join Query :Show all diagnostic results </h5>";
  echo str_repeat('&nbsp;', 500);
    ?>

  <table class="table thead-light table-bordered">
    <thead>
      <tr>
        <th scope="col">Patient ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Symptom</th>
        <th scope="col">Disease</th>
        <th scope="col">Treatment</th>
        <th scope="col">Visit Date</th>
        <th scope="col">Diagnosis Date</th>
      </tr>
    </thead>

    <tbody id="queryTable1">
      <?php
        $pat_id=$_POST['pat_id'];


                    $query = "select p1.pat_id,p1.pat_name,p1.visit_date,pd1.date,p2.T,p2.dur_in_hos,p2.symptom,pd2.doc_id,d.doc_name,pd2.disease,pd2.treatment
                    from patient_1 p1,patient_2 p2,pat_doc_1 pd1,pat_doc_2 pd2,doctor as d
                    where p1.pat_id=p2.pat_id and p1.pat_id=pd1.pat_id and p1.pat_id=pd2.pat_id and d.doc_id = pd2.doc_id";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "<td>".$rows["symptom"]."</td>";
                        echo "<td>".$rows["disease"]."</td>";
                        echo "<td>".$rows["treatment"]."</td>";
                        echo "<td>".$rows["visit_date"]."</td>";
                        echo "<td>".$rows["date"]."</td>";
                        echo "</tr>";
            }
            ?>

    </tbody>
  </table>
  <?php
  echo str_repeat('&nbsp;', 100);
  echo "<h5>MYSQL Query - Simple Query :Show all doctor information </h5>";
  echo str_repeat('&nbsp;', 500);
    ?>

  <table class="table thead-light table-bordered">
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