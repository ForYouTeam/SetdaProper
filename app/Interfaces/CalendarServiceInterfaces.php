<?php

namespace App\Interfaces;

interface CalendarServiceInterfaces
{
    public function createService(array $newDetail);
    public function updateService($idService, array $newDetail);
    public function deleteService($idService);
}
