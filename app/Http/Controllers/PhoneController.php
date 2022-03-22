<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;

use function Psy\debug;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_phones = DB::table('phones')->get();
        $one_with_id = DB::table('phones')->find(1);
        $phones_just_price = DB::table('phones')->select('price as cena')->get();
        $cene = DB::table('phones')->pluck('price');
        $count = DB::table('phones')->count();
        $max_price = DB::table('phones')->max('price');
        $sum_price = DB::table('phones')->sum('price');
        $avg_price = DB::table('phones')->avg('price');

        $note12 = DB::table('phones')->where('name','NOTE 12')->first();
        $note12_cena = DB::table('phones')->where('name','NOTE 12')->value('price');
        $low_cost_phones = DB::table('phones')->where('price','<',70000)->get();
        $low_cost_samsung = DB::table('phones')->where([['price','>',70000],['brand','Apple']])->get();
        $low_cost_or_iPhone = DB::table('phones')->where('price','<',70000)->orWhere('brand','Apple')->get();
        $apple_i_samsung = DB::table('phones')->whereIn('brand',['Apple','Samsung'])->get();

        $po_datumu = DB::table('phones')->whereDate('created_at','2022-03-21')->get();

        $all_names = DB::table('phones')->select('name')->distinct()->get();

        $desc = DB::table('phones')->orderBy('price','desc')->get();
         
        \Debugbar::info($all_names,$sum_price);
    
        return view("phones.index",['all_phones'=>$all_phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>'required',
            "brand"=>'required',
            "price"=>'required',
        ]);

        DB::table('phones')->insert([
            "name"=>$request->name,
            "brand"=>$request->brand,
            "price"=>$request->price 
        ]);

        return redirect('/phones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = DB::select("SELECT * FROM phones WHERE id = :id",["id"=>$id])[0];

        return view('phones.edit',["phone"=>$phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>'required',
            "brand"=>'required',
            "price"=>'required',
        ]);
        DB::update("UPDATE phones SET name= :name, brand= :brand, price= :price WHERE id= :id",["name"=>$request->name,"brand"=>$request->brand,"price"=>$request->price,"id"=>$id]);

        return redirect('phones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM phones WHERE id = ?',[$id]);
        return redirect('/phones');
    }
}
