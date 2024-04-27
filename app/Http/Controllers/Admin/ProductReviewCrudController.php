<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductReviewRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class ProductReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\ProductReview::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product-review');
        CRUD::setEntityNameStrings('Avis sur un produit', 'Avis sur un produit');

        if (!backpack_user()->can('product_review.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.


        if (!backpack_user()->can('product_review.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('product_review.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('product_review.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
        CRUD::column('user_id')->label('Utilisateur')->type('select')->entity('user')->attribute('lastname')->model('App\Models\User');
        CRUD::column('rating')->type('number')->min(1)->max(5);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductReviewRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('product_id')->label('Product')->type('select')->entity('product')->attribute('name')->model('App\Models\Product');
        CRUD::field('user_id')->label('Utilisateur')->type('select')->entity('user')->attribute('lastname')->model('App\Models\User');
        CRUD::field('rating')->type('number')->min(1)->max(5);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
