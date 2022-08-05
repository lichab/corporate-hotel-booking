<?php

namespace App\Repository;

use App\Hotel;

interface HotelRepository
{
 public function save(Hotel $hotel):void;
}