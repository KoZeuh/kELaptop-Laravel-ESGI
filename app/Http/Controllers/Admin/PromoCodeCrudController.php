<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PromoCodeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class PromoCodeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\PromoCode::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/promo-code');
        CRUD::setEntityNameStrings('Code promo', 'Codes promo');

        if (!backpack_user()->can('promo_code.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('promo_code.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('promo_code.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('promo_code.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('code')->label('Code');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PromoCodeRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('code')->label('Code');
        CRUD::field('discount')->type('number');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
