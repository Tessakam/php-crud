<?php include 'includes/header.php'?>
    <form action="" method="post">
        <input type="text" name="student_name" placeholder="Student Name" required>
        <input type="email" name="student_email" placeholder="Student Email" required>
        <select name="class_id">
            <?php foreach ($classes as $class) :?>
                <option value="<?php echo $class['id']?>"><?php echo $class['name']?></option>
            <?php endforeach;?>
        </select>
        <input type="submit" value="Save">
    </form>

    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Student Name</th>
            <th width="20%">Student Email</th>
            <th width="20%">Class</th>
            <th width="20%">Teacher</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students AS $student):?>
            <tr>
                <td><?php echo htmlspecialchars($student['name'])?></td>
                <td><?php echo htmlspecialchars($student['email'])?></td>
                <td><a href="?page=classId=<?php echo $student['class_id']?>"><?php echo $student['class_name']?></a></td>
                <td><a href="?page=teacherId=<?php echo $student['teacher_id']?>"><?php echo $student['teacher_name']?></a></td>
                <td>
                    <a href="?id=<?php echo $student['id']?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $student['id']?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php include 'includes/footer.php'?>