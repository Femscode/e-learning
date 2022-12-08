<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\NewadminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

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

// Route::get('/', function () {return view('welcome');});

Auth::routes();
Route::any('uuid', function() {
$users = User::get();
foreach($users as $user) {
    $user->uuid = Str::uuid();
    $user->save();
}    
    return Str::uuid();
});
Route::get('/', function () { return redirect('userdashboard'); });
Route::get('/logout',[LoginController::class,'logout'])->name("logout");
Route::get('get_ajax_data', [TestController::class, 'get_ajax_data'])->name('get_ajax_data');
Route::get('searchtest', [TestController::class, 'searchtest'])->name('searchtest');
Route::any('show_user_details',[AdminController::class, 'showUserDetails'])->name('show_user_details');
Route::any('calenderschedule',[AdminController::class, 'calenderschedule'])->name('calenderschedule');
Route::any('allcalenderschedule',[AdminController::class, 'allcalenderschedule'])->name('allcalenderschedule');

Route::group(['middleware' => 'auth'], function () {
    //route for hadling files management
      
Route::any('/updatePic',[AdminController::class,'updatePic'])->name('updatePic');   
Route::any('/folder/document/{id}',[AdminController::class,'folderdocument'])->name('folderdocument');   
Route::any('/download/{id}',[AdminController::class,'download'])->name('download');   
Route::any('/view/{id}',[AdminController::class,'view'])->name('view');   
Route::any('/uploaddocument/{id}',[UserController::class,'uploaddocument'])->name('uploaddocument');   
Route::any('/viewuploadedocument/{id}',[UserController::class,'viewuploadedocument'])->name('viewuploadedocument');   
Route::any('/userdashboard',[UserController::class,'userdashboard'])->name('userdashboard');   
Route::any('/userdashboard2',[UserController::class,'userdashboard2'])->name('userdashboard2');   
Route::any('/createuploadeddocument',[AdminController::class,'createuploadeddocument'])->name('createuploadeddocument');   
Route::any('/usersideuploadeddocument',[AdminController::class,'usersideuploadeddocument'])->name('usersideuploadeddocument');   
Route::any('/downloaduploadeddocument/{id}',[AdminController::class,'downloaduploadeddocument'])->name('downloaduploadeddocument');   

Route::get('dashboard/index', [DashboardController::class,'index'])->name('dashboard.index');
//Route for handling the test module
Route::get('/result/user/{userId}/quiz/{quizId}',[TestController::class, 'viewResult'])->middleware('auth');
Route::any('/checkuserresult/{userid}/{testid}',[TestController::class,'checkuserresult'])->name('checkuserresult');
Route::any('/starttest/{id}',[TestController::class,'starttest'])->name('starttest');
Route::any('/submittest',[TestController::class,'submittest'])->name('submittest');
Route::any('/finishtest',[TestController::class,'finishtest'])->name('finishtest');
Route::any('/usertest',[UserController::class,'test'])->name('usertest');
Route::any('/getregisteruser',[UserController::class,'getregisteruser'])->name('getregisteruser');
//Route for handling the question module
});
Route::group(['middleware' => ['auth','isAdmin']], function () {
    //route for pagination

    Route::any('userlist',[NewadminController::class,'userlist'])->name('userlist');
    Route::any('adminschedulelist',[NewadminController::class,'adminschedulelist'])->name('adminschedulelist');
    Route::any('adminviewuser/{id}',[NewadminController::class,'adminviewuser'])->name('adminviewuser');
Route::any('/adminschedulecalendar',[NewadminController::class, 'adminschedulecalendar'])->name('adminschedulecalendar');
Route::any('/questionlist',[NewadminController::class,'question2'])->name('questionlist');
Route::any('/testlist',[NewadminController::class,'testlist'])->name('testlist');
// Route::any('/questionstore',[QuestionController::class,'store'])->name('question.store');

    Route::any('/userpagination', [DashboardController::class,'fetchuser'])->name('userpagination');    
    Route::any('/schedulepagination', [DashboardController::class,'fetchschedule'])->name('schedulepagination');    
    Route::any('/testpagination', [DashboardController::class,'fetchtest'])->name('testpagination');    
    Route::any('/questionpagination', [DashboardController::class,'fetchquestion'])->name('questionpagination');    
    Route::any('/assignpagination', [DashboardController::class,'fetchassign'])->name('assignpagination');    
    Route::any('/folderpagination/{id}', [DashboardController::class,'fetchfolder'])->name('folderpagination');    
    Route::any('/filteruser', [DashboardController::class,'filteruser'])->name('filteruser');    
    Route::any('/filtertest', [DashboardController::class,'filtertest'])->name('filtertest');    
    Route::any('/filterquestion', [DashboardController::class,'filterquestion'])->name('filterquestion');    
    Route::any('/filterdocument', [DashboardController::class,'filterdocument'])->name('filterdocument');       
    Route::any('/filterassign', [DashboardController::class,'filterassign'])->name('filterassign');    
    Route::any('/filepagination/{id}', [DashboardController::class,'fetchfile'])->name('filepagination');    

    
    Route::get('/admin', [DashboardController::class,'admin'])->name('admin');    
    // Route::get('/admin',[NewadminController::class,'userlist'])->name('admin');    

    Route::get('/userdetails/{id}', [DashboardController::class,'userdetails'])->name('userdetails');  
Route::any('/adminfolder',[AdminController::class,'adminfolder'])->name('adminfolder');   
Route::any('/adminfolder',[AdminController::class,'adminfolder'])->name('adminfolder');   
Route::any('/adminfile/{id}',[AdminController::class,'adminfile'])->name('adminfile');   
// Route::any('/assigndocument/{documentId}/{userId}',[AdminController::class,'assigndocument'])->name('assigndocument');   
Route::any('/assigndocument',[AdminController::class,'assigndocument'])->name('assigndocument');   
Route::any('/assignpage/{id}',[AdminController::class,'assignpage'])->name('assignpage');   
Route::any('/assignfolder/{id}',[AdminController::class,'assignfolder'])->name('assignfolder');   
Route::any('/assignfolderdocument',[AdminController::class,'assignfolderdocument'])->name('assignfolderdocument');   
Route::any('/createfolder',[AdminController::class,'createfolder'])->name('createfolder');   
Route::any('/createfile/{id}',[AdminController::class,'createfile'])->name('createfile');   
Route::any('/deletefile',[AdminController::class,'deletefile'])->name('deletefile');   
Route::any('/deletefolder',[AdminController::class,'deletefolder'])->name('deletefolder');   
Route::any('/listuserdocument/{id}',[AdminController::class,'listuserdocument'])->name('listuserdocument');   
Route::any('/detachfile/{userId}/{id}',[AdminController::class,'detachfile'])->name('detachfile');   
Route::any('/detachfolder/{userId}/{id}',[AdminController::class,'detachfolder'])->name('detachfolder');   
Route::any('/userfolder',[AdminController::class,'userfolder'])->name('userfolder');   
Route::any('/useruploadedfolder',[AdminController::class,'useruploadedfolder'])->name('useruploadedfolder');   
Route::any('/uploadeddocument/{id}',[AdminController::class,'uploadeddocument'])->name('uploadeddocument');   
Route::any('/userdocument/{id}',[AdminController::class,'userdocument'])->name('userdocument');   
Route::get('/test',[TestController::class,'index'])->name('test.index');
Route::any('/teststore',[TestController::class,'store'])->name('test.store');
Route::any('/testquestion/{id}',[TestController::class,'question'])->name('test.question');
Route::any('/testedit/{id}',[TestController::class,'edit'])->name('test.edit');
Route::any('/edittestwithroute',[TestController::class,'edittestwithroute'])->name('edittestwithroute');
Route::any('/testupdate/{id}',[TestController::class,'update'])->name('test.update');
Route::any('/updatewithroute',[TestController::class,'updatewithroute'])->name('updatewithroute');
Route::any('/testdestroy/{id}',[TestController::class,'destroy'])->name('test.destroy');
Route::any('/testdestroy',[TestController::class,'destroy'])->name('test.destroy');
Route::any('/assign',[TestController::class,'showassign'])->name('assign');
Route::any('/assigntest',[TestController::class,'assign'])->name('test.assign');
Route::any('test/remove',[TestController::class,'removeTest'])->name('test.remove');
Route::any('/question',[QuestionController::class,'index'])->name('question.index');
Route::any('/editquestionwithroute',[QuestionController::class,'editquestionwithroute'])->name('editquestionwithroute');
Route::any('/questionstore',[QuestionController::class,'store'])->name('question.store');
Route::any('/questionshow/{id}',[QuestionController::class,'show'])->name('question.show');
Route::any('/questionedit/{id}',[QuestionController::class,'edit'])->name('question.edit');
Route::any('/questionupdate/{id}',[QuestionController::class,'update'])->name('question.update');
Route::any('/questiondestroy',[QuestionController::class,'destroy'])->name('question.destroy');
Route::any('/schedulemonth',[DashboardController::class,'schedulemonth'])->name('schedulemonth');
Route::any('/userdelete',[UserController::class,'destroy'])->name('user.destroy');


});

Route::group(['middleware' => ['auth','isAdmin', 'isSuperAdmin']], function () {
    
    Route::any('/makeadmin', [AdminController::class,'makeAdmin'])->name('makeadmin');    
    Route::any('/makeuser', [AdminController::class,'makeuser'])->name('makeuser');    
    Route::any('/access_control', [AdminController::class,'access_control'])->name('access_control');    
    Route::get('/access', [AdminController::class,'access'])->name('access');    
});
//Route for handling the User Module
Route::any('personalinformation',[UserController::class, 'personalinformation'])->name('personalinformation');
Route::any('nokinformation',[UserController::class, 'nokinformation'])->name('nokinformation');
Route::any('accountinformation',[UserController::class, 'accountinformation'])->name('accountinformation');
Route::any('shiftpreference',[UserController::class, 'shiftpreference'])->name('shiftpreference');
Route::any('workpreference',[UserController::class, 'workpreference'])->name('workpreference');
Route::any('savelicenses',[UserController::class, 'savelicenses'])->name('savelicenses');
Route::any('saveclientspecific',[UserController::class, 'saveclientspecific'])->name('saveclientspecific');
Route::any('savepreemployment',[UserController::class, 'savepreemployment'])->name('savepreemployment');
Route::any('savecertifications',[UserController::class, 'savecertifications'])->name('savecertifications');
Route::any('savemedical',[UserController::class, 'savemedical'])->name('savemedical');
Route::any('savetrainings',[UserController::class, 'savetrainings'])->name('savetrainings');
Route::any('saveadditionalcerts',[UserController::class, 'saveadditionalcerts'])->name('saveadditionalcerts');
Route::any('savebackgroundchecks',[UserController::class, 'savebackgroundchecks'])->name('savebackgroundchecks');
Route::any('savehr',[UserController::class, 'savehr'])->name('savehr');
Route::any('educationinformation',[UserController::class, 'educationinformation'])->name('educationinformation');
// Route::any('educationinformation',[UserController::class, 'edc'])->name('educationinformation');
Route::any('workinformation',[UserController::class, 'workinformation'])->name('workinformation');
Route::any('resumeinformation',[UserController::class, 'resumeinformation'])->name('resumeinformation');
Route::any('downloadresume/{id}',[UserController::class, 'downloadresume'])->name('downloadresume');
Route::any('downloadlicense/{id}',[UserController::class, 'downloadlicense'])->name('downloadlicense');
Route::any('downloadclientspecific/{id}',[UserController::class, 'downloadclientspecific'])->name('downloadclientspecific');
Route::any('downloadcertifications/{id}',[UserController::class, 'downloadcertifications'])->name('downloadcertifications');
Route::any('downloadmedical/{id}',[UserController::class, 'downloadmedical'])->name('downloadmedical');
Route::any('downloadadditionalcert/{id}',[UserController::class, 'downloadadditionalcert'])->name('downloadadditionalcert');
Route::any('downloadhr/{id}',[UserController::class, 'downloadhr'])->name('downloadhr');
Route::any('downloadbackgroundchecks/{id}',[UserController::class, 'downloadbackgroundchecks'])->name('downloadbackgroundchecks');
Route::any('downloadtrainings/{id}',[UserController::class, 'downloadtrainings'])->name('downloadtrainings');
Route::any('downloadpreemployment/{id}',[UserController::class, 'downloadpreemployment'])->name('downloadpreemployment');

//Route for handling the schedule module
Route::any('/admincalendar',[AdminController::class, 'admincalendar'])->name('admincalendar');
Route::any('/pendschedule/{id}',[AdminController::class, 'pendschedule'])->name('pendschedule');
Route::any('/markschedule/{id}',[AdminController::class, 'markschedule'])->name('markschedule');
Route::any('/unmarkschedule/{id}',[AdminController::class, 'unmarkschedule'])->name('unmarkschedule');
Route::any('/deleteschedule/{id}',[AdminController::class, 'deleteschedule'])->name('deleteschedule');
Route::any('/schedule',[AdminController::class, 'schedule'])->name('schedule');
Route::any('/schedulelist',[AdminController::class, 'schedulelist'])->name('schedulelist');
Route::any('/adminsortschedule',[AdminController::class, 'adminsortschedule'])->name('adminsortschedule');
Route::any('/scheduletask',[AdminController::class, 'scheduletask'])->name('scheduletask');
/* Dashboard */
Route::get('dashboard', function () { return redirect('dashboard/index'); });
Route::get('/home', [DashboardController::class,'index'])->name('home')->middleware('auth');

Route::any('/dashboard/{slug}', [DashboardController::class,'userForm'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', function () { return redirect('profile/my-profile'); });
Route::get('profile/my-profile', 'ProfileController@myProfile')->name('profile.my-profile');

/* App */
Route::get('app', function () { return redirect('app/inbox'); });
Route::get('app/inbox', 'AppController@inbox')->name('app.inbox');
Route::get('app/compose', 'AppController@compose')->name('app.compose');
Route::get('app/single', 'AppController@single')->name('app.single');
Route::get('app/chat', 'AppController@chat')->name('app.chat');
Route::get('app/calendar', 'AppController@calendar')->name('app.calendar');
Route::get('app/contact-list', 'AppController@contactList')->name('app.contact-list');

/* Project */
Route::get('project', function () { return redirect('project/project-list'); });
Route::get('project/project-list', 'ProjectController@projectList')->name('project.project-list');
Route::get('project/taskboard', 'ProjectController@taskboard')->name('project.taskboard');
Route::get('project/ticket-list', 'ProjectController@ticketList')->name('project.ticket-list');
Route::get('project/ticket-detail', 'ProjectController@ticketDetail')->name('project.ticket-detail');

/* File Manager */
Route::get('file-manager', function () { return redirect('file-manager/all'); });
Route::get('file-manager/all', 'FileManagerController@all')->name('file-manager.all');
Route::get('file-manager/documents', 'FileManagerController@documents')->name('file-manager.documents');
Route::get('file-manager/media', 'FileManagerController@media')->name('file-manager.media');
Route::get('file-manager/image', 'FileManagerController@image')->name('file-manager.image');

/* Blog */
Route::get('blog', function () { return redirect('blog/dashboard'); });
Route::get('blog/dashboard', 'BlogController@dashboard')->name('blog.dashboard');
Route::get('blog/new-post', 'BlogController@newPost')->name('blog.new-post');
Route::get('blog/list', 'BlogController@list')->name('blog.list');
Route::get('blog/grid', 'BlogController@grid')->name('blog.grid');
Route::get('blog/detail', 'BlogController@detail')->name('blog.detail');

/* Ecommerce */
Route::get('ecommerce', function () { return redirect('ecommerce/dashboard'); });
Route::get('ecommerce/dashboard', 'EcommerceController@dashboard')->name('ecommerce.dashboard');
Route::get('ecommerce/product', 'EcommerceController@product')->name('ecommerce.product');
Route::get('ecommerce/product-list', 'EcommerceController@productList')->name('ecommerce.product-list');
Route::get('ecommerce/product-detail', 'EcommerceController@productDetail')->name('ecommerce.product-detail');

/* components */
Route::get('components', function () { return redirect('components/ui'); });
Route::get('components/ui', 'ComponentsController@ui')->name('components.ui');
Route::get('components/alerts', 'ComponentsController@alerts')->name('components.alerts');
Route::get('components/collapse', 'ComponentsController@collapse')->name('components.collapse');
Route::get('components/colors', 'ComponentsController@colors')->name('components.colors');
Route::get('components/dialogs', 'ComponentsController@dialogs')->name('components.dialogs');
Route::get('components/list', 'ComponentsController@list')->name('components.list');
Route::get('components/media', 'ComponentsController@media')->name('components.media');
Route::get('components/modals', 'ComponentsController@modals')->name('components.modals');
Route::get('components/notifications', 'ComponentsController@notifications')->name('components.notifications');
Route::get('components/progressbars', 'ComponentsController@progressbars')->name('components.progressbars');
Route::get('components/range', 'ComponentsController@range')->name('components.range');
Route::get('components/sortable', 'ComponentsController@sortable')->name('components.sortable');
Route::get('components/tabs', 'ComponentsController@tabs')->name('components.tabs');
Route::get('components/waves', 'ComponentsController@waves')->name('components.waves');

/* Font Icons */
Route::get('icons', function () { return redirect('icons/material'); });
Route::get('icons/material', 'IconsController@material')->name('icons.material');
Route::get('icons/themify', 'IconsController@themify')->name('icons.themify');
Route::get('icons/weather', 'IconsController@weather')->name('icons.weather');

/* Form */
Route::get('form', function () { return redirect('form/basic'); });
Route::get('form/basic', 'FormController@basic')->name('form.basic');
Route::get('form/advanced', 'FormController@advanced')->name('form.advanced');
Route::get('form/examples', 'FormController@examples')->name('form.examples');
Route::get('form/validation', 'FormController@validation')->name('form.validation');
Route::get('form/wizard', 'FormController@wizard')->name('form.wizard');
Route::get('form/editors', 'FormController@editors')->name('form.editors');
Route::get('form/upload', 'FormController@upload')->name('form.upload');
Route::get('form/summernote', 'FormController@summernote')->name('form.summernote');

/* Tables */
Route::get('tables', function () { return redirect('tables/normal'); });
Route::get('tables/normal', 'TablesController@normal')->name('tables.normal');
Route::get('tables/datatable', 'TablesController@datatable')->name('tables.datatable');
Route::get('tables/editable', 'TablesController@editable')->name('tables.editable');
Route::get('tables/footable', 'TablesController@footable')->name('tables.footable');
Route::get('tables/color', 'TablesController@color')->name('tables.color');

/* Chart */
Route::get('chart', function () { return redirect('chart/echarts'); });
Route::get('chart/echarts', 'ChartController@echarts')->name('chart.echarts');
Route::get('chart/c3', 'ChartController@c3')->name('chart.c3');
Route::get('chart/morris', 'ChartController@morris')->name('chart.morris');
Route::get('chart/flot', 'ChartController@flot')->name('chart.flot');
Route::get('chart/chartjs', 'ChartController@chartjs')->name('chart.chartjs');
Route::get('chart/sparkline', 'ChartController@sparkline')->name('chart.sparkline');
Route::get('chart/knob', 'ChartController@knob')->name('chart.knob');

/* Widgets */
Route::get('widgets', function () { return redirect('widgets/app'); });
Route::get('widgets/app', 'WidgetsController@app')->name('widgets.app');
Route::get('widgets/data', 'WidgetsController@data')->name('widgets.data');

/* Authentication */
Route::get('authentication', function () { return redirect('authentication/login'); });
Route::get('authentication/login', 'AuthenticationController@login')->name('authentication.login');
Route::get('authentication/register', 'AuthenticationController@register')->name('authentication.register');
Route::get('authentication/lockscreen', 'AuthenticationController@lockscreen')->name('authentication.lockscreen');
Route::get('authentication/forgot', 'AuthenticationController@forgot')->name('authentication.forgot');
Route::get('authentication/page404', 'AuthenticationController@page404')->name('authentication.page404');
Route::get('authentication/page500', 'AuthenticationController@page500')->name('authentication.page500');
Route::get('authentication/offline', 'AuthenticationController@offline')->name('authentication.offline');

/* Pages */
Route::get('pages', function () { return redirect('pages/blank-page'); });
Route::get('pages/blank', 'PagesController@blank')->name('pages.blank');
Route::get('pages/gallery', 'PagesController@gallery')->name('pages.gallery');
Route::get('pages/invoices1', 'PagesController@invoices1')->name('pages.invoices1');
Route::get('pages/invoices2', 'PagesController@invoices2')->name('pages.invoices2');
Route::get('pages/pricing', 'PagesController@pricing')->name('pages.pricing');
Route::get('pages/profile', 'PagesController@profile')->name('pages.profile');
Route::get('pages/search', 'PagesController@search')->name('pages.search');
Route::get('pages/timeline', 'PagesController@timeline')->name('pages.timeline');

/* Maps */
Route::get('map', function () { return redirect('map/google'); });
Route::get('map/yandex', 'MapController@yandex')->name('map.yandex');
Route::get('map/jvector', 'MapController@jvector')->name('map.jvector');
