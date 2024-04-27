<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('Utilisateur', 'Utilisateurs');

        if (!backpack_user()->can('user.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('user.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('user.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('user.update')) {
            CRUD::removeButton('update');
        }

        CRUD::column('phone')->label('Téléphone');
        CRUD::column('birthday')->label('Date de naissance');
        CRUD::column('address')->label('Adresse');
        CRUD::column('city')->label('Ville');
        CRUD::column('zip')->label('Code postal');
        CRUD::column('country')->label('Pays');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('phone')->label('Téléphone');
        CRUD::field('birthday')->label('Date de naissance');
        CRUD::field('address')->label('Adresse');
        CRUD::field('city')->label('Ville');
        CRUD::field('zip')->label('Code postal');
        CRUD::field('country')->label('Pays');
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
