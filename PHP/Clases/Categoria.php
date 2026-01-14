<?php
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="CategoriaRepository")
* @ORM\Table(name="categoria")
*/
class Categoria {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_categoria;
    /** @ORM\Column(type="string") */
    private $nombre;
    /** @ORM\Column(type="boolean") */
    private $balcon;
    /** @ORM\Column(type="boolean") */
    private $yakushi;
    /** @ORM\Column(type="boolean") */
    private $spa;
    /** @ORM\Column(type="boolean") */
    private $mayordomo;
    /** @ORM\Column(type="boolean") */
    private $limusina;
    /** @ORM\Column(type="boolean") */
    private $helicoptero;
    /** @ORM\Column(type="integer") */
    private $precio_base;
    
    
    public function getId_categoria(): int {
        return $this->id_categoria;
    }
    public function getNombre(): string {
        return $this->nombre;
    }
    public function getBalcon(): bool {
        return $this->balcon;
    }
    public function getYakushi(): bool {
        return $this->yakushi;
    }
    public function getSpa(): bool {
        return $this->spa;
    }
    public function getMayordomo(): bool {
        return $this->mayordomo;
    }
    public function getLimusina(): bool {
        return $this->limusina;
    }
    public function getHelicoptero(): bool {
        return $this->helicoptero;
    }
    public function getPrecio_base(): int {
        return $this->precio_base;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
    public function setBalcon($balcon): void {
        $this->balcon = $balcon;
    }
    public function setYakushi($yakushi): void {
        $this->yakushi = $yakushi;
    }
    public function setSpa($spa): void {
        $this->spa = $spa;
    }
    public function setMayordomo($mayordomo): void {
        $this->mayordomo = $mayordomo;
    }
    public function setLimusina($limusina): void {
        $this->limusina = $limusina;
    }
    public function setHelicoptero($helicoptero): void {
        $this->helicoptero = $helicoptero;
    }
}