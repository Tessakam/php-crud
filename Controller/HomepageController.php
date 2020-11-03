<?php


class HomepageController
{
    public function render()
    {
        $pdo = $this->openConnection();

        //load the view
        require 'View/homepage.php';
    }
}