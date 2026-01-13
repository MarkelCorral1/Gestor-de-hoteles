<?php
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="HabitacionRepository")
* @ORM\Table(name="habitacion")
*/
class Habitacion {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_habitacion;
    /** @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="id_hotel", referencedColumnName="id_hotel")
     */
    private $id_hotel;
    /** @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="id_categoria", referencedColumnName="id_categoria")
     */
    private $id_categoria;
    /** @ORM\Column(type="integer") */
    private $metros_cuadrados;
    /** @ORM\Column(type="integer") */
    private $camas;
    
    
    public function getId_habitacion(): int {
        return $this->id_habitacion;
    }
    public function getId_hotel(): Hotel {
        return $this->id_hotel;
    }
    public function getId_categoria(): Categoria {
        return $this->id_categoria;
    }
    public function getMetros_cuadrados(): int {
        return $this->metros_cuadrados;
    }
    public function getCamas(): int {
        return $this->camas;
    }

    public function setId_categoria($id_categoria): void {
        $this->id_categoria = $id_categoria;
    }
    public function setMetros_cuadrados($metros_cuadrados): void {
        $this->metros_cuadrados = $metros_cuadrados;
    }
    public function setCamas($camas): void {
        $this->camas = $camas;
    }
}