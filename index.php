<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INFS7901-Tables</title>
  </head>
<body>


  <h1 style="color:navy;text-align:center;">INFS7901 Project: Medical Database Processing System(MEPS) </h1>

<?php 
function imageResize($width, $height, $target) {

//takes the larger size of the width and height and applies the
formula accordingly...this is so this script will work
dynamically with any size image

if ($width > $height) {
$percentage = ($target / $width);
} else {
$percentage = ($target / $height);
}

//gets the new value and applies the percentage, then rounds the value
$width = round($width * $percentage);
$height = round($height * $percentage);

//returns the new sizes in html image tag format...this is so you
can plug this function inside an image tag and just get the

return "width="$width" height="$height"";

}

<?php 

//get the image size of the picture and load it into an array
$mysock = getimagesize("https://d371ua0s3oj08z.cloudfront.net/styles/hero/hero.jpg?itok=CK1mVAzA");

?>
<img src="https://d371ua0s3oj08z.cloudfront.net/styles/hero/hero.jpg?itok=CK1mVAzA" <?php imageResize($mysock[0],
$mysock[1], 150); ?>>

  <form style="margin-buttom:200px">
    <input type="button" value="GO BACK " class="btn btn-outline-warning" onclick="history.go(-1);return false;" />
    <input type="button" value="Home " class="btn btn-outline-warning" onclick="window.location.href='https://yifei.uqcloud.net/MDPS/index.php'" />
  </form>

  <div class="container-fluid" style="background-color:lightblue">
  <form action="includes/logged_in_as_doc.php" method="post" style="margin:200px">
    <input type="submit" class="btn btn-warning btn-lg btn-block" value="Log in as Doctor" style="text-align:center;margin:10px" />
  </form>

  
  <form action="includes/logged_in_as_pat.php" method="post" style="margin:200px">
    <input type="submit" class="btn btn-warning btn-lg btn-block" value="Log in as Patient" style="text-align:center;margin:10px" />
  </form>
  </div>


  <img src="..." class="img-fluid" alt="Responsive image">


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>