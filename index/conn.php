<?php

class Dbh {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "csapatsport";
        $this->charset = "utf8";

        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            echo "Csatlakozási hiba: " . $e->getMessage();
        }

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }


}
?>