<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductImageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class ProductImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\ProductImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product-image');
        CRUD::setEntityNameStrings('Images de produit', 'Images de produit');

        if (!backpack_user()->can('product_image.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('product_image.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('product_image.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('product_image.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
        CRUD::removeColumn('path');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductImageRequest::class);
        CRUD::setFromDb();

        CRUD::field('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
        CRUD::field('path')->type('upload')->disk('publicProducts')->upload(true);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
