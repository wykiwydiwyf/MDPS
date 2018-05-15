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
            <li class="toc-entry toc-h5 mt-3 mb-3 active"><a href="#">FUNCTION:</a></li>
<li class="toc-entry toc-h3 mt-3 mb-3"><a href="/MDPS/includes/doc_query/join_query/queries.php">All Surgeries Information</a></li>
<li class="toc-entry toc-h3 mt-3 mb-3"><a href="/MDPS/includes/doc_query/join_query/queries2.php">All patient Information</a></li>
<li class="toc-entry toc-h3 mt-3 mb-3"><a href="/MDPS/includes/doc_query/division_query/queries1.php">Patient Diagnosed by All Doctors</a></li>
<li class="toc-entry toc-h3 mt-3 mb-3"><a href="/MDPS/includes/doc_query/aggregation_query/queries1.php">Inpatient Who Stay Longest Time</a></li>
<li class="toc-entry toc-h3 mt-3 mb-3"><a href="/MDPS/includes/doc_query/nested_query/queries1.php">Doctor Has Least Patient</a></li>

</ul>
</div>

<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

  <div class="card-body">
    <h5 id="query1"><div>Doctor Has Least Patient<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find the doctor who diagnosed least number of patients and show his information</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queriesmin.php';"/>
    </form>

    <h5 id="query1"><div>Doctor Has Most Patient<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find the doctor who diagnosed most patients and show his information</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queriesmax.php';"/>
    </form>

    <h5 id="query1"><div>Average Patient Doctor Has<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find the average number of patients doctor diognised</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queriesave.php';"/>
    </form>

    <h5 id="query1"><div>Number of Patient Certain Doctor Has<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Given the doctor's ID, find the number of patients that diagnosed by that certain doctor</p>
    <div class="row justify-content-md-center">
    <form action="" method="post">
      <div class="col col-lg-auto">
      <input type="text" class="form-control" placeholder="Input doctor ID here" name="age" aria-label="Input id" aria-describedby="btnGroupAddon" style="padding-left: 0.375em;">
      </div>
      <div class="btn-group " role="group" aria-label="First group">
      <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='queries.php';"/>
    </form>
    <table class="table thead-light table-bordered" >
    <thead>
      <tr>
        <th scope="col">Doctor ID</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Age</th>

      </tr>
    </thead>

    <tbody id="queryTable1">
      <?php
                    $query = "SELECT *
                    FROM doctor
                    WHERE doc_id=(
                    SELECT doc_id
                    FROM pat_doc_1
                    GROUP BY doc_id
                    HAVING COUNT(*) >= ALL(SELECT COUNT(*)
                    FROM pat_doc_1
                    GROUP BY doc_id))";
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

    </div>
  </div>
  </div>


  </div>
</div>


  
</main>

</div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


