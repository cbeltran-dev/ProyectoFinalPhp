<?php

class ConexionDAO {
    private $servidor = "mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb";
    private $username = "avnadmin";
    private $password = "AVNS_quR-7K725n_y2OwxlSu";
    private $charset = "utf8";

    public function OpenConexion() {
        try {
            $mbd = new PDO($this->servidor, $this->username, $this->password);
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            return $mbd;
        } catch (PDOException $exc) {
            print "¡Error!: " . $exc->getMessage() . "<br>";
            die();
        }
    }
}

