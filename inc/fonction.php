<?php 
require("connection.php");
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
    $sql="SELECT last_name,first_name,employees.emp_no from employees 
    join departments 
    join dept_emp 
    on dept_emp.dept_no=departments.dept_no on dept_emp.emp_no=employees.emp_no
    where departments.dept_no='$num'";
$sql=sprintf($sql);
$resultat = mysqli_query(dbconnect(), $sql);
return $resultat;
}

function select_lien_employer($num){
    $sql="SELECT e.first_name,e.last_name,e.gender,e.birth_date,title,s.salary,s.from_date,  
    s.to_date from titles 
    join employees
    as e on e.emp_no=titles.emp_no
    join salaries
    as s on s.emp_no=titles.emp_no
     where e.emp_no=$num";
$sql=sprintf($sql);
$resultat = mysqli_query(dbconnect(), $sql);
return $resultat;
}

function select_department_name()
{
    $sql = "SELECT dept_name FROM departments ";
    $resultat = mysqli_query(dbconnect(), $sql);
    return $resultat;
}
function select_age($emp_no)
{
    $sql = "SELECT YEAR(NOW())- YEAR(birth_date) from employees ";
    $resultat = mysqli_query(dbconnect(), $sql);
    return $resultat;
}
function select_recherche($mode , $departement , $mot , $min , $max, $age)
{
    if($mode === "commencer")
    {
        $sql = "SELECT employees.last_name, employees.emp_no FROM employees join dept_emp ON employees.emp_no = dept_emp.emp_no 
        join departments ON departments.dept_no = dept_emp.dept_no  WHERE employees.last_name LIKE '$mot%' AND departments.dept_name = '%s' AND %s < %s < %s LIMIT 20  ";
        $sql=sprintf($sql,$departement,$min,$age,$max);
         $resultat = mysqli_query(dbconnect(), $sql);
         return $resultat;
    }
}
?>