<?php


class HomepageController
{
    public function render()
    {
        $pdo = Database::openConnection();

        //load the view
        require 'View/homepage.php';
    }
}