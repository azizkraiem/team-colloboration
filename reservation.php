<?php
class Reservation
{
    private ?int $reservation_id = null;
    private ?int $car_id = null;
    private ?int $client_id = null;
    private ?boolean $withDriver = null;
    private ?Date $dateD = null;
    private ?Date $dateF = null;
    private ?double $total = null;
    private ?varChar $adresse = null;

    public function __construct($id , $carId, $clientId, $Driver, $dateDebut,$dateFin,$address, $totalPrix)
    {
        $this->reservation_id = $id;
        $this->car_id = $carId;
        $this->client_id = $clientId;
        $this->withDriver = $Driver;
        $this->dateD = $dateDebut;
        $this->dateF = $dateFin;
       
        $this->adresse=$address;
        $this->total = $totalPrix;
    }

    /**
     * Get the value of idCourse
     */
    public function getReservation()
    {
        return $this->reservation_id;
    }

}
