<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MailCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Mail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mail');
        CRUD::setEntityNameStrings('mail', 'mails');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'letter_category_id', // the relationship name in your Migration
            'type' => 'select',
            'entity' => 'letterCategory', // the relationship name in your Model
            'attribute' => 'letter_category_name',
        ]);
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::modifyColumn('mail_file',[
            'name'   => 'mail_file',
            'type'   => 'upload',
            'label'  => 'File',
            'disk' => 'public',
            'limit' => 500,
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MailRequest::class);
        CRUD::addField([
            'name' => 'letter_category_id', // the relationship name in your Migration
            'type' => 'select',
            'entity' => 'letterCategory', // the relationship name in your Model
            'attribute' => 'letter_category_name',
        ]);

        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('mail_file')
            ->type('upload')
            ->after('mail_addressed_to')
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => '/uploads/mail/', // the path inside the disk where file will be stored
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function setupDeleteOperation()
    {
        CRUD::field('mail_file')
            ->type('upload')
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => '/uploads/mail/', // the path inside the disk where file will be stored
        ]);
    }
}
