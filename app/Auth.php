<?php
/**
 * Created by IntelliJ IDEA.
 * User: Noblesse
 * Date: 16/09/2018
 * Time: 22:11
 */

namespace App;


class Auth
{

    //classe d'authentification
    //devra se connecter à la base de donnée
    private $db;
    private $session;

    public function __construct(Database $db,Session $session)
    {
        $this->db=$db;
        $this->session=$session;

    }

    public function login($email,$pass)
    {
        $user=$this->db->query("select * from students where student_email=? and student_password =?",[$email,$pass]);
        if ($user)
        {
            echo "Je l'ai trouvé ce bg de $user->student_name";
            $this->session->set('id',$user->student_name);
        }
    }

    public function logged()
    {
      return $this->session->get('id');
    }
}