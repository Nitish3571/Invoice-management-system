<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\ProfileController;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\authentications\ForgotPasswordController;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;

use App\Http\Controllers\invoice\InvoiceController;

// Main Page Route
Route::get('/', [LoginController::class, 'index'])->name('auth-login');
Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics')->middleware('auth');

// authentication
Route::get('/auth/login', [LoginController::class, 'index'])->name('auth-login');
Route::post('/auth/login', [LoginController::class, 'Authenticate'])->name('auth-login');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// profile setting
Route::post('/profile', [ProfileController::class, 'store'])->name('profile')->middleware('auth')->middleware('auth');


Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth-register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('auth-register');
Route::get('/auth/forgot-password', [ForgotPasswordController::class, 'index'])->name('auth-forgot-password');
Route::get('/auth/reset', [ForgotPasswordController::class, 'reset'])->name('auth-reset');
Route::post('/auth/reset', [ForgotPasswordController::class, 'store'])->name('auth-reset');


// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// // pages
// Route::get('/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
// Route::get('/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
// Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
// Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
// Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');


// pages
Route::get('/account-settings-account', [ProfileController::class, 'index'])->name('account-settings-account')->middleware('auth');
Route::get('/edit-account-setting/{id}', [ProfileController::class, 'edit'])->name('edit-account-setting')->middleware('auth');
Route::post('/edit-account-setting', [ProfileController::class, 'store'])->name('edit-account-setting')->middleware('auth');
Route::get('/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('account-settings-notifications')->middleware('auth');
Route::get('/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('account-settings-connections')->middleware('auth');
Route::get('/misc-error', [MiscError::class, 'index'])->name('misc-error');
Route::get('/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('misc-under-maintenance');



Route::get('/invoice/list', [InvoiceController::class, 'index'])->name('invoice-list')->middleware('auth');
Route::get('/invoice/view/{id}', [InvoiceController::class, 'view'])->name('invoice-view')->middleware('auth');
Route::get('/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice-edit')->middleware('auth');
Route::get('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice-delete')->middleware('auth');
Route::post('/invoice/update/{id}', [InvoiceController::class, 'update'])->name('invoice-update')->middleware('auth');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice-create')->middleware('auth');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice-store')->middleware('auth');



// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');