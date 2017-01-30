<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('/', function () {
        return view('admin.auth.login');
    });


    /* Grupo de rutas dentro de la carpeta admin */
    // AGREGAR ,'middleware' =>'auth' PARA LO DE LOGIN
    Route::group(['prefix' =>'admin' ,'middleware' =>'auth'],function() {

        //RUTA MAIN DE ADMIN
        Route::get('/',['as'=>'admin.template.main', function() {
            return view('admin.main');//welcome
        }]);

        //Todos los elementos dentro de la carpeta banks usan el controlador BanksController
        Route::resource('banks','BanksController');

        //Ruta para ejecutar el metodo update2 dentro del controlador BanksController
        Route::POST('banks/{banks}', [
            'uses' => 'BanksController@update2',
            'as' => 'admin.banks.update2'
        ]);

        //Todos los elementos dentro de la carpeta jobs usan el controlador jobController
        Route::resource('jobs','JobController');

        //Todos los elementos dentro de la carpeta units usan el controlador UnitsController
        Route::resource('units','UnitsController');

        //Todos los elementos dentro de la carpeta discounts_income usan el controlador Discounts_incomeController
        Route::resource('discounts_income','Discounts_incomeController');

        //Todos los elementos dentro de la carpeta discounts_income usan el controlador Discounts_incomeController
        Route::resource('holidays_days','Holidays_daysController');

        //Ruta para ejecutar el metodo update2 dentro del controlador Discounts_incomeController
        Route::POST('holidays_days/{holidays_days}', [
            'uses' => 'Holidays_daysController@update2',
            'as' => 'admin.holidays_days.update2'
        ]);

        //Todos los elementos dentro de la carpeta small_box_concepts usan el controlador Small_box_conceptsController
        Route::resource('petty_cash_concepts','Petty_cash_conceptsController');

        //Todos los elementos dentro de la carpeta families usan el controlador FamilyController
        Route::resource('families','FamilyController');

        //Todos los elementos dentro de la carpeta categories usan el controlador CategoryController
        Route::resource('categories','CategoryController');

        //Todos los elementos dentro de la carpeta classification usan el controlador ClassificationController
        Route::resource('classification','ClassificationController');

        //Todos los elementos dentro de la carpeta categories usan el controlador Company_social_reasonController
        Route::resource('company_social_reason','Company_social_reasonController');


        //Ruta para ejecutar el metodo update2 dentro del controlador Company_social_reasonController
        Route::POST('company_social_reason/{company_social_reason}', [
            'uses' => 'Company_social_reasonController@update2',
            'as' => 'admin.company_social_reason.update2'
        ]);

        //Permite gestionar la ruta de actualizacion de logo de razones sociales
        Route::POST('logo/{company_social_reason}', [
            'uses' => 'Company_social_reasonController@logo',
            'as' => 'admin.company_social_reason.logo'
        ]);

        //gesition de estados y municipios
        Route::get('municipalities/{company_social_reason}','Company_social_reasonController@getMunicipalities');

        //gesition de estados y municipios
        Route::get('municipalities/{clients}','ClientController@getMunicipalities');

        //gesition de estados y municipios
        Route::get('clients/{clients}','ClientController@getReasons');


        //gesition de estados y municipios
        //Route::get('municipalities/{client}','clientController@getMunicipalities');

        // gesntion de vista de usuarios
        Route::resource('users','UserController');

        //gesition de edicion de status
        Route::POST('users/{users}', [
            'uses' => 'UserController@update2',
            'as' => 'admin.users.update2'
        ]);


        //gesition de guardar de usuario
        Route::POST('usersave', [
            'uses' => 'UserController@store',
            'as' => 'admin.users.store'
        ]);

        //Todos los elementos dentro de la carpeta employees usan el controlador EmployeeController
        Route::resource('employees','EmployeeController');

        //Todos los elementos dentro de la carpeta services usan el controlador ServiceController
        Route::resource('services','ServiceController');
        ;
           //Todos los elementos dentro de la carpeta developments usan el controlador DevelopmentsController
        Route::resource('developments','DevelopmentsController');

        //Todos los elementos dentro de la carpeta developments usan el controlador DevelopmentsController
        Route::resource('documents_types','Documents_typeController');


            //Todos los elementos dentro de la carpeta developments usan el controlador ClientsController
                Route::resource('clients','ClientController');

                //
                Route::get('getReasons/{id}','ClientController@getReasons');
        //
                Route::get('getReasonsSingle/{id}','ClientController@getReasonsSingle');

                //Ruta para ejecutar el metodo update2 dentro del controlador ClientController
                Route::POST('clients/{clients}', [
                    'uses' => 'ClientController@update2',
                    'as' => 'admin.clients.update2'
                ]);



                //Permite gestionar la ruta de actualizacion de logo de ClientControler
                Route::POST('logoo/{clients}', [
                    'uses' => 'ClientController@logoo',
                    'as' => 'admin.clients.logoo'
                ]);

        Route::PUT('profile/{profile}', [
            'uses' => 'ProfileController@update',
            'as' => 'admin.profile.update'
        ]);
        Route::DELETE('profile/{profile}', [
            'uses' => 'ProfileController@destroy',
            'as' => 'admin.profile.destroy'
        ]);
        Route::POST('profile', [
            'uses' => 'ProfileController@store',
            'as' => 'admin.profile.store'
        ]);

        //gesition de permissions
        Route::resource('permission','PermissionsController');

            //crear default 4 opciones
        Route::get('permission/{id}/{id_seccion?}',[ 'uses' => 'PermissionsController@update_store', 'as' => 'admin.permission.update_store']);

        Route::PUT('perm/{_id}/{seccion_id?}', [
            'uses' => 'PermissionsController@updateV',
            'as' => 'admin.permission.updateV'
        ]);

           Route::PUT('permA/{_id}/{seccion_id?}', [
              'uses' => 'PermissionsController@update_add',
              'as' => 'admin.permission.update_add'
          ]);

          Route::PUT('permU/{_id}/{seccion_id?}', [
              'uses' => 'PermissionsController@update_update',
              'as' => 'admin.permission.update_update'
          ]);

          Route::PUT('permD/{_id}/{seccion_id?}', [
              'uses' => 'PermissionsController@update_delete',
              'as' => 'admin.permission.update_delete'
          ]);

        //Todos los elementos dentro de la carpeta families_office usan el controlador FamilyOfficeController
        Route::resource('families_office','FamilyOfficeController');

        //Todos los elementos dentro de la carpeta budgets usan el controlador BudgeteController
        Route::resource('budgets','BudgetController');

        //Todos los elementos dentro de la carpeta budgets usan el controlador BudgeteController
        Route::resource('projects','ProjectController');

        //gesition de clientes y razones
        Route::get('get_razon_social_cliente/{id}','ProjectController@getRazonSocialCliente');
        Route::put('projectsupdate/{id}','ProjectController@update2');


    });//Cierre admin

    /*
    RUTAS PARA LA GESTION DE LOGIN
    */
    Route::get('admin/auth/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'admin.auth.login'
    ]);
    Route::post('admin/auth/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'admin.auth.login'
    ]);

    Route::get('admin/auth/logout', [
        'uses' => 'Auth\AuthController@logout',
        'as' => 'admin.auth.logout'
    ]);
