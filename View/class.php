<?php require 'View/includes/header.php' ?>

    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Name class</th>
            <th width="20%">Location</th>
            <th width="20%">Teacher</th>
            <th width="20%">List of students</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?php echo htmlspecialchars($class->getName()) ?></td>
                <td><?php echo htmlspecialchars($class->getLocation()) ?></td>
                <td><a href="?page=teacher"><?php echo htmlspecialchars($class->getTeacher()->getName())?></a></td>
                <td><a href="?page=student"><?php echo htmlspecialchars($class->getStudents()->getName())?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php include 'View/includes/footer.php' ?>