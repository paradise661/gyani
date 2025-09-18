<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ItineraryController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PackageCategoryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageFaqController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\UserRegisterController;
use App\Http\Controllers\Admin\PackageVisaController;


// use App\Http\Controllers\Admin\VacancyController;
// use App\Http\Controllers\Admin\VideoController;

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


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
 */

Route::get('/', [FrontendController::class, 'home'])->name('home');


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('register', [UserRegisterController::class, 'store'])->name('store.register');

    /*
    |--------------------------------------------------------------------------
    | Change/Update Password Route
    |--------------------------------------------------------------------------
     */

    Route::get('change-password', [AuthController::class, 'index'])->name('profile');
    Route::post('change-password', [AuthController::class, 'store'])->name('change.password');


    /*
    |--------------------------------------------------------------------------
    | Setting Route
    |--------------------------------------------------------------------------
     */

    Route::get('setting', [SettingController::class, 'edit'])->name('admin.setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('admin.setting.update');

    /*
    |--------------------------------------------------------------------------
    | Forms Route
    |--------------------------------------------------------------------------
     */

    Route::resource('contacts', ContactsController::class);
    Route::resource('booking', BookingController::class);


    /*
    |--------------------------------------------------------------------------
    | Posts/Pages Routes
    |--------------------------------------------------------------------------
     */

    Route::resource('blog', NewsController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('members', MemberController::class);
    Route::resource('page', PageController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('slider', SlidersController::class);
    Route::resource('popup', PopupController::class);

    /*
    |--------------------------------------------------------------------------
    | Gallery Routes
    |--------------------------------------------------------------------------
     */
    Route::resource('galleries', GalleryController::class);
    Route::get('/gallery/delete-file/{id}', [GalleryController::class, 'documentDelete'])->name('document.delete');

    /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
     */
    Route::get('menus/{id?}', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::post('create-menu', [MenuController::class, 'store'])->name('admin.menu.create');

    Route::get('add-post-to-menu', [MenuController::class, 'addPostToMenu'])->name('admin.menu.addpost');
    Route::get('add-page-to-menu', [MenuController::class, 'addPageToMenu'])->name('admin.menu.addpage');
    Route::get('add-service-to-menu', [MenuController::class, 'addServiceToMenu'])->name('admin.menu.addservice');
    Route::get('add-package-to-menu', [MenuController::class, 'addPackageToMenu'])->name('admin.menu.addpackage');
    Route::get('add-category-to-menu', [MenuController::class, 'addCategoryToMenu'])->name('admin.menu.addcategory');
    Route::get('add-custom-link', [MenuController::class, 'addCustomLink'])->name('admin.menu.addcustom');

    Route::get('update-menu', [MenuController::class, 'updateMenu'])->name('admin.menu.updatemenu');
    Route::post('update-menuitem/{id}', [MenuController::class, 'updateMenuItem'])->name('admin.menu.updateitem');
    Route::get('delete-menuitem/{id}/{key}/{in?}', [MenuController::class, 'deleteMenuItem'])->name('admin.menu.deleteitem');
    Route::get('delete-menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.deletemenu');

    Route::resource('packagecategories', PackageCategoryController::class);
    Route::resource('packages', PackageController::class);

    Route::get('packages/upload-file/{package_id}', [PackageController::class, 'galleryUpload'])->name('upload.gallery');
    Route::post('packages/store-file/{package_id}', [PackageController::class, 'galleryUploadStore'])->name('gallery.upload.store');
    Route::get('package/delete-file/{gallery_id}', [PackageController::class, 'packageGalleryDelete'])->name('package.gallery.delete');

    Route::get('packages/itinerary/{package_id}', [ItineraryController::class, 'index'])->name('itinerarys.index');
    Route::get('packages/itinerary/{package_id}/create', [ItineraryController::class, 'create'])->name('itinerarys.create');
    Route::get('packages/itinerary/{package_id}/{itinerary}/edit', [ItineraryController::class, 'edit'])->name('itinerarys.edit');
    Route::post('packages/itinerary/{package_id}', [ItineraryController::class, 'store'])->name('itinerarys.store');
    Route::put('packages/itinerary/{package_id}/{itinerary}', [ItineraryController::class, 'update'])->name('itinerarys.update');
    Route::delete('packages/itinerary/{package_id}/{itinerary}', [ItineraryController::class, 'destroy'])->name('itinerarys.destroy');

    Route::get('packages/faqs/{package_id}', [PackageFaqController::class, 'index'])->name('packagefaqs.index');
    Route::get('packages/faqs/{package_id}/create', [PackageFaqController::class, 'create'])->name('packagefaqs.create');
    Route::get('packages/faqs/{package_id}/{packagefaqs}/edit', [PackageFaqController::class, 'edit'])->name('packagefaqs.edit');
    Route::post('packages/faqs/{package_id}', [PackageFaqController::class, 'store'])->name('packagefaqs.store');
    Route::put('packages/faqs/{package_id}/{packagefaqs}', [PackageFaqController::class, 'update'])->name('packagefaqs.update');
    Route::delete('packages/faqs/{package_id}/{packagefaqs}', [PackageFaqController::class, 'destroy'])->name('packagefaqs.destroy');


    Route::get('packages/visa/{package_id}', [PackageVisaController::class, 'index'])->name('packagevisa.index');
    Route::get('packages/visa/{package_id}/create', [PackageVisaController::class, 'create'])->name('packagevisa.create');
    Route::get('packages/visa/{package_id}/{packagevisa}/edit', [PackageVisaController::class, 'edit'])->name('packagevisa.edit');
    Route::post('packages/visa/{package_id}', [PackageVisaController::class, 'store'])->name('packagevisa.store');
    Route::put('packages/visa/{package_id}/{packagevisa}', [PackageVisaController::class, 'update'])->name('packagevisa.update');
    Route::delete('packages/visa/{package_id}/{packagevisa}', [PackageVisaController::class, 'destroy'])->name('packagevisa.destroy');
    Route::get('/print/{id}', [PrintController::class, 'print'])->name('print');

});
