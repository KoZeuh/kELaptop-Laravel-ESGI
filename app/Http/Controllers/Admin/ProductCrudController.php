<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('Produit', 'Produits');

        if (!backpack_user()->can('product.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('product.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('product.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('product.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('brand_id')->label('Marque')->type('select')->entity('brand')->attribute('name')->model('App\Models\Brand');
        CRUD::column('category_id')->label('Catégorie')->type('select')->entity('category')->attribute('name')->model('App\Models\Category');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('brand_id')->label('Marque')->type('select')->entity('brand')->attribute('name')->model('App\Models\Brand');
        CRUD::field('category_id')->label('Catégorie')->type('select')->entity('category')->attribute('name')->model('App\Models\Category');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
