<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Interfaces\ItemRepositoryInterface;

class ItemController extends Controller
{
    private ItemRepositoryInterface $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $item)
    {
        return response()->json([
            'data' => $item->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $data = $request->only(['title', 'price', 'stock', 'description', 'type']);
        $newData = $this->itemRepository->createItems($data);

        return response()->json([
            'data' => $newData,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        return response()->json([
            'data' => $this->itemRepository->showItems($item_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $item_id)
    {
        $data = $request->only(['title', 'type', 'price', 'stock', 'description', 'sold']);
        $updateData = $this->itemRepository->updateItems($item_id, $data);

        return response()->json([
            'data' => $updateData,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
        $this->itemRepository->deleteItems($item_id);
    }
}
