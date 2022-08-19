<?php
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PbypController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::get('/dashboard', [HomeController::class, 'Home'])->name('news')->middleware(['auth'])->name('dashboard');
Route::get('/news', [NewsController::class, 'getNews'])->name('news');
Route::get('/tournament', [TournamentController::class, 'inittournament'])->name('tournament');
Route::get('/roster', [EventController::class, 'getroster'])->name('roster');
Route::get('/result', [EventController::class, 'getresult'])->name('result');
Route::get('/schedule', [EventController::class, 'getschedule'])->name('schedule');
Route::get('/pbyp', [EventController::class, 'initpbyp'])->name('pbyp');
Route::post('/changePbyp', [EventController::class, 'changePbyp'])->name('changePbyp');
Route::get('/changeMode/{mode}', [SessionController::class, 'changeMode'])->name('changeMode');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['permission'])->group(function () {
        Route::get('/addNews', function(){
            return view('admin.news');
        })->name('addNews');
        Route::post('/insertNews', [NewsController::class, 'store'])->name('insertNews');
        
        Route::get('/addTeamMembers',[MemberController::class,'getmember'])->name('addTeamMembers');
        Route::post('insertMembers',[MemberController::class,'insertMembers'])->name('insertMembers');
        Route::post('removeMember',[MemberController::class,'removeMember'])->name('removeMember');
    
        Route::get('/addTeam', [MemberController::class, 'getTeam'])->name('addTeam');
        Route::post('insertTeam',[MemberController::class,'insertTeam'])->name('insertTeam');
        Route::post('removeTeam',[MemberController::class,'removeTeam'])->name('removeTeam');
    
        Route::get('/addTournament',[TournamentController::class,'gettournament'])->name('addTournament');
        Route::post('insertTournament',[TournamentController::class,'store'])->name('insertTournament');
    
        Route::get('/addCompetition',[BasicController::class,'getCompetition'])->name('addCompetition');
        Route::post('insertCompetition',[BasicController::class,'insertCompetition'])->name('insertCompetition');
        Route::post('removeCompetition',[BasicController::class,'removeCompetition'])->name('removeCompetition');
    
        Route::get('/addVenue',[BasicController::class,'getVenue'])->name('addVenue');
        Route::post('insertVenue',[BasicController::class,'insertVenue'])->name('insertVenue');
        Route::post('removeVenue',[BasicController::class,'removeVenue'])->name('removeVenue');
    
        Route::get('/addResult',[ResultController::class,'getResult'])->name('addResult');
        Route::post('insertResult',[ResultController::class,'insertResult'])->name('insertResult');
        Route::post('removeResult',[ResultController::class,'removeResult'])->name('removeResult');
    
        Route::get('/addSchedule',[ScheduleController::class,'getSchedule'])->name('addSchedule');
        Route::post('insertSchedule',[ScheduleController::class,'insertSchedule'])->name('insertSchedule');
        Route::post('removeSchedule',[ScheduleController::class,'removeSchedule'])->name('removeSchedule');
    
        Route::get('/addPbyp',[PbypController::class,'getPbyp'])->name('addPbyp');
        Route::post('insertPbyp',[PbypController::class,'insertPbyp'])->name('insertPbyp');
        Route::get('/admin', function(){
            return view('admin.home');
        })->name('admin');
        Route::get('userAccount',[AdminController::class, 'getUserAccount'])->name('userAccount')->middleware('admin');
        Route::get('createWindow',[AdminController::class, 'createWindow'])->name('createWindow')->middleware('admin');
        Route::post('changePermission',[AdminController::class, 'changePermission']);
        Route::post('removeUser',[AdminController::class, 'removeUser']);
        Route::post('createAccount',[AdminController::class, 'createAccount']);
    
        Route::get('userRole',[AdminController::class, 'getUserRole'])->name('userRole')->middleware('admin');
        Route::get('getTreeData',[AdminController::class, 'getTreeData'])->name('getTreeData');
        Route::post('changeRole',[AdminController::class, 'changeRole']);
    
        
    });

});

require __DIR__.'/auth.php';
