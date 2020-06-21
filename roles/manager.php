<?php
@session_start();
class Manager  extends User
{
    public function managerGreeting()
    {
        if ($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Менеджер " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.";
            echo '<a href="../crud/crudmanager.php" method="POST">Продолжить</a>';
        } elseif ($_SESSION['NowLang'] == "ua") {
            echo "Вітаю, Менеджер " . $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.";
            echo '<a href="../crud/crudmanager.php" method="POST">Продовжити</a>';
        } else {
            echo "Hello, Manager " . $this->name . " " . $this->surname . ". You can modify, delete and create clients on the site.";
            echo '<a href="../crud/crudmanager.php" method="POST">Continue</a>';
        }
    }
}