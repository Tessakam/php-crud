<?php require 'View/includes/header.php'?>

<section class="container">
    <h1 class="text-center mb-5">Class data</h1>

    <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name class</th>
            <th scope="col">Location</th>
            <th scope="col">Teacher ID</th>
            <th scope="col">List of students</th>

        </tr>

        <?php foreach ($classes as $class) :?>
            <tr>
                <th><?php echo $class->getId(); ?></th>
                <td><?php echo $class->getName(); ?></td>
                <td><?php echo $class->getLocation(); ?></td>
                <td><?php echo $class->getTeacherId(); ?></td>
                <td><?php echo $class->getTeacherId(); ?></td>
                </tr>
        <?php endforeach; ?>

        </thead>
    </div>
</section>

<?php require 'View/includes/footer.php'?>

