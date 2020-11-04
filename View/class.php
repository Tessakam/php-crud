<?php require 'View/includes/header.php' ?>
    <form action="" method="post">
        <input type="text" name="class_name" placeholder="Class Name" required>
        <input type="text" name="class_location" placeholder="Class Location" required>
        <input type="submit" value="Save">
    </form>

    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Class Name</th>
            <th width="20%">Class Location</th>
            <th width="20%">Teacher Name</th>
            <th width="20%">Students</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?php echo htmlspecialchars($class['name']) ?></td>
                <td><?php echo htmlspecialchars($class['location']) ?></td>
                <td><a href="?page=teacherId=<?php echo isset($class['teacher_id'])? $class['teacher_id'] : ""?>"><?php echo isset($class['teacher_name'])? $class['teacher_name']: "" ?></a></td>
                <td><?php echo isset($class['student_num'])? $class['student_num']: "" ?></td>
                <td>
                        <a href="?id=<?php echo $class['id'] ?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $class['id'] ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php include 'View/includes/footer.php' ?>