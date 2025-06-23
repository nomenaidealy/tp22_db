<?php 
require("connection.php");
function selectDepartments()
{
    $sql = "SELECT * FROM departments";
    $resultat = mysqli_query(dbconnect(), $sql);
    return $resultat;
}
?>