<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Artisan;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/create-symlink', function (){
    symlink(storage_path('/app/public'), public_path('storage'));
    echo "Symlink Created. Thanks";
});

Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');
        return 'Storage link created successfully.';
    } catch (\Exception $e) {
        return 'Error creating storage link: ' . $e->getMessage();
    }
});

Route::redirect('/', '/home');
Route::namespace($controller_path)->group(function () {
    Route::middleware('guest')->namespace('authentications')->group(function () {
        Route::get('/auth', 'LoginBasic@index')->name('auth-login-basic');
        Route::post('/auth', 'LoginBasic@login');
    });


    Route::namespace('home')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/all-leagues/{id?}', 'HomeController@list')->name('all-leagues');
        Route::get('/all-blogs', 'HomeController@bloglist')->name('all-blogs');

        Route::get('/detail/blog/{id}', 'HomeController@detailblog')->name('detail-blog');

        Route::get('/detail-match/{match_id}', 'HomeController@detail')->name('detail-match');
    });





    Route::middleware('superadmin')->group(function (){
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/dashboard', 'dashboard\Analytics@index')->name('dashboard-analytics');
        Route::get('/list/leagues', 'form_elements\BasicInput@index')->name('list-leagues');
        Route::get('/add/leagues', 'form_elements\BasicInput@create')->name('add-leagues');
        Route::post('/save/leagues', 'form_elements\BasicInput@store')->name('save-leagues');
        Route::get('/edit/league/{id}', 'form_elements\BasicInput@edit')->name('edit-league');
        Route::post('/update/leagues', 'form_elements\BasicInput@update')->name('update-leagues');
        Route::get('/delete/league/{id}', 'form_elements\BasicInput@delete')->name('delete-league');
        //users routes
        Route::get('/list/users', 'form_elements\DashboardUsersController@index')->name('list-users');
        Route::get('/add/user', 'form_elements\DashboardUsersController@create')->name('add-user');
        Route::post('/save/user', 'form_elements\DashboardUsersController@store')->name('save-user');
        Route::get('/edit/user/{id}', 'form_elements\DashboardUsersController@edit')->name('edit-user');
        Route::post('/update/user', 'form_elements\DashboardUsersController@update')->name('update-user');
        Route::get('/delete/user/{id}', 'form_elements\DashboardUsersController@delete')->name('delete-user');
        //matches routes
        Route::get('/add/matches', 'match\MatchController@index')->name('add-matches');
        Route::post('/save/matches', 'match\MatchController@save')->name('save-matches');
        Route::get('/list/matches', 'match\MatchController@list')->name('list-matches');
        Route::get('/delete/match/{id}', 'match\MatchController@delete')->name('delete-match');
        Route::get('/edit/match/{id}', 'match\MatchController@edit')->name('edit-match');
        Route::post('/update/match/{id}', 'match\MatchController@update')->name('update-matches');

        //teams routes
        Route::get('/add/teams', 'team\TeamController@index')->name('add-teams');
        Route::post('/save/team', 'team\TeamController@save')->name('save-team');
        Route::get('/list/teams', 'team\TeamController@list')->name('list-team');
        Route::get('/edit/team/{id}', 'team\TeamController@edit')->name('edit-team');
        Route::get('/delete/team/{id}', 'team\TeamController@delete')->name('delete-team');
        Route::post('/update/team/{id}', 'team\TeamController@update')->name('update-team');

        //blogs routes
        Route::get('/add/blogs', 'blogs\BlogController@index')->name('add-blogs');
        Route::post('/save/blog', 'blogs\BlogController@save')->name('save-blog');
        Route::get('/list/blogs', 'blogs\BlogController@list')->name('list-blog');
        Route::get('/edit/blog/{id}', 'blogs\BlogController@edit')->name('edit-blog');
        Route::get('/delete/blog/{id}', 'blogs\BlogController@delete')->name('delete-blog');
        Route::post('/update/blog/{id}', 'blogs\BlogController@update')->name('update-blog');


        Route::get('/dashboard/analytics', 'dashboard\Analytics@index')->name('dashboard-analytics');
        Route::get('/dashboard/crm', 'dashboard\Crm@index')->name('dashboard-crm');
        Route::get('/dashboard/ecommerce', 'dashboard\Ecommerce@index')->name('dashboard-ecommerce');
        Route::get('/app/access-roles', 'apps\AccessRoles@index')->name('app-access-roles');
        Route::get('/app/access-permission', 'apps\AccessPermission@index')->name('app-access-permission');
    });

    // locale
    Route::get('lang/{locale}', 'language\LanguageController@swap');

    // layout
    Route::get('/layouts/collapsed-menu', 'layouts\CollapsedMenu@index')->name('layouts-collapsed-menu');
    Route::get('/layouts/content-navbar', 'layouts\ContentNavbar@index')->name('layouts-content-navbar');
    Route::get('/layouts/content-nav-sidebar', 'layouts\ContentNavSidebar@index')->name('layouts-content-nav-sidebar');
    Route::get('/layouts/navbar-full', 'layouts\NavbarFull@index')->name('layouts-navbar-full');
    Route::get('/layouts/navbar-full-sidebar', 'layouts\NavbarFullSidebar@index')->name('layouts-navbar-full-sidebar');
    Route::get('/layouts/horizontal', 'layouts\Horizontal@index')->name('dashboard-analytics');
    Route::get('/layouts/vertical', 'layouts\Vertical@index')->name('dashboard-analytics');
    Route::get('/layouts/without-menu', 'layouts\WithoutMenu@index')->name('layouts-without-menu');
    Route::get('/layouts/without-navbar', 'layouts\WithoutNavbar@index')->name('layouts-without-navbar');
    Route::get('/layouts/fluid', 'layouts\Fluid@index')->name('layouts-fluid');
    Route::get('/layouts/container', 'layouts\Container@index')->name('layouts-container');
    Route::get('/layouts/blank', 'layouts\Blank@index')->name('layouts-blank');

    // apps
    Route::get('/app/email', 'apps\Email@index')->name('app-email');
    Route::get('/app/chat', 'apps\Chat@index')->name('app-chat');
    Route::get('/app/calendar', 'apps\Calendar@index')->name('app-calendar');
    Route::get('/app/kanban', 'apps\Kanban@index')->name('app-kanban');
    Route::get('/app/invoice/list', 'apps\InvoiceList@index')->name('app-invoice-list');
    Route::get('/app/invoice/preview', 'apps\InvoicePreview@index')->name('app-invoice-preview');
    Route::get('/app/invoice/print', 'apps\InvoicePrint@index')->name('app-invoice-print');
    Route::get('/app/invoice/edit', 'apps\InvoiceEdit@index')->name('app-invoice-edit');
    Route::get('/app/invoice/add', 'apps\InvoiceAdd@index')->name('app-invoice-add');
    Route::get('/app/user/list', 'apps\UserList@index')->name('app-user-list');
    Route::get('/app/user/view/account', 'apps\UserViewAccount@index')->name('app-user-view-account');
    Route::get('/app/user/view/security', 'apps\UserViewSecurity@index')->name('app-user-view-security');
    Route::get('/app/user/view/billing', 'apps\UserViewBilling@index')->name('app-user-view-billing');
    Route::get('/app/user/view/notifications', 'apps\UserViewNotifications@index')->name('app-user-view-notifications');
    Route::get('/app/user/view/connections', 'apps\UserViewConnections@index')->name('app-user-view-connections');

    // pages
    Route::get('/pages/profile-user', 'pages\UserProfile@index')->name('pages-profile-user');
    Route::get('/pages/profile-teams', 'pages\UserTeams@index')->name('pages-profile-teams');
    Route::get('/pages/profile-projects', 'pages\UserProjects@index')->name('pages-profile-projects');
    Route::get('/pages/profile-connections', 'pages\UserConnections@index')->name('pages-profile-connections');
    Route::get('/pages/account-settings-account', 'pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
    Route::get('/pages/account-settings-security', 'pages\AccountSettingsSecurity@index')->name('pages-account-settings-security');
    Route::get('/pages/account-settings-billing', 'pages\AccountSettingsBilling@index')->name('pages-account-settings-billing');
    Route::get('/pages/account-settings-notifications', 'pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
    Route::get('/pages/account-settings-connections', 'pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
    Route::get('/pages/faq', 'pages\Faq@index')->name('pages-faq');
    Route::get('/pages/help-center-landing', 'pages\HelpCenterLanding@index')->name('pages-help-center-landing');
    Route::get('/pages/help-center-categories', 'pages\HelpCenterCategories@index')->name('pages-help-center-categories');
    Route::get('/pages/help-center-article', 'pages\HelpCenterArticle@index')->name('pages-help-center-article');
    Route::get('/pages/pricing', 'pages\Pricing@index')->name('pages-pricing');
    Route::get('/pages/pricing-front', 'pages\PricingFront@index')->name('pages-pricing-front');
    Route::get('/pages/misc-error', 'pages\MiscError@index')->name('pages-misc-error');
    Route::get('/pages/misc-under-maintenance', 'pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');
    Route::get('/pages/misc-comingsoon', 'pages\MiscComingSoon@index')->name('pages-misc-comingsoon');
    Route::get('/pages/misc-not-authorized', 'pages\MiscNotAuthorized@index')->name('pages-misc-not-authorized');

    // authentication
    Route::get('/auth/login-front', 'authentications\LoginFront@index')->name('auth-login-front');
    // Route::get('/auth/login-basic', 'authentications\LoginBasic@index')->name('auth-login-basic')->middleware('superadmin');
    Route::get('/auth/login-cover', 'authentications\LoginCover@index')->name('auth-login-cover');
    Route::get('/auth/register-front', 'authentications\RegisterFront@index')->name('auth-register-front');
    Route::get('/auth/register-basic', 'authentications\RegisterBasic@index')->name('auth-register-basic');
    Route::get('/auth/register-cover', 'authentications\RegisterCover@index')->name('auth-register-cover');
    Route::get('/auth/register-multisteps', 'authentications\RegisterMultiSteps@index')->name('auth-register-multisteps');
    Route::get('/auth/verify-email-front', 'authentications\VerifyEmailFront@index')->name('auth-verify-email-front');
    Route::get('/auth/verify-email-basic', 'authentications\VerifyEmailBasic@index')->name('auth-verify-email-basic');
    Route::get('/auth/verify-email-cover', 'authentications\VerifyEmailCover@index')->name('auth-verify-email-cover');
    Route::get('/auth/reset-password-front', 'authentications\ResetPasswordFront@index')->name('auth-reset-password-front');
    Route::get('/auth/reset-password-basic', 'authentications\ResetPasswordBasic@index')->name('auth-reset-password-basic');
    Route::get('/auth/reset-password-cover', 'authentications\ResetPasswordCover@index')->name('auth-reset-password-cover');
    Route::get('/auth/forgot-password-front', 'authentications\ForgotPasswordFront@index')->name('auth-forgot-password-front');
    Route::get('/auth/forgot-password-basic', 'authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');
    Route::get('/auth/forgot-password-cover', 'authentications\ForgotPasswordCover@index')->name('auth-forgot-password-cover');
    Route::get('/auth/two-steps-front', 'authentications\TwoStepsFront@index')->name('auth-two-steps-front');
    Route::get('/auth/two-steps-basic', 'authentications\TwoStepsBasic@index')->name('auth-two-steps-basic');
    Route::get('/auth/two-steps-cover', 'authentications\TwoStepsCover@index')->name('auth-two-steps-cover');

    // wizard example
    Route::get('/wizard/ex-checkout', 'wizard_example\Checkout@index')->name('wizard-ex-checkout');
    Route::get('/wizard/ex-property-listing', 'wizard_example\PropertyListing@index')->name('wizard-ex-property-listing');
    Route::get('/wizard/ex-create-deal', 'wizard_example\CreateDeal@index')->name('wizard-ex-create-deal');

    // modal
    Route::get('/modal-examples', 'modal\ModalExample@index')->name('modal-examples');

    // cards
    Route::get('/cards/basic', 'cards\CardBasic@index')->name('cards-basic');
    Route::get('/cards/advance', 'cards\CardAdvance@index')->name('cards-advance');
    Route::get('/cards/statistics', 'cards\CardStatistics@index')->name('cards-statistics');
    Route::get('/cards/analytics', 'cards\CardAnalytics@index')->name('cards-analytics');
    Route::get('/cards/actions', 'cards\CardActions@index')->name('cards-actions');

    // User Interface
    Route::get('/ui/accordion', 'user_interface\Accordion@index')->name('ui-accordion');
    Route::get('/ui/alerts', 'user_interface\Alerts@index')->name('ui-alerts');
    Route::get('/ui/badges', 'user_interface\Badges@index')->name('ui-badges');
    Route::get('/ui/buttons', 'user_interface\Buttons@index')->name('ui-buttons');
    Route::get('/ui/carousel', 'user_interface\Carousel@index')->name('ui-carousel');
    Route::get('/ui/collapse', 'user_interface\Collapse@index')->name('ui-collapse');
    Route::get('/ui/dropdowns', 'user_interface\Dropdowns@index')->name('ui-dropdowns');
    Route::get('/ui/footer', 'user_interface\Footer@index')->name('ui-footer');
    Route::get('/ui/list-groups', 'user_interface\ListGroups@index')->name('ui-list-groups');
    Route::get('/ui/modals', 'user_interface\Modals@index')->name('ui-modals');
    Route::get('/ui/navbar', 'user_interface\Navbar@index')->name('ui-navbar');
    Route::get('/ui/offcanvas', 'user_interface\Offcanvas@index')->name('ui-offcanvas');
    Route::get('/ui/pagination-breadcrumbs', 'user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
    Route::get('/ui/progress', 'user_interface\Progress@index')->name('ui-progress');
    Route::get('/ui/spinners', 'user_interface\Spinners@index')->name('ui-spinners');
    Route::get('/ui/tabs-pills', 'user_interface\TabsPills@index')->name('ui-tabs-pills');
    Route::get('/ui/toasts', 'user_interface\Toasts@index')->name('ui-toasts');
    Route::get('/ui/tooltips-popovers', 'user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
    Route::get('/ui/typography', 'user_interface\Typography@index')->name('ui-typography');

    // extended ui
    Route::get('/extended/ui-avatar', 'extended_ui\Avatar@index')->name('extended-ui-avatar');
    Route::get('/extended/ui-blockui', 'extended_ui\BlockUI@index')->name('extended-ui-blockui');
    Route::get('/extended/ui-drag-and-drop', 'extended_ui\DragAndDrop@index')->name('extended-ui-drag-and-drop');
    Route::get('/extended/ui-media-player', 'extended_ui\MediaPlayer@index')->name('extended-ui-media-player');
    Route::get('/extended/ui-perfect-scrollbar', 'extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
    Route::get('/extended/ui-star-ratings', 'extended_ui\StarRatings@index')->name('extended-ui-star-ratings');
    Route::get('/extended/ui-sweetalert2', 'extended_ui\SweetAlert@index')->name('extended-ui-sweetalert2');
    Route::get('/extended/ui-text-divider', 'extended_ui\TextDivider@index')->name('extended-ui-text-divider');
    Route::get('/extended/ui-timeline-basic', 'extended_ui\TimelineBasic@index')->name('extended-ui-timeline-basic');
    Route::get('/extended/ui-timeline-fullscreen', 'extended_ui\TimelineFullscreen@index')->name('extended-ui-timeline-fullscreen');
    Route::get('/extended/ui-tour', 'extended_ui\Tour@index')->name('extended-ui-tour');
    Route::get('/extended/ui-treeview', 'extended_ui\Treeview@index')->name('extended-ui-treeview');
    Route::get('/extended/ui-misc', 'extended_ui\Misc@index')->name('extended-ui-misc');

    // icons
    Route::get('/icons/tabler', 'icons\Tabler@index')->name('icons-tabler');
    Route::get('/icons/font-awesome', 'icons\FontAwesome@index')->name('icons-font-awesome');

    // form elements
    Route::get('/forms/input-groups', 'form_elements\InputGroups@index')->name('forms-input-groups');
    Route::get('/forms/custom-options', 'form_elements\CustomOptions@index')->name('forms-custom-options');
    Route::get('/forms/editors', 'form_elements\Editors@index')->name('forms-editors');
    Route::get('/forms/file-upload', 'form_elements\FileUpload@index')->name('forms-file-upload');
    Route::get('/forms/pickers', 'form_elements\Picker@index')->name('forms-pickers');
    Route::get('/forms/selects', 'form_elements\Selects@index')->name('forms-selects');
    Route::get('/forms/sliders', 'form_elements\Sliders@index')->name('forms-sliders');
    Route::get('/forms/switches', 'form_elements\Switches@index')->name('forms-switches');
    Route::get('/forms/extras', 'form_elements\Extras@index')->name('forms-extras');

    // form layouts
    Route::get('/form/layouts-vertical', 'form_layouts\VerticalForm@index')->name('form-layouts-vertical');
    Route::get('/form/layouts-horizontal', 'form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');
    Route::get('/form/layouts-sticky', 'form_layouts\StickyActions@index')->name('form-layouts-sticky');

    // form wizards
    Route::get('/form/wizard-numbered', 'form_wizard\Numbered@index')->name('form-wizard-numbered');
    Route::get('/form/wizard-icons', 'form_wizard\Icons@index')->name('form-wizard-icons');
    Route::get('/form/validation', 'form_validation\Validation@index')->name('form-validation');

    // tables
    // Route::get('/tables/basic', 'tables\Basic@index')->name('tables-basic');
    Route::get('/tables/datatables-basic', 'tables\DatatableBasic@index')->name('tables-datatables-basic');
    Route::get('/tables/datatables-advanced', 'tables\DatatableAdvanced@index')->name('tables-datatables-advanced');
    Route::get('/tables/datatables-extensions', 'tables\DatatableExtensions@index')->name('tables-datatables-extensions');

    // charts
    Route::get('/charts/apex', 'charts\ApexCharts@index')->name('charts-apex');
    Route::get('/charts/chartjs', 'charts\ChartJs@index')->name('charts-chartjs');

    // maps
    Route::get('/maps/leaflet', 'maps\Leaflet@index')->name('maps-leaflet');
});
// laravel example
Route::get('/laravel/user-management', [UserManagement::class, 'UserManagement'])->name('laravel-example-user-management');
Route::resource('/user-list', UserManagement::class);

