<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StockRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class StockCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Stock::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/stock');
        CRUD::setEntityNameStrings('stock', 'stock');

        if (!backpack_user()->can('stock.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();

        if (!backpack_user()->can('stock.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('stock.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('stock.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(StockRequest::class);
        CRUD::setFromDb();
        CRUD::field('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
