<?php
include '../config.php';
include '../Model/reservation.php';

class Reservationc
{
  

    public function listCourses()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   
}
