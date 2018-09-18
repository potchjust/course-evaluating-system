<?php
/**
 * Created by IntelliJ IDEA.
 * User: Noblesse
 * Date: 16/09/2018
 * Time: 21:33
 */

namespace App;


use PDO;

class Database
{


    /**
     * @var string
     */
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_name, $db_host = "localhost", $db_user = "root", $db_pass = '')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    private function getPDO(): PDO
    {
        if ($this->pdo === null) {
            try {
                $pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_pass,
                    [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
                $this->pdo = $pdo;
                return $this->pdo;
            } catch (\PDOException $exception) {
                mail("potchjust@gmail.com", "Error", $exception->getMessage());
            }

        }
        return $this->pdo;
    }

    public function query($statement,$attributes=false)
    {
        if ($attributes)
        {
            $req=$this->getPDO()->prepare($statement);
           $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute($attributes);
            $res=$req->fetch();
            return $res;
        }
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $res=$req->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

}