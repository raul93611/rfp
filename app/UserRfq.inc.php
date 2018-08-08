<?php
class UserRfq{
    private $id;
    private $nombre_usuario;
    private $password;
    private $nombres;
    private $apellidos;
    private $cargo;
    private $email;

    public function __construct($id, $nombre_usuario, $password, $nombres, $apellidos, $cargo, $email){
        $this-> id = $id;
        $this-> nombre_usuario = $nombre_usuario;
        $this-> password = $password;
        $this-> nombres = $nombres;
        $this-> apellidos = $apellidos;
        $this-> cargo = $cargo;
        $this-> email = $email;
    }

    public function get_id(){
        return $this-> id;
    }

    public function get_username(){
        return $this-> nombre_usuario;
    }

    public function get_password(){
        return $this-> password;
    }

    public function get_names(){
        return $this-> nombres;
    }

    public function get_last_names(){
        return $this-> apellidos;
    }

    public function get_level(){
        return $this-> cargo;
    }

    public function get_email(){
        return $this-> email;
    }
}
?>
