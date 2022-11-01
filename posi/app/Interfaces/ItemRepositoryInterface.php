<?php

namespace App\Interfaces;

interface ItemRepositoryInterface
{
    public function getAllItems(); //fetch all data
    public function createItems($data); //insert new data
    public function showItems($id); //fetch only specified data
    public function updateItems($id, $data); //update specified data
    public function deleteItems($id); //delete specified data
}