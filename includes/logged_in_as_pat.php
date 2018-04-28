<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body>
  
<h1 style="color:navy;text-align:center;">INFS7901 Project: Medical Database Processing System(MDPS) </h1>
  


  <form>
    <input type="button" value="GO BACK " class="btn btn-outline-warning" onclick="history.go(-1);return false;" />
    <input type="button" value="Home " class="btn btn-outline-warning" onclick="window.location.href='https://yifei.uqcloud.net/MDPS/index.php'" />
  </form>

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://yifei.uqcloud.net/MDPS/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Patient</li>
  </ol>
</nav>

<div class="container-fluid col-12 col-md-9 col-xl-8 py-md-3 bd-content" style="background-color:lightblue">
  <form action="pat_query/queries.php" method="post" style="margin:100px">
    <input type="submit" class="btn btn-warning btn-lg btn-block" value="Find Your Information with Patient ID" style="text-align:center;margin:10px" />
  </form>
  
  <form action="pat_insert/insert1.php" method="post" style="margin:100px">
    <input type="submit" class="btn btn-warning btn-lg btn-block" value="New Patient Enrollment" style="text-align:center;margin:10px" />
  </form>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>