<?php
use Doctrine\ORM\EntityRepository;

class HabitacionRepository extends EntityRepository{
    public function habitacionPorHotel($id_hotel) {
        return $this->getEntityManager()
            ->createQuery('SELECT h FROM Habitacion h WHERE h.id_hotel = :id_hotel')
            ->setParameter('id_hotel', $id_hotel)
            ->getResult();
    }
}