<?php


use App\Http\Controllers\CellarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GoutteController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	if (!Auth::check()) {
		return view('welcome');;
	} else {
		return redirect()->route('cellar.index');
	}
})->name('welcome');

route::get('/goutte', [App\Http\Controllers\GoutteController::class, 'index'])->name('goutte');

Route::middleware('guest')->group(function () {
	Route::get('/enregistrement', [UserController::class, 'create'])->name('user.create');
	Route::post('/enregistrement', [UserController::class, 'store'])->name('user.store');
	


	// Route connexion
	Route::get('/connexion', [AuthController::class, 'create'])->name('login');
	Route::post('/connexion', [AuthController::class, 'store'])->name('login.store');
	
	

	// Route mot de passe oublié

	Route::get('/motdepasse/oublie', [UserController::class, 'forgot'])->name('user.forgot');
	Route::post('/motdepasse/oublie', [UserController::class, 'email'])->name('user.email');
	Route::get('/motdepasse/reintialiser/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
	Route::put('/motdepasse/reintialiser/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');
});

Route::middleware('auth')->group(function () {
	Route::get('/utilisateur', [UserController::class, 'index'])->name('user.index');
 
	Route::get('/utilisateurs/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
	Route::delete('/utilisateurs/{user}', [UserController::class, 'destroy'])->name('user.destroy');
	Route::put('/utilisateurs/{user}', [UserController::class, 'update'])->name('user.update');


	Route::post('/deconnexion', [AuthController::class, 'destroy'])->name('logout');
	Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

	

	Route::get('/inventaire', [CellarController::class, 'index'])->name('cellar.index');
	Route::get('inventaire/creer/cellier', [CellarController::class, 'create'])->name('cellar.create');
	Route::post('/creer/cellier', [CellarController::class, 'store'])->name('cellar.store');
	Route::get('/modifier/cellier/{cellar}', [CellarController::class, 'edit'])->name('cellar.edit');
	Route::put('/modifier/cellier/{cellar}', [CellarController::class, 'update'])->name('cellar.update');
	Route::delete('supprimer/cellier/{cellar}', [CellarController::class, 'destroy'])->name('cellar.delete');
	Route::post('/cellier/bouteille/ajouter', [CellarController::class, 'addBottleFromSelection'])->name('cellar.addBottleFromSelection');

	Route::get('/mesBouteilles', [UserController::class, 'showBottles'])->name('user.showBottles');
	Route::get('/cellier/{cellar}/bouteille', [CellarController::class, 'showBottles'])->name('cellar.showBottles');
	
	Route::get('/cellier/bouteille/ajouter/{bottle_id}', [SearchController::class, 'showAddBottleForm'])->name('bottle.add');
	Route::post('/cellier/bouteille/ajouter', [SearchController::class, 'addBottle'])->name('bottle.add.submit');
	

	Route::get('/listeAchat/bouteille/ajouter/{bottle_id}', [PurchaseController::class, 'showAddBottleForm'])->name('achat.add');
	Route::post('/listeAchat/bouteille/ajouter', [PurchaseController::class, 'addBottle'])->name('achat.add.submit');
	Route::post('/listeAchat/ajouter-au-cellier/{bottle_id}', [PurchaseController::class, 'addToCellar'])->name('purchase.addToCellar');
	Route::get('/listeAchat', [PurchaseController::class, 'index'])->name('purchase.index');

	Route::get('/recherche', [SearchController::class, 'index'])->name('search.index');
	Route::get('/recherche-autocomplete', [SearchController::class, 'autocomplete'])->name('search.autocomplete');

	Route::get('/favoris', [FavoriteController::class, 'index'])->name('favorites.index');
	Route::get('/favoris/ajouter/{bottleId}', [FavoriteController::class, 'add'])->name('favoris.add');
	Route::delete('/favoris/supprimer/{bottleId}', [FavoriteController::class, 'remove'])->name('favoris.remove');
	Route::post('/favoris/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
	Route::post('/toggle-favorite/{bottleId}', [FavoriteController::class, 'toggleFavoriteBottle']);

});

Route::get('/utilisateurSupprime', [AuthController::class, 'deletedUser']);
Route::get('/api/user/cellars', [CellarController::class, 'getUserCellars'])->name('cellar.getUserCellars');





