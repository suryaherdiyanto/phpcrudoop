<?php 
if(isset($_POST['delete_student'])){
    require __DIR__.'/../app/models/Student.php';
    $student = new Student;
    $student->delete($_POST['id']);
}
header('Location: index.php');
?>