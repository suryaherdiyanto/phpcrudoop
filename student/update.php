<?php 
if(isset($_POST['save_student'])){
    require __DIR__.'/../app/models/Student.php';
    $student = new Student;
    $student->update($_POST['id'],[
        'name' => $_POST['name'], 
        'genre' => $_POST['genre'], 
        'address' => $_POST['address']
        ]
    );
}
header('Location: index.php');
?>