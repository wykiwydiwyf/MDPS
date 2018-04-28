<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body>

  <h1 style="color:navy;text-align:center;">INFS7901 Project: Medical Database Processing System(MDPS) </h1>

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

        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://yifei.uqcloud.net/MDPS/index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="https://yifei.uqcloud.net/MDPS/includes/logged_in_as_doc.php">Doctor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Query</li>
    </ol>
    </nav>


<div class="d-none d-xl-block col-xl-2 bd-toc">
            <ul class="section-nav">
<li class="toc-entry toc-h2"><a href="#query1">All Surgeries</a></li>
<li class="toc-entry toc-h2"><a href="#query2">Show who is/are the doctors for each patients</a></li>
<li class="toc-entry toc-h2"><a href="#query3">Show all inpatient’s information who hasn’t been signed with a doctor</a></li>
<li class="toc-entry toc-h2"><a href="#query4">Show all doctor information</a></li>

</ul>
</div>

<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

<h2 id="query1"><div>All Surgeries<a class="anchorjs-link " href="#query1" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
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
  <h2 id="query2"><div>Show who is/are the doctors for each patients<a class="anchorjs-link " href="#query2" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
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

<h2 id="query3"><div>Show all inpatient’s information who hasn’t been signed with a doctor<a class="anchorjs-link " href="#query3" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
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
                        echo "</tr>";
                    }
            }
            ?>

    </tbody>
  </table>


<h2 id="query4"><div>Show all doctor information<a class="anchorjs-link " href="#query4" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
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

    <tbody id="queryTable4">
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



  
</main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>




