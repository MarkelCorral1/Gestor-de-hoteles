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

    public function disponibilidadHotelCategoria($fechaInicio, $fechaFin, $id_hotel, $id_categoria) {
        $resultado = $this->getEntityManager()->createQuery(
            'SELECT r FROM Reserva r
            JOIN r.id_habitacion h
            WHERE h.id_hotel = :id_hotel
            AND h.id_categoria = :id_categoria
            AND r.fecha_inicio < :fechaFinal
            AND r.fecha_final > :fechaInicio')
           ->setParameter('id_hotel', $id_hotel)
           ->setParameter('id_categoria', $id_categoria)
           ->setParameter('fechaFinal', $fechaFin)
           ->setParameter('fechaInicio', $fechaInicio);

        $resultado = $resultado->getResult();

        return count($resultado) === 0;
    }
}