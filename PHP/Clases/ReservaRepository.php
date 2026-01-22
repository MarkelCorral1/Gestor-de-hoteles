<?php
use Doctrine\ORM\EntityRepository;

class ReservaRepository extends EntityRepository{

    // Este metodo se usara cuando se cree una nueva reserva para comprobar si la habitacion
    // esta disponible en las fechas indicadas
    // Si devuelve true, la habitacion esta disponible, si devuelve false, no lo esta
    public function comprobarDisponibilidad($fechaInicio, $fechaFin, $id_habitacion) {
        $resultado = $this->getEntityManager()->createQuery(
            'SELECT r FROM Reserva r
            WHERE r.id_habitacion = :id_habitacion
            AND r.fecha_inicio < :fechaFinal
            AND r.fecha_final > :fechaInicio')
           ->setParameter('id_habitacion', $id_habitacion)
           ->setParameter('fechaFinal', $fechaFin)
           ->setParameter('fechaInicio', $fechaInicio);

        $resultado = $resultado->getResult();

        return count($resultado) === 0;
    }
}