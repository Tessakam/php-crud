<?php require 'View/includes/header.php' ?>
declare(strict_types=1);

    <!--Name class (Giertz, Lamarr, ...)
    Location (Antwerp, Gent, Genk, Brussels, Liege)
    Assigned teacher (clickable link)
    List of assigned students (clickable link)-->
    ?page=classId=1
<!-- card with info class-->$_GET['page'] == 'class'

    <div class="card" style="width: 18rem;">
        <div> <?php $classId?> </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name class: <?php echo htmlspecialchars($classId['name']) ?> </li>
            <li class="list-group-item">Location: <?php echo htmlspecialchars($classId['location']) ?></li>
            <li class="list-group-item">Teacher: <?php echo $classId['teacher_name'] ?> </li>
            <li class="list-group-item">Students: <?php echo $classId->getNa['teacher_name'] ?> </li>
        </ul>
    </div>


<?php require 'View/includes/footer.php' ?>