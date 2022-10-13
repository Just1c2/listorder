<?php

namespace App\Http\Controllers;

use App\Models\ListOrder;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listorders = listorder::latest()->paginate(5);
        return view('listorders.index',compact('listorders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ListOrder $listOrder)
    {
        return view('listorders.show',compact('listorder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ListOrder $listOrder)
    {
        return view('listorders.edit',compact('listorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListOrder $listOrder)
    {
        $request->validate([
            'order_date' => 'required',
            'customer_id' => 'required',
            'qty' => 'required',
            'pickup_date' => 'required',
        ]);

        $listOrder->update($request->all());
        return redirect()->route('listorders.index')->with('success',
                                                        'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListOrder  $listOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListOrder $listOrder)
    {
        $listOrder->delete();
        return redirect()->route('listorders.index')->with('success',
                        'Deleted successfully.');
    }
}
