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

function select_lien_departement($num,$offset=0){
    $sql="SELECT last_name,first_name,employees.emp_no,dept_name from employees 
    join departments 
    join dept_emp 
    on dept_emp.dept_no=departments.dept_no on dept_emp.emp_no=employees.emp_no
    where departments.dept_no='$num' LIMIT 20 OFFSET $offset";
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

function select_recherche($mode, $departement, $mot, $min, $max, $offset = 0)
{
    $conn = dbconnect();

    $mot = mysqli_real_escape_string($conn, $mot);
    $departement = mysqli_real_escape_string($conn, $departement);

    if ($mode === "commencer") {
        $sql = "SELECT employees.last_name, employees.emp_no 
                FROM employees 
                JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
                JOIN departments ON departments.dept_no = dept_emp.dept_no  
                WHERE employees.last_name LIKE '$mot%' 
                AND departments.dept_name = '$departement' 
                AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN $min AND $max 
                LIMIT 20 OFFSET $offset";

        $resultat = mysqli_query($conn, $sql);
        return $resultat;
    }
    elseif($mode === "contenir")
    {
        $sql = "SELECT employees.last_name, employees.emp_no, departments.dept_name
                FROM employees 
                JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
                JOIN departments ON departments.dept_no = dept_emp.dept_no  
                WHERE employees.last_name LIKE '%$mot%' 
                AND departments.dept_name = '$departement' 
                AND TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN $min AND $max 
                LIMIT 20 OFFSET $offset";

        $resultat = mysqli_query($conn, $sql);
        return $resultat;
    }
}

?>