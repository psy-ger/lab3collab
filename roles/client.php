<?php
@session_start();
class Client extends  User
{
    public function clientGreeting()
    {
        if ($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Клиент " . $this->name . " " . $this->surname . ". Вы можете на сайте просматривать информацию доступную пользователям.";
            echo '<a href="../crud/editlist.php" method="POST">Продолжить</a>';
        } elseif ($_SESSION['NowLang'] == "ua") {
            echo "Вітаю, Кліент " . $this->name . " " . $this->surname . ". Ви можете на сайті переглядати інформацію доступну користувачам.";
            echo '<a href="../crud/editlist.php" method="POST">Продолжить</a>';
        } else {
            echo "Hello, Client " . $this->name . " " . $this->surname . ". You can view information available to users on the site.";
            echo '<a href="../crud/editlist.php" method="POST">Продолжить</a>';
        }
    }
}
?>

