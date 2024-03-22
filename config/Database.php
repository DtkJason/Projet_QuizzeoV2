<?php
session_start();

class Database
{
    public $host = "localhost";
    public $user = "root";
    public $name = "quizzeo";
    public $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user);
    }
}
