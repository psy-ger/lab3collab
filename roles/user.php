<?php
class User
{
    protected $name;
    protected $surname;

    function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function greeting()
    {
        echo "Здравствуйте, ";
    }
}