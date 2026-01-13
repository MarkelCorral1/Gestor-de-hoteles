<?php
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="UsuarioRepository")
* @ORM\Table(name="usuario")
*/
class Usuario {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_usuario;
    /** @ORM\Column(type="string") */
    private $username;
    /** @ORM\Column(type="string") */
    private $password_hash;
    /** @ORM\Column(type="string") */
    private $tipo;
    
    
    public function getId_usuario(): int {
        return $this->id_usuario;
    }
    public function getUsername(): string {
        return $this->username;
    }
    public function getPassword_hash(): string {
        return $this->password_hash;
    }
    public function getTipo(): string {
        return $this->tipo;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }
    public function setPassword_hash($password_hash): void {
        $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
        $this->password_hash = $password_hash;
    }
    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }
}