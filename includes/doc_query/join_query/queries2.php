<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body style="background-color:E7BFAA;">


<div align="center">
<img class="mw-100" src="logo.png"style="width: 90%">
</div>



  <form>
    <input type="button" value="GO BACK " class="btn btn-warning" onclick="history.go(-1);return false;" />
    <input type="button" value="Home " class="btn btn-warning" onclick="window.location.href='https://yifei.uqcloud.net/MDPS/index.php'" />
  </form>

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

        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://yifei.uqcloud.net/MDPS/index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="https://yifei.uqcloud.net/MDPS/includes/logged_in_as_doc.php">Doctor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Query</li>
    </ol>
    </nav>


<div class="container-fluid row">

<div class="d-none d-xl-block col-xl-2 bd-toc">
            <ul class="section-nav">
<li class="toc-entry toc-h2"><a href="#query1">All Surgeries</a></li>
<li class="toc-entry toc-h2"><a href="#query2">Show who is/are the doctors for each patients</a></li>
<li class="toc-entry toc-h2"><a href="#query3">Show all inpatient’s information who hasn’t been signed with a doctor</a></li>
<li class="toc-entry toc-h2"><a href="#query4">Show all doctor information</a></li>

</ul>
</div>

<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">Join Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MDPS/includes/doc_query/division_query/queries.php">Division Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MDPS/includes/doc_query/aggregation_query/queries.php">Aggregation Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MDPS/includes/doc_query/nested_query/queries.php">Nested Query With Grouping</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  <h5 id="query1"><div>All Surgeries<a class="anchorjs-link " href="#query1" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find all surgeries, and show all surgeries information</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queries.php';"/>
    </form>
    <h5 id="query1"><div>Show all patient Information<a class="anchorjs-link " href="#query1" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find information for all patients including inpatient and outpatient</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queries2.php';"/>
    </form>
    <table class="table thead-light table-bordered">
    <thead>
      <tr>
        <th scope="col">Patient ID</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Symptom</th>
        <th scope="col">Disease</th>
        <th scope="col">If Undertake Surgery</th>
        <th scope="col">Treatment</th>
        <th scope="col">Visit Date</th>
        <th scope="col">Diagnosis Date</th>
      </tr>
    </thead>

    <tbody id="queryTable1">
      <?php
        $pat_id=$_POST['pat_id'];


                    $query = "select p1.pat_id,p1.pat_name,p1.visit_date,pd1.date,p1.symptom,pd2.doc_id,d.doc_name,pd2.disease,pd2.if_surge,pd2.treatment
                    from patient_1 p1,pat_doc_1 pd1,pat_doc_2 pd2,doctor as d
                    where p1.pat_id=pd1.pat_id and p1.pat_id=pd2.pat_id and d.doc_id = pd2.doc_id";
                    $result = mysqli_query($conn, $query);
                    
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "<td>".$rows["symptom"]."</td>";
                        echo "<td>".$rows["disease"]."</td>";
                        echo "<td>".$rows["if_surge"]."</td>";
                        echo "<td>".$rows["treatment"]."</td>";
                        echo "<td>".$rows["visit_date"]."</td>";
                        echo "<td>".$rows["date"]."</td>";
                        echo "</tr>";
            }
            ?>

    </tbody>
  </table>
  </div>
</div>

  
</main>

</div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


