<?php
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="ReservaRepository")
* @ORM\Table(name="reserva")
*/
class Reserva {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id_reserva;
    /** @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     */
    private $id_usuario;
    /** @ORM\ManyToOne(targetEntity="Habitacion")
     * @ORM\JoinColumn(name="id_habitacion", referencedColumnName="id_habitacion")
     */
    private $id_habitacion;
    /** @ORM\Column(type="date") */
    private $fecha_inicio;
    /** @ORM\Column(type="date") */
    private $fecha_final;
    
    
    public function getId_reserva(): int {
        return $this->id_reserva;
    }
    public function getId_usuario(): Usuario {
        return $this->id_usuario;
    }
    public function getId_habitacion(): Habitacion {
        return $this->id_habitacion;
    }
    public function getFecha_inicio(): DateTime {
        return $this->fecha_inicio;
    }
    public function getFecha_final(): DateTime {
        return $this->fecha_final;
    }

    public function setId_categoria($id_habitacion): void {
        $this->id_habitacion = $id_habitacion;
    }
    public function setFecha_inicio($fecha_inicio): void {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function setFecha_final($fecha_final): void {
        $this->fecha_final = $fecha_final;
    }
}