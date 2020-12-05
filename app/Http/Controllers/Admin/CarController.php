<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CarsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @param CarsDataTable $dataTable
     * @return mixed
     */
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('admin.cars.index');
   }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize('create', new Car);

        return view('admin.cars.create');
    }


    public function store(Request $request)
    {
        $this->authorize('create', new Car);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $this->authorize('update', new Car);
    }


    public function update(Request $request, $id)
    {
        $this->authorize('update', new Car);
    }


    public function destroy($id)
    {
        $this->authorize('delete', new Car);
    }
}
