<?php 
require __DIR__.'/../app/models/Student.php';
$student = new Student;
$student = $student->getById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Create Student</title>
</head>
<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="update.php" class="form" method="post">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $student->name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Genre</label><br>
                                <label class="form-check-label">
                                    <input type="radio" name="genre" <?php echo $student->genre == 1 ? 'checked':''; ?> value="1" id="genre" class="form-check-inline"> Male
                                </label>
                                <label for="genre2">
                                    <input type="radio" name="genre" <?php echo $student->genre == 0 ? 'checked':''; ?> value="0" id="genre" class="form-check-inline"> Female
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control"><?php echo $student->address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save" name="save_student" class="btn btn-light">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>