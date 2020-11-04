<?php require 'View/includes/header.php' ?>
declare(strict_types=1);

    <!--Name class (Giertz, Lamarr, ...)
    Location (Antwerp, Gent, Genk, Brussels, Liege)
    Assigned teacher (clickable link)
    List of assigned students (clickable link)-->

<!-- card with info becode student-->
<?php if (isset($_GET['class_id'])) {
    $id = $_GET['class_id'];
    echo $id;
} else {
    $id = 0;
}

?>
    <div class="card" style="width: 18rem;">
        <div> <?php $userId?> </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name class: <?php echo htmlspecialchars($class['name']) ?> </li>
            <li class="list-group-item">Location: <?php echo htmlspecialchars($class['location']) ?></li>
            <li class="list-group-item">Teacher: <?php echo $class['teacher_name'] ?> </li>
            <li class="list-group-item">Students: <?php echo $class['teacher_name'] ?> </li>
        </ul>
    </div>


 require 'View/includes/footer.php' ?>