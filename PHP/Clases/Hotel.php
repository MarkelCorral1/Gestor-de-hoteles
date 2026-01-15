<?php
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="HotelRepository")
* @ORM\Table(name="hotel")
*/
class Hotel {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_hotel;
    /** @ORM\Column(type="string") */
    private $ciudad;
    /** @ORM\Column(type="string") */
    private $pais;
    /** @ORM\Column(type="text") */
    private $descripcion;
    
    
    public function getId_hotel(): int {
        return $this->id_hotel;
    }
    public function getCiudad(): string {
        return $this->ciudad;
    }
    public function getPais(): string {
        return $this->pais;
    }
    public function getDescripcion(): string {
        return $this->descripcion;

    }

    public function setCiudad($ciudad): void {
        $this->ciudad = $ciudad;
    }
    public function setPais($pais): void {
        $this->pais = $pais;
    }
    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

}