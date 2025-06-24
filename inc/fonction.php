<?php 
require("connection.php");
function selectDepartments()
{
    $sql = "SELECT * FROM departments";
    $resultat = mysqli_query(dbconnect(), $sql);
    return $resultat;
}

function select_name_manager(){
    $sql="SELECT last_name,departments.dept_no,departments.dept_name from employees 
    join departments 
    join dept_manager 
    on dept_manager.dept_no=departments.dept_no on dept_manager.emp_no=employees.emp_no
    where dept_manager.to_date>NOW()";

$sql=sprintf($sql);
$resultat = mysqli_query(dbconnect(), $sql);
return $resultat;
}

function select_lien_departement($num){
    $sql="SELECT last_name from employees 
    join departments 
    join dept_emp 
    on dept_emp.dept_no=departments.dept_no on dept_emp.emp_no=employees.emp_no
    where departments.dept_no='$num'";

$sql=sprintf($sql);
$resultat = mysqli_query(dbconnect(), $sql);
return $resultat;
}
?>