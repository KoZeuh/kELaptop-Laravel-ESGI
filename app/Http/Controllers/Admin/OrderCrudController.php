<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('Commande', 'Commandes');

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

        CRUD::column('user_id')->label('Utilisateur')->type('select')->entity('user')->attribute('lastname')->model('App\Models\User');
        CRUD::column('promo_code')->label('Code promo')->type('select')->entity('promocode')->attribute('code')->model('App\Models\PromoCode');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('user_id')->label('Utilisateur')->type('select')->entity('user')->attribute('lastname')->model('App\Models\User');
        CRUD::field('promo_code')->label('Code promo')->type('select')->entity('promocode')->attribute('code')->model('App\Models\PromoCode');
        CRUD::field('status')->type('select_from_array')->options(['PENDING' => 'En attente de validation', 'COMPLETED' => 'Validée', 'CANCELLED' => 'Annulée']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
