<?php
class IntroController extends Controller
{
    public function process($parameters)
    {
        if(!empty($_SESSION["user"]))
        {
            $intro = new intro();

            $sql0 = "SELECT b.idBosses, b.nameBoss, d.idDifficulty, d.nameDifficulty, ub.favorite FROM users u INNER JOIN users_has_bosses ub USING(idUsers) INNER JOIN bosses b USING(idBosses) INNER JOIN difficulty d ON(b.difficulty = d.idDifficulty) WHERE u.idUsers = '" . $_SESSION["user"]["idUsers"] . "'";
            $sql1 = "SELECT u.idUsers, ch.idCharacters, ch.nameCharacter, b.idBosses FROM users u INNER JOIN characters ch ON(u.idUsers = ch.userCharacter) LEFT JOIN characters_has_bosses chb USING(idCharacters) LEFT JOIN bosses b USING(idBosses) WHERE u.idUsers = '" . $_SESSION["user"]["idUsers"] . "'";

            if (isset($_POST["favorite"])) {
                if($_POST["favorite"] > 0)
                {
                    $_POST["favorite"] = null;
                    $intro->newFavorite($_POST);
                    $this->redirect("");
                }
                else
                {
                    $intro->delFavorite($_POST["idBosses"], $_POST["idCharacters"]);
                    $this->redirect("");
                }
                    
            }

            $this->data["bosses"] = Db::queryAll($sql0);
            $this->data["characters"] = Db::queryAll($sql1);

            $this->view = "favorite";
        }
        else
        {   
            $this->view = "intro";
        }
    }
}
