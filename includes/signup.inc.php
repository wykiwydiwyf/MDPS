<?php 

        
$mysqli = new mysqli("localhost", "root", "d74dbdad52b2dfe8", "project_hospital");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];
$symptom=$_POST['symptom'];
$T=$_POST['T'];
$dur_in_hos=$_POST['dur_in_hos'];





$query  = "INSERT INTO patient_1(pat_id,hos_name,name,age,gender,address,visit_date) VALUES(NULL,(SELECT hos_name FROM hospital),'$pat_name','$age','$gender','$address','$visit_date')";
$query .= "INSERT INTO patient_2(pat_id,hos_name,symptom,dur_in_hos,T) VALUES(NULL,(SELECT hos_name FROM hospital),'symptom','T','dur_in_hos')";

/* execute multi query */
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}

//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";
/* close connection */
$mysqli->close();
?>