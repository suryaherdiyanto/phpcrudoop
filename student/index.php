<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Student</title>
</head>
<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <a href="create.php" class="btn btn-primary btn-sm mb-4">Create Student</a>
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Address</th>
                        <th>Action</th>
                        <?php 
                            require __DIR__.'/../app/models/Student.php';
                            $student = new Student;
                            foreach($student->all() as $data):
                        ?>
                        <tr>
                            <td><?php echo $data->id; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo ($data->genre == 1) ? 'Male':'Female'; ?></td>
                            <td><?php echo $data->address; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="edit.php?id=<?php echo $data->id ?>" class="btn btn-light btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-id="<?php echo $data->id; ?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div id="modal" class="modal fade in" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Delete this record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="delete.php" method="post" class="form form-inline">
                    <input type="hidden" id="hiddenId" name="id">
                    <button type="submit" name="delete_student" class="btn btn-primary">Yes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $('.delete').on('click', function(e){
            e.preventDefault();
            $('#hiddenId').val($(this).attr('data-id'));
            $('#modal').modal();
        });
    </script>
</body>
</html>