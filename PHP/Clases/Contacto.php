<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contacto")
 */
class Contacto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_contacto;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="text")
     */
    private $mensaje;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_envio;

    public function __construct()
    {
        // Se asigna la fecha y hora actual automáticamente al crear el objeto
        $this->fecha_envio = new \DateTime();
    }

    // --- GETTERS ---

    public function getIdContacto() { return $this->id_contacto; }
    
    public function getNombre() { return $this->nombre; }
    
    public function getEmail() { return $this->email; }
    
    public function getTelefono() { return $this->telefono; }
    
    public function getMensaje() { return $this->mensaje; }
    
    public function getFechaEnvio() { return $this->fecha_envio; }

    // --- SETTERS ---

    public function setNombre($nombre) { $this->nombre = $nombre; }
    
    public function setEmail($email) { $this->email = $email; }
    
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    
    public function setMensaje($mensaje) { $this->mensaje = $mensaje; }
}