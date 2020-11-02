<?php include 'includes/header.php'?>
<?php $teacherData = [
        0 => ['name' => 'Sicco', 'email' => 'sicco@gmail.com', 'class' => ['name' => 'Giertz', 'location' => 'Antwerp']],
        1 => ['name' => 'Tim', 'email' => 'tim@gmail.com', 'class' => ['name' => 'lamar', 'location' => 'Gent']],
        2 => ['name' => 'Koen', 'email' => 'koen@gmail.com', 'class' => ['name' => 'Theano', 'location' => 'Brussels']]
]?>
<form action="" method="post">
    <input type="text" name="student_name" placeholder="Name">
    <input type="email" name="student_email" placeholder="Email">
    <select name="teacher">
        <?php foreach ($teacherData AS $i => $data) : ?>
            <option> <?php echo "Teacher  ".$data['name']. "/ Class ". $data['class']['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Save">
</form>
<?php include 'includes/footer.php'?>

