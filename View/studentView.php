<?php include 'includes/header.php'?>
    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Student Name</th>
            <th width="20%">Student Email</th>
            <th width="20%">Teacher</th>
            <th width="20%">Class</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students AS $student):?>
            <tr>
                <td><?php echo htmlspecialchars($student->getName())?></td>
                <td><?php echo htmlspecialchars($student->getEmail())?></td>
                <td><a href="?page=classid=<?php //echo $student->getTeacher()->getId()?>"><?php echo htmlspecialchars($student->getTeacher()->getName())?></a></td>
                <td><a href="?id=<?php //echo $student->getTeacher()->getClass()->getId()?>"><?php echo htmlspecialchars($student->getTeacher()->getClass()->getName())?></a></td>
                <td>
                    <a href="?id=<?php echo $student->getId()?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $student->getId()?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php include 'includes/footer.php'?>