<?php include 'includes/header.php'?>
<form action="" method="post">
    <input type="text" name="student_name" placeholder="Name">
    <input type="email" name="student_email" placeholder="Email">
    <select name="teacher">
        <?php foreach ($teacherData as $data) : ?>
            <option name="teach"><?php echo "Teacher  ".$data['name']. " / Class ". $data['class']['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Save">
</form>
<?php include 'includes/footer.php'?>

