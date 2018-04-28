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
    <li class="breadcrumb-item active" aria-current="page">Proposal</li>
  </ol>
</nav>


  
  <div class="container-fluid col-12 col-md-9 col-xl-8 py-md-3 bd-content" style="background-color:lightblue">
  <h2 id="proposal"><div>INFS7901: Project Proposal<a class="anchorjs-link " href="#proposal" aria-label="Anchor" data-anchorjs-icon="#" style="padding-left: 0.375em;"></a></div></h2>
  <p>	In our project, a hospital Medical Data Processing System (MDPS) will be introduced as the domain of this project. In this system, patient’s medical data will be processed and stored to the hospital.
  </p>
  <p>In this case, the patient’s diagnostic data will be simulated. Patients are composed of inpatients and outpatients, and inpatients will be specified with the length of stay. All patients have their own personal information, symptoms, and medical records. This information will be diagnosed by the doctor and diagnostic results will also be given. These results include what kind of disease the patient has, whether the patient needs to undergo surgery, and what kind of treatment patient needs to receive. At the same time, the diagnostician also needs to provide his name, age and id. All data will be stored and passed on to the department to which the doctors belong and will eventually be managed by the hospital.
  </p>
  <p>In MDPS, users are divided into two categories: patients and doctors. Patients can log in and modify their own user information, symptoms and medical records. User logs in as a doctor will have access to all patients' data for further modification or deletion. Also, users of doctor can do the same operations with the diagnostic results. The MDPS can also help the doctor to query and analyze all the data which currently available, and these results can be graphically displayed to the doctor intuitively.
  </p>
  <p>MySQL and PHP will be using to build MDPS in this project, and no any other special software or hardware will be used.
  </p>
  </div>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>