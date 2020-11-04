<?php include 'includes/header.php' ?>
<form action="" method="post">
    <input type="text" name="teacher_name" placeholder="Teacher Name" required>
    <input type="email" name="teacher_email" placeholder="Teacher Email" required>
    <select name="class_id">
        <?php foreach ($classes as $class) : ?>
            <option value="<?php echo $class['id'] ?>"><?php echo $class['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Save">
</form>

<table class="table table-striped table-wide">
    <thead>
    <tr>
        <th width="20%">Teacher Name</th>
        <th width="20%">Teacher Email</th>
        <th width="20%">Class Name</th>
        <th width="20%">Class Location</th>
        <td colspan="2" width="20%"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td><?php echo htmlspecialchars($teacher['name']) ?></td>
            <td><?php echo htmlspecialchars($teacher['email']) ?></td>
            <td><a href="?page=class&Id=<?php echo $teacher['class_id'] ?>"><?php echo $teacher['class_name'] ?></a>
            </td>
            <td><?php echo $teacher['class_location'] ?></td>
            <td>

                <a href="?page=teacher&id=<?php echo $teacher['id'] ?>" class="btn btn-primary">Update</a>
            </td>

            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

        <!-- Trying to add form for update-->
    <form action="" method="get">
    <?php if (isset($_GET['update'])): ?>
    <h3>Class : </h3>
    <p> <?php echo $class ?></p>
    <h3>Students</h3>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['email'] ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </table>
    </tbody>
    <?php include 'includes/footer.php' ?>
