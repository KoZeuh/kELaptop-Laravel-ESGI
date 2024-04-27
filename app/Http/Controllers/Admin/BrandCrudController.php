<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class BrandCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Brand::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/brand');
        CRUD::setEntityNameStrings('Marque', 'Marques');

        if (!backpack_user()->can('brand.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('brand.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('brand.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('brand.update')) {
            CRUD::removeButton('update');
        }
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(BrandRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
