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
        <a class="nav-link" href="/division_query/queries.php">Division Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/aggregation_query/queries.php">Aggregation Query</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  <h5 id="query1"><div>All Surgeries<a class="anchorjs-link " href="#query1" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h5>
    <p class="card-text">Find all surgeries, and show all surgeries information</p>
    <form action="" method="post">
    <input type="button" name="query1" class="btn btn-primary" value="Run Query" style="text-align:right;margin:10px" onclick="location.href='/join_query/queries.php';"/>
    </form>
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


