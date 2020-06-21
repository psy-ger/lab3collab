<?php
@session_start();
class Admin  extends User
{
    public function adminGreeting()
    {
        if($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Админ " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.";
            echo '<a href="../crud/crud.php">Продолжить</a>';

        }
        elseif ($_SESSION['NowLang'] == "ua"){
            echo "Вітаю, Адмін ". $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.";
            echo '<a href="../crud/crud.php">Продовжити</a>';

        }
        else{
            echo "Hello, Admin " . $this->name . " " . $this->surname . ". You can modify, delete and create clients on the site.";
            echo '<a href="../crud/crud.php">Continue</a>';
        }
    }
}
