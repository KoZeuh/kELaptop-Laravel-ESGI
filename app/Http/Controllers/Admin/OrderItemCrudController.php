<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrderItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\OrderItem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-item');
        CRUD::setEntityNameStrings('Détails Commande', 'Détails Commandes');

        if (!backpack_user()->can('order.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('order.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('order.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('order.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderItemRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
