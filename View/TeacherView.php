<?php

// teacher name, teacher email, class with link

 include 'includes/header.php'?>
    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="20%">Teacher Name</th>
            <th width="20%">Teach Email</th>
            <th width="20%">Class</th>
            <td colspan="2" width="20%"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($teachers AS $teacher):?>
            <tr>
                <td><?php echo htmlspecialchars($teacher->getName())?></td>
                <td><?php echo htmlspecialchars($teacher->getEmail())?></td>
                <td><a href=""><?php echo htmlspecialchars($teacher->getClass()->getName())?></a></td>
                <td>
                    <a href="?id=<?php echo $teacher->getId()?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $teacher->getId()?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php include 'includes/footer.php'?>
