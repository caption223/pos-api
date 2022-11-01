<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ItemRepository implements ItemRepositoryInterface
{
    public function getAllItems()
    {
        return Item::all();
    }

    public function createItems($data)
    {
        return Item::create($data);
    }

    public function showItems($id)
    {
        return Item::whereId($id)->first();
    }

    public function updateItems($id, $data)
    {
        return Item::whereId($id)->update($data);
    }

    public function deleteItems($id)
    {
        return Item::whereId($id)->delete();
    }
}