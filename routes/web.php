<?php

use App\Http\Controllers\CatalogoEventosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\FotografoController;
use App\Http\Controllers\FotografoEventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RecognitionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\UserController;

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

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    route::resource('/empleados', EmpleadoController::class);
    route::resource('/clientes', ClienteController::class);
    route::resource('/organizadores', OrganizadorController::class);
    route::resource('/fotografos', FotografoController::class);
    route::resource('/users', UserController::class);
    route::resource('/perfil', PerfilController::class);
    route::get('/perfil/{id_evento}/face', [PerfilController::class, 'faceView'])->name('perfil.faceView');
    route::post('/perfil/face', [PerfilController::class, 'faceSave'])->name('perfil.faceSave');
    route::resource('/password', PasswordController::class);
    route::resource('/roles', RolController::class);
    route::resource('/tiposEventos', TipoEventoController::class);
    route::get('/eventos/{id_evento}/fe', [EventoController::class, 'indexFE'])->name('eventos.indexFE');
    route::resource('/eventos', EventoController::class);
    route::get('/fotografosEventos/{id_evento}', [FotografoEventoController::class, 'create2'])->name('fotografosEventos.create2');
    route::resource('/fotografosEventos', FotografoEventoController::class);
    route::get('/fotos/{id_evento}/evento', [FotoController::class, 'fotos'])->name('fotos.fotos');
    route::get('/fotos/{id_evento}/evento/create', [FotoController::class, 'create2'])->name('fotos.crear');
    route::resource('/fotos', FotoController::class);
    route::resource('/suscripciones', SuscripcionController::class);
    Route::get('/pay/{monto}/payPal', [PaymentController::class, 'payWithPayPal'])->name('pay.payPal');
    Route::get('/payPal/status', [PaymentController::class, 'payPalStatus']);
    route::get('/pagos', [SuscripcionController::class, 'pagosUsers'])->name('pagos.index');
});

Route::resource('/catalogoEventos', CatalogoEventosController::class);

Route::get('/UserPlanes', [SuscripcionController::class, 'planUser'])->name('suscripciones.planUser');

Route::get('/watermark/{filename}', [CatalogoEventosController::class, 'watermark'])->where('filename', '(.*)')->name('watermark');

/*Route::get('/compare-faces/{profileImageKey}/{collectionId}/{threshold}', function ($profileImageKey, $collectionId, $threshold) {
    $similarImages = app('App\Http\Controllers\RecognitionController')->compareFaces($profileImageKey, $collectionId, $threshold);
    return view('similar-images', compact('similarImages'));
});*/

Route::post('/compare-faces', [RecognitionController::class, 'compareFaces'])->name('recognition.compareFaces');