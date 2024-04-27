<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('Catégorie', 'Catégories');

        if (!backpack_user()->can('category.view')) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page !');
        }
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        if (!backpack_user()->can('category.create')) {
            CRUD::removeButton('create');
        }

        if (!backpack_user()->can('category.delete')) {
            CRUD::removeButton('delete');
        }

        if (!backpack_user()->can('category.update')) {
            CRUD::removeButton('update');
        }

        CRUD::removeColumn('path_banner');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);
        CRUD::setFromDb();

        CRUD::field('path_banner')->type('upload')->disk('public')->upload(true);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
