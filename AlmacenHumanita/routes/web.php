<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::resource('users','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {

	Route::get('/','HomeController@index');

	Route::get('/home', 'HomeController@index');


	


	/*Admin Usuarios*/

	Route::get('users',['as'=>'users.index','uses'=>'UserController@index']);

	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create']);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store']);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit']);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update']);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy']);

	

	Route::get('userInventarioClinica/{id}',['as'=>'users.editinv','uses'=>'UserController@editinvSuc']);

	Route::get('userInventarioClinicas/{user}/{id}',['as'=>'users.editinv2','uses'=>'UserController@editinvSuc2']);
	Route::patch('userInventarioClinicas/{user}',['as'=>'users.editinvsuc2','uses'=>'UserController@updateSuc']);


	Route::get('userInventarioPapeleria/{id}',['as'=>'users.editinvpap','uses'=>'UserController@editinvPap']);

	Route::get('userInventarioPapelerias/{user}/{id}',['as'=>'users.editinvpap2','uses'=>'UserController@editinvPap2']);

	Route::patch('userInventarioPapelerias/{user}',['as'=>'users.editinvsucpap2','uses'=>'UserController@updatePap']);

	
	Route::get('inventariopapeleria',['as'=>'inventarios.inventariopape','uses'=>'InventarioSucursalpapeleriaController@inventariopape']);

	

	//admin root
	Route::get('root',['as'=>'root.index','uses'=>'RootController@index','middleware' => ['permission:admin-admin']]);
	Route::get('root/{id}',['as'=>'root.show','uses'=>'RootController@show']);
	Route::get('root/{id}/edit',['as'=>'root.edit','uses'=>'rootController@edit','middleware' => ['permission:admin-admin']]);
	Route::patch('root/{id}',['as'=>'root.update','uses'=>'rootController@updateroot','middleware' => ['permission:admin-admin']]);

	//admin de clinica
	Route::get('almacenclinica',['as'=>'almacenclinica.index','uses'=>'almacenclinicaController@index','middleware' => ['permission:admin-admin-clinica']]);
	Route::get('almacenclinica/{id}',['as'=>'almacenclinica.show','uses'=>'almacenclinicaController@show']);
	Route::get('almacenclinica/{id}/edit',['as'=>'almacenclinica.edit','uses'=>'almacenclinicaController@edit','middleware' => ['permission:admin-admin-clinica']]);
	Route::patch('almacenclinica/{id}',['as'=>'almacenclinica.update','uses'=>'almacenclinicaController@update','middleware' => ['permission:admin-admin-clinica']]);

	//admin papeleria
	Route::get('almacenpapeleria',['as'=>'almacenpapeleria.index','uses'=>'almacenpapeController@index','middleware' => ['permission:admin-admin-papelera']]);
	Route::get('almacenpapeleria/{id}',['as'=>'almacenpapeleria.show','uses'=>'almacenpapeController@show']);
	Route::get('almacenpapeleria/{id}/edit',['as'=>'almacenpapeleria.edit','uses'=>'almacenpapeController@edit','middleware' => ['permission:admin-admin-papelera']]);
	Route::patch('almacenpapeleria/{id}',['as'=>'almacenpapeleria.update','uses'=>'almacenpapeController@update','middleware' => ['permission:admin-admin-papelera']]);

	//admin laboratorio
	Route::get('adminlab',['as'=>'adminlab.index','uses'=>'adminlaboratorioController@index','middleware' => ['permission:admin-admin-laboratorio']]);
	Route::get('adminlab/{id}',['as'=>'adminlab.show','uses'=>'adminlaboratorioController@show']);
	Route::get('adminlab/{id}/edit',['as'=>'adminlab.edit','uses'=>'adminlaboratorioController@edit','middleware' => ['permission:admin-admin-laboratorio']]);
	Route::patch('adminlab/{id}',['as'=>'adminlab.update','uses'=>'adminlaboratorioController@update','middleware' => ['permission:admin-admin-laboratorio']]);

	//Roles
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);




	//ADMIN MaterialClinica

	Route::get('materialClinica',['as'=>'materialClinica.index','uses'=>'MaterialClinicaController@index',]);
	Route::get('materialClinica/create',['as'=>'materialClinica.create','uses'=>'MaterialClinicaController@create',]);
	Route::post('materialClinica/create',['as'=>'materialClinica.store','uses'=>'MaterialClinicaController@store']);
	Route::get('materialClinica/{id}',['as'=>'materialClinica.show','uses'=>'MaterialClinicaController@show']);
	Route::get('materialClinica/{id}/edit',['as'=>'materialClinica.edit','uses'=>'MaterialClinicaController@edit']);
	Route::patch('materialClinica/{id}',['as'=>'materialClinica.update','uses'=>'MaterialClinicaController@update']);
	Route::delete('materialClinica/{id}',['as'=>'materialClinica.destroy','uses'=>'MaterialClinicaController@destroy']);


	//Cotizaciones
	Route::get('Cotizacion/{id}',['as'=>'cotizacion.create','uses'=>'CotizacionController@create']);
	Route::post('Cotizacion/{id}',['as'=>'cotizacion.store','uses'=>'CotizacionController@store']);
	Route::get('Cotizacionhistorial/{id}',['as'=>'cotizacion.historial','uses'=>'CotizacionController@historial']);



	//ADMIN MaterialPapelera

	Route::get('materialPapelera',['as'=>'materialPapelera.index','uses'=>'MaterialPapeleraController@index']);
	Route::get('materialPapelera/create',['as'=>'materialPapelera.create','uses'=>'MaterialPapeleraController@create']);
	Route::post('materialPapelera/create',['as'=>'materialPapelera.store','uses'=>'MaterialPapeleraController@store']);
	Route::get('materialPapelera/{id}',['as'=>'materialPapelera.show','uses'=>'MaterialPapeleraController@show']);
	Route::get('materialPapelera/{id}/edit',['as'=>'materialPapelera.edit','uses'=>'MaterialPapeleraController@edit']);
	Route::patch('materialPapelera/{id}',['as'=>'materialPapelera.update','uses'=>'MaterialPapeleraController@update']);
	Route::delete('materialPapelera/{id}',['as'=>'materialPapelera.destroy','uses'=>'MaterialPapeleraController@destroy']);



	//ADMIN Proveedor

	Route::get('proveedor',['as'=>'proveedor.index','uses'=>'ProveedorController@index']);
	Route::get('proveedor/create',['as'=>'proveedor.create','uses'=>'ProveedorController@create']);
	Route::post('proveedor/create',['as'=>'proveedor.store','uses'=>'ProveedorController@store']);
	Route::get('proveedor/{id}',['as'=>'proveedor.show','uses'=>'ProveedorController@show']);
	Route::get('proveedor/{id}/edit',['as'=>'proveedor.edit','uses'=>'ProveedorController@edit']);
	Route::patch('proveedor/{id}',['as'=>'proveedor.update','uses'=>'ProveedorController@update']);
	Route::delete('proveedor/{id}',['as'=>'proveedor.destroy','uses'=>'ProveedorController@destroy']);
	



	//almacenMatrizClinica	
	
	
	Route::get('inventarioMatrizClinica',['as'=>'inventarioMatrizClinica.index','uses'=>'InventarioMatrizClinicaController@index']);
	Route::get('inventarioMatrizClinicaClinicos',['as'=>'inventarioMatrizClinica.indexclinicos','uses'=>'InventarioMatrizClinicaController@indexclinicos']);

	Route::get('inventarioMatrizClinica/{id}',['as'=>'inventarioMatrizClinica.agregar','uses'=>'EntradaMatrizController@agregar']);
	Route::get('inventarioMatrizClinicaClinicos/{id}',['as'=>'inventarioMatrizClinica.agregarclinicos','uses'=>'EntradaMatrizController@agregarclinicos']);

	Route::post('inventarioMatrizClinica/{id}',['as'=>'EntradaMatriz.updateinventrada','uses'=>'EntradaMatrizController@updateinventrada']);
	Route::post('inventarioMatrizClinicaClinicos/{id}',['as'=>'EntradaMatriz.updateinventradaclinicos','uses'=>'EntradaMatrizController@updateinventradaclinicos']);
	Route::get('inventarioMatrizClinicaHistorial/{id}',['as'=>'inventarioMatrizClinica.historialEn','uses'=>'EntradaMatrizController@show']);
	Route::get('inventarioMatrizClinicaHistorialClinico/{id}',['as'=>'inventarioMatrizClinica.historialEnclinicos','uses'=>'EntradaMatrizController@showclinicos']);

	//salidas
	Route::get('inventarioMatrizClinicas/{id}',['as'=>'inventarioMatrizClinica.reducir','uses'=>'SalidaMatrizController@reducir']);
	Route::get('inventarioMatrizClinicasClinicos/{id}',['as'=>'inventarioMatrizClinica.reducirclinicos','uses'=>'SalidaMatrizController@reducirclinicos']);
	Route::post('inventarioMatrizClinicas/{id}',['as'=>'SalidaMatriz.updateinvsalida','uses'=>'SalidaMatrizController@updateinvsalida']);
	Route::post('inventarioMatrizClinicaClinicoss/{id}',['as'=>'SalidaMatriz.updateinvsalidaclinicos','uses'=>'SalidaMatrizController@updateinvsalidaclinicos']);
	Route::get('inventarioMatrizClinicasHistorial/{id}',['as'=>'inventarioMatrizClinica.historialSa','uses'=>'SalidaMatrizController@show']);
	Route::get('inventarioMatrizClinicasHistorialClinicos/{id}',['as'=>'inventarioMatrizClinica.historialSaclinicos','uses'=>'SalidaMatrizController@showclinicos']);

//almacenMatrizClinica	

		Route::get('inventarioMatrizPapeleria',['as'=>'inventarioMatrizPapeleria.index1','uses'=>'InventarioMatrizPapeleriaController@index1']);

		Route::get('inventarioMatrizPapeleria2',['as'=>'inventarioMatrizPapeleria.index2','uses'=>'InventarioMatrizPapeleriaController@index2']);

		Route::get('inventarioMatrizPapeleria3',['as'=>'inventarioMatrizPapeleria.index3','uses'=>'InventarioMatrizPapeleriaController@index3']);

		Route::get('inventarioMatrizPapeleria4',['as'=>'inventarioMatrizPapeleria.index4','uses'=>'InventarioMatrizPapeleriaController@index4']);

		Route::get('inventarioMatrizPapeleria5',['as'=>'inventarioMatrizPapeleria.index5','uses'=>'InventarioMatrizPapeleriaController@index5']);

		Route::get('inventarioMatrizPapeleria6',['as'=>'inventarioMatrizPapeleria.index6','uses'=>'InventarioMatrizPapeleriaController@index6']);

		Route::get('inventarioMatrizPapeleria1/{id}',['as'=>'EntradaPapeleria.agregar1','uses'=>'EntradaPapeleriaController@agregar1']);

		Route::get('inventarioMatrizPapeleria2/{id}',['as'=>'EntradaPapeleria.agregar2','uses'=>'EntradaPapeleriaController@agregar2']);

		Route::get('inventarioMatrizPapeleria3/{id}',['as'=>'EntradaPapeleria.agregar3','uses'=>'EntradaPapeleriaController@agregar3']);

		Route::get('inventarioMatrizPapeleria4/{id}',['as'=>'EntradaPapeleria.agregar4','uses'=>'EntradaPapeleriaController@agregar4']);

		Route::get('inventarioMatrizPapeleria5/{id}',['as'=>'EntradaPapeleria.agregar5','uses'=>'EntradaPapeleriaController@agregar5']);

		Route::get('inventarioMatrizPapeleria6/{id}',['as'=>'EntradaPapeleria.agregar6','uses'=>'EntradaPapeleriaController@agregar6']);

		Route::post('inventarioMatrizPapeleria1/{id}',['as'=>'EntradaPapeleria.update1','uses'=>'EntradaPapeleriaController@update1']);

		Route::post('inventarioMatrizPapeleria2/{id}',['as'=>'EntradaPapeleria.update2','uses'=>'EntradaPapeleriaController@update2']);

		Route::post('inventarioMatrizPapeleria3/{id}',['as'=>'EntradaPapeleria.update3','uses'=>'EntradaPapeleriaController@update3']);

		Route::post('inventarioMatrizPapeleria4/{id}',['as'=>'EntradaPapeleria.update4','uses'=>'EntradaPapeleriaController@update4']);

		Route::post('inventarioMatrizPapeleria5/{id}',['as'=>'EntradaPapeleria.update5','uses'=>'EntradaPapeleriaController@update5']);

		Route::post('inventarioMatrizPapeleria6/{id}',['as'=>'EntradaPapeleria.update6','uses'=>'EntradaPapeleriaController@update6']);

		Route::get('inventarioMatrizPapelerias1/{id}',['as'=>'SalidaPapeleria.reducir1','uses'=>'SalidaPapeleriaController@reducir1']);

		Route::get('inventarioMatrizPapelerias2/{id}',['as'=>'SalidaPapeleria.reducir2','uses'=>'SalidaPapeleriaController@reducir2']);

		Route::get('inventarioMatrizPapelerias3/{id}',['as'=>'SalidaPapeleria.reducir3','uses'=>'SalidaPapeleriaController@reducir3']);

		Route::get('inventarioMatrizPapelerias4/{id}',['as'=>'SalidaPapeleria.reducir4','uses'=>'SalidaPapeleriaController@reducir4']);

		Route::get('inventarioMatrizPapelerias5/{id}',['as'=>'SalidaPapeleria.reducir5','uses'=>'SalidaPapeleriaController@reducir5']);

		Route::get('inventarioMatrizPapelerias6/{id}',['as'=>'SalidaPapeleria.reducir6','uses'=>'SalidaPapeleriaController@reducir6']);

		Route::post('inventarioMatrizPapelerias1/{id}',['as'=>'SalidaPapeleria.updateinvsalida1','uses'=>'SalidaPapeleriaController@updateinvsalida1']);

		Route::post('inventarioMatrizPapelerias2/{id}',['as'=>'SalidaPapeleria.updateinvsalida2','uses'=>'SalidaPapeleriaController@updateinvsalida2']);

		Route::post('inventarioMatrizPapelerias3/{id}',['as'=>'SalidaPapeleria.updateinvsalida3','uses'=>'SalidaPapeleriaController@updateinvsalida3']);

		Route::post('inventarioMatrizPapelerias4/{id}',['as'=>'SalidaPapeleria.updateinvsalida4','uses'=>'SalidaPapeleriaController@updateinvsalida4']);

		Route::post('inventarioMatrizPapelerias5/{id}',['as'=>'SalidaPapeleria.updateinvsalida5','uses'=>'SalidaPapeleriaController@updateinvsalida5']);

		Route::post('inventarioMatrizPapelerias6/{id}',['as'=>'SalidaPapeleria.updateinvsalida6','uses'=>'SalidaPapeleriaController@updateinvsalida6']);

		Route::get('inventarioMatrizPapeleraHistorial1/{id}',['as'=>'EntradaPapeleria.historialEn1','uses'=>'EntradaPapeleriaController@show1']);

		Route::get('inventarioMatrizPapeleraHistorial2/{id}',['as'=>'EntradaPapeleria.historialEn2','uses'=>'EntradaPapeleriaController@show2']);

		Route::get('inventarioMatrizPapeleraHistorial3/{id}',['as'=>'EntradaPapeleria.historialEn3','uses'=>'EntradaPapeleriaController@show3']);

		Route::get('inventarioMatrizPapeleraHistorial4/{id}',['as'=>'EntradaPapeleria.historialEn4','uses'=>'EntradaPapeleriaController@show4']);

		Route::get('inventarioMatrizPapeleraHistorial5/{id}',['as'=>'EntradaPapeleria.historialEn5','uses'=>'EntradaPapeleriaController@show5']);

		Route::get('inventarioMatrizPapeleraHistorial6/{id}',['as'=>'EntradaPapeleria.historialEn6','uses'=>'EntradaPapeleriaController@show6']);

		Route::get('inventarioMatrizPapelerasHistorial1/{id}',['as'=>'SalidaPapeleria.historialSa1','uses'=>'SalidaPapeleriaController@shows1']);

		Route::get('inventarioMatrizPapelerasHistorial2/{id}',['as'=>'SalidaPapeleria.historialSa2','uses'=>'SalidaPapeleriaController@shows2']);

		Route::get('inventarioMatrizPapelerasHistorial3/{id}',['as'=>'SalidaPapeleria.historialSa3','uses'=>'SalidaPapeleriaController@shows3']);

		Route::get('inventarioMatrizPapelerasHistorial4/{id}',['as'=>'SalidaPapeleria.historialSa4','uses'=>'SalidaPapeleriaController@shows4']);

		Route::get('inventarioMatrizPapelerasHistorial5/{id}',['as'=>'SalidaPapeleria.historialSa5','uses'=>'SalidaPapeleriaController@shows5']);

		Route::get('inventarioMatrizPapelerasHistorial6/{id}',['as'=>'SalidaPapeleria.historialSa6','uses'=>'SalidaPapeleriaController@shows6']);



		//pedidos

		Route::get('pedidoTomaMuestras/{id}',['as'=>'pedidos.pedidosMuestras','uses'=>'PedidosController@create_toma']);

		Route::post('pedidoTomaMuestras',['as'=>'pedidos.store_toma','uses'=>'PedidosController@store_toma']);

		Route::get('pedidoPapeleria/{id}',['as'=>'pedidos.pedidosPape','uses'=>'PedidosPapeController@create_papeleria']);

		Route::post('pedidoPapeleria',['as'=>'pedidos.store_papeleria','uses'=>'PedidosPapeController@store_papeleria']);


		Route::get('pedidoinmunologia/{id}',['as'=>'pedidos.pedidosinmunologia','uses'=>'PedidosController@create_inmunologia']);

		Route::post('pedidoinmunologia',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']);

		Route::get('pedidouroanalisis/{id}',['as'=>'pedidos.pedidosuroanalisis','uses'=>'PedidosController@create_uroanalisis']);

		Route::post('pedidouroanalisis',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']); 

		Route::get('pedidohematologia/{id}',['as'=>'pedidos.pedidoshematologia','uses'=>'PedidosController@create_hematologia']);

		Route::post('pedidohematologia',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']);

		Route::get('pedidobacteriologia/{id}',['as'=>'pedidos.pedidosbacteriologia','uses'=>'PedidosController@create_bacteriologia']);

		Route::post('pedidobacteriologia',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']);

		Route::get('pedidobioquimica/{id}',['as'=>'pedidos.pedidosbioquimica','uses'=>'PedidosController@create_bioquimica']);

		Route::post('pedidobioquimica',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']);

		Route::get('pedidohormonas/{id}',['as'=>'pedidos.pedidoshormonas','uses'=>'PedidosController@create_hormonas']);

		Route::post('pedidohormonas',['as'=>'pedidos.store_cli','uses'=>'PedidosController@store_cli']);


		Route::get('pendienteSuc',['as'=>'pendientesSucursal.pendientesClinico','uses'=>'PedidosController@showsuc']);
		Route::delete('pendienteSuc/{id}',['as'=>'Pedidos.destroy','uses'=>'PedidosController@destroy']);

		Route::get('pendientePap',['as'=>'pendientesSucursal.pendientePape','uses'=>'PedidosPapeController@showpap']);
		Route::delete('pendientePap/{id}',['as'=>'PedidosPape.destroy','uses'=>'PedidosPapeController@destroy']);

		Route::get('pendienteLab',['as'=>'pendientesSucursal.pendienteLab','uses'=>'PedidosController@showlab']);
		Route::delete('pendienteLab/{id}',['as'=>'PedidosLab.destroylab','uses'=>'PedidosController@destroylab']);
		Route::delete('pendienteLabs/{id}',['as'=>'PedidosLab.destroyvarios','uses'=>'PedidosController@destroyvarios']);


		Route::get('pendienteAdminToma',['as'=>'pendientesAdmin.pendienteClinico','uses'=>'PedidosController@showadmin']);
		Route::delete('pendienteAdminToma/{id}',['as'=>'pendientesAdmin.destroyclinicos','uses'=>'PedidosController@destroyclinico1']);

		Route::get('Fia',['as'=>'pendientesAdmin.pendientePapeleria','uses'=>'PedidosController@showadminpape']
			);
		Route::delete('pendienteAdminPapeleria/{id}',['as'=>'pendientesAdmin.destroypapes','uses'=>'PedidosController@destroypape1']);

		Route::get('pendienteAdminLab',['as'=>'pendientesAdmin.pendienteLab','uses'=>'PedidosController@showadminlab']);
		Route::delete('pendienteAdminLab/{id}',['as'=>'pendientesAdmin.destroylabs','uses'=>'PedidosController@destroylab1']);


		//faltante
		Route::get('faltanteToma/{id}',['as'=>'faltantes.faltanteSuc','uses'=>'PedidosController@faltante',]);

		//historialPedidosclinicos

		Route::get('historialPedidosClinico/{id}',['as'=>'pendientesAdmin.historialPendientesClinico','uses'=>'PedidosController@showHistCli']);

		Route::get('historialPedidosClinicos/{id}',['as'=>'pendientesAdmin.historialPendientesClinico2','uses'=>'PedidosController@showHistCli2']);

		//historialpedidospape

		Route::get('historialPedidosPape/{id}',['as'=>'pendientesAdmin.historialPendientesPape','uses'=>'PedidosController@showHistPap']);

		Route::get('historialPedidosPapes/{id}',['as'=>'pendientesAdmin.historialPendientesPape2','uses'=>'PedidosController@showHistPap2']);


		//modals


		Route::get('inventario',['as'=>'inventarios.inventario','uses'=>'InventarioSucursalController@inventario']);

		Route::post('ModificaExistenciaModal',['as'=>'inventarios.inventario','uses'=>'InventarioSucursalController@modificaExistencia']);

		Route::post('ModificaExistenciaModal2',['as'=>'inventarios.inventariopape','uses'=>'InventarioSucursalpapeleriaController@modificaExistencia']);
		

		Route::post('ModificaPedidosModal',['as'=>'modificaPedidos','uses'=>'VariosController@modificaExistencia']);


		Route::post('PedidoLabModal',['as'=>'home','uses'=>'HomeController@hacerpedido']);



		//faltantes

		Route::post('faltanteToma/{id}',['as'=>'pedidos.faltante','uses'=>'PedidosController@faltantestore']);

		Route::delete('faltanteToma/{ids}',['as'=>'Pedidos.destroyfaltante','uses'=>'PedidosController@destroyfaltante']);

		Route::get('faltantePape/{id}',['as'=>'faltantes.faltantePape','uses'=>'PedidosPapeController@faltantePape',]);

		Route::post('faltantePape/{id}',['as'=>'pedidos.faltantestorePape','uses'=>'PedidosPapeController@faltantestorePape']);

		Route::delete('faltantePape/{ids}',['as'=>'Pedidos.destroyfaltantePape','uses'=>'PedidosPapeController@destroyfaltantePape']);

		Route::get('faltanteLab/{id}',['as'=>'faltantes.faltanteLab','uses'=>'PedidosController@faltanteLab']);

		Route::post('faltanteLab/{id}',['as'=>'pedidos.faltanteLab','uses'=>'PedidosController@faltantestorelab']);

		Route::delete('faltanteLab/{ids}',['as'=>'Pedidos.destroyfaltanteLab','uses'=>'PedidosController@destroyfaltanteLab']);



		//historial Inventarios Suc
		Route::get('historialInventario/{id}',['as'=>'inventarios.historialinventario','uses'=>'HistorialPedidosController@showHistInv']);

		Route::get('historialInventarioPap/{id}',['as'=>'inventarios.historialinventariopape','uses'=>'HistorialPedidosController@showHistInvPap']);



		Route::get('Historialinmunologia',['as'=>'historialeslab.historialinmunologia','uses'=>'PedidosController@historialinmunologia']);
		Route::get('Historialinmunologiamaterial{id}',['as'=>'historialeslab.historialinmunologiamaterial','uses'=>'PedidosController@historialinmunologiamaterial']);

		Route::get('Historialuroanalisis',['as'=>'historialeslab.historialuroanalisis','uses'=>'PedidosController@historialuroanalisis']);
		Route::get('Historialuroanalisismaterial{id}',['as'=>'historialeslab.historialuroanalisismaterial','uses'=>'PedidosController@historialuroanalisismaterial']);

		Route::get('Historialhematologia',['as'=>'historialeslab.historialhematologia','uses'=>'PedidosController@historialhematologia']);
		Route::get('Historialhematologiamaterial{id}',['as'=>'historialeslab.historialhematologiamaterial','uses'=>'PedidosController@historialhematologiamaterial']);

		Route::get('Historialbacteriologia',['as'=>'historialeslab.historialbacteriologia','uses'=>'PedidosController@historialbacteriologia']);
		Route::get('Historialbacteriologiamaterial{id}',['as'=>'historialeslab.historialbacteriologiamaterial','uses'=>'PedidosController@historialbacteriologiamaterial']);

		Route::get('Historialbioquimica',['as'=>'historialeslab.historialbioquimica','uses'=>'PedidosController@historialbioquimica']);
		Route::get('Historialbioquimicamaterial{id}',['as'=>'historialeslab.historialbioquimicamaterial','uses'=>'PedidosController@historialbioquimicamaterial']);

		Route::get('Historialhormonas',['as'=>'historialeslab.historialhormonas','uses'=>'PedidosController@historialhormonas']);
		Route::get('Historialhormonasmaterial{id}',['as'=>'historialeslab.historialhormonasmaterial','uses'=>'PedidosController@historialhormonasmaterial']);

		Route::get('Historialinmunologialab/{id}',['as'=>'historialeslab.historialinmunologialab','uses'=>'PedidosController@historialinmunologialab']);

		Route::get('Historialuroanalisislab/{id}',['as'=>'historialeslab.historialuroanalisislab','uses'=>'PedidosController@historialuroanalisislab']);

		Route::get('Historialhematologialab/{id}',['as'=>'historialeslab.historialhematologialab','uses'=>'PedidosController@historialhematologialab']);

		Route::get('Historialbacteriologialab/{id}',['as'=>'historialeslab.historialbacteriologialab','uses'=>'PedidosController@historialbacteriologialab']);

		Route::get('Historialbioquimicalab/{id}',['as'=>'historialeslab.historialbioquimicalab','uses'=>'PedidosController@historialbioquimicalab']);

		Route::get('Historialhormonaslab/{id}',['as'=>'historialeslab.historialhormonaslab','uses'=>'PedidosController@historialhormonaslab']);


	Route::get('inventarioMatrizClinicass/{id}',['as'=>'inventarioMatrizClinica.reducirtomapedido','uses'=>'SalidaMatrizController@reducirped']);
	Route::get('inventarioMatrizClinicasClinicoss/{id}',['as'=>'inventarioMatrizClinica.reducirclinicospedidos','uses'=>'SalidaMatrizController@reducirclinicosped']);
	Route::get('inventarioMatrizPapelerias/{id}',['as'=>'inventarioMatrizClinica.reducirpapeleria','uses'=>'SalidaPapeleriaController@reducirped']);


	Route::post('inventarioMatrizClinicass/{id}',['as'=>'SalidaMatriz.updateinvsalidaped','uses'=>'SalidaMatrizController@updateinvsalidaped']);
	Route::post('inventarioMatrizClinicaClinicosss/{id}',['as'=>'SalidaMatriz.updateinvsalidaclinicosped','uses'=>'SalidaMatrizController@updateinvsalidaclinicosped']);
	Route::post('inventarioMatrizPapelerias/{id}',['as'=>'SalidaPapeleria.updateinvsalidaped','uses'=>'SalidaPapeleriaController@updateinvsalidaped']);



});



