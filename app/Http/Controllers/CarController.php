<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cars = Car::all();
      return view('cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate($this->getValidationRules());

      $request_data = $request->all();
      $newCar = new Car();
      $newCar->fill($request_data);
      // $newCar->name = $request_data['name'];
      // $newCar->model = $request_data['model'];
      // $newCar->imgurl = $request_data['imgurl'];
      // $newCar->year = $request_data['year'];
      // $newCar->displacement = $request_data['displacement'];
      // $newCar->velmax = $request_data['velmax'];
      $saveOk=$newCar->save();
      if ($saveOk) {
        $savedCar = Car::orderBy('id', 'desc')->first();
        return redirect()->route('cars.show', $savedCar);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
      return view('cars.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
      return view('cars.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $Car)
    {

      $request->validate($this->getValidationRules());

      $request_data = $request->all();
      $Car->update($request_data);
      return redirect()->route('cars.show',$Car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
      $car->delete();
      return redirect()->route('cars.index');
    }

    protected function getValidationRules()
    {
      return [
        'name' => 'required',
        'model' => 'required',
        'imgurl' => 'required',
        'year' => 'required',
        'displacement' => 'required|integer',
        'velmax' => 'required|integer'
      ];
    }
}
