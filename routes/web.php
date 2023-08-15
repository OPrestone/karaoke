<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Routes;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LyricsController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\VotingController;
use App\Http\Controllers\MultiSongController;
use App\Http\Middleware\IsNotAdminMiddleware;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\Admin\RegistrationController;



Auth::routes();

Route::get('social-share', [SocialShareController::class, 'index']);
Route::get('/live', [HomeController::class, 'live']);
 Route::get('/seed-genre', [GenreController::class, 'seedGenres']);
  Route::get('/all-search', [App\Http\Controllers\Frontend\FrontendController::class, 'searchAll'])->name('search');

Route::get('artists', [ArtistController::class,'all']);
Route::get('artist/{artist_id}/{artist_name}', [App\Http\Controllers\ArtistController::class, 'frontendView']);
Route::get('my-profile/{user_id}/{user_first_name}',[App\Http\Controllers\Admin\UserController::class,'myProfile']);
Route::get('rate', [App\Http\Controllers\VotingController::class, 'rate']);



Route::prefix('mobile')->group(function()
{
   Route::get('/live', [HomeController::class, 'live']);

});



Route::get('/import-song', [SongController::class, 'retrieveSongMetadata'])->name('songs.retrieve');

// Import artists

Route::get('/import-artist', [ArtistController::class, 'index'])->name('dashboard.artists.index');
Route::match(['get', 'post'], '/artists/import', [ArtistController::class, 'import'])->name('dashboard.artists.import');

Route::get('/import-song', [SongController::class, 'index'])->name('dashboard.songs.index');
Route::get('/songs', [SongController::class, 'viewAll'])->name('frontend.songs.all');
Route::get('/import-songs', [MultiSongController::class, 'index'])->name('dashboard.songss.index');
Route::match(['get', 'post'], '/songs/import', [SongController::class, 'import'])->name('dashboard.songs.import');
Route::match(['get', 'post'], '/songs/import/multiples', [MultiSongController::class, 'import'])->name('dashboard.songss.import');

Route::get('/songs/import-random', [SongController::class, 'importRandomSong'])->name('dashboard.songs.background');
Route::get('/song/{track_id}/{track_name}{name}', [App\Http\Controllers\Frontend\FrontendController::class, 'songView']);
Route::get('view/song/{track_id}/{track_name}{name}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewSong']);
Route::get('/video/{track_id}/{track_name}{name}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewSongVideo']);

Route::get('/all-songs', [App\Http\Controllers\SongController::class, 'all']);

// Route::get('/songs/import', [SongController::class, 'fetchData'])->name('dashboard.songs.import');

Route::get('/events', [App\Http\Controllers\Admin\RegistrationController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'hoo']);
Route::get('/amp', [App\Http\Controllers\Frontend\AmpController::class, 'index']);
Route::get('home', [App\Http\Controllers\Frontend\FrontendController::class, 'home']);
Route::get('iscategory/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('videos', [App\Http\Controllers\Frontend\FrontendController::class, 'allVideos']);
Route::get('isauthor/{user_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewAuthor']);
Route::get('/article/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);
Route::get('/video/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewVideo']);
Route::get('view/video/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'videoView']);
Route::get('/article/{post_slug}', [App\Http\Controllers\AuthorController::class, 'author']);
Route::get('/tags/{keyword}', [App\Http\Controllers\Frontend\FrontendController::class, 'tag']);
Route::get('/mainsitemap', [App\Http\Controllers\Frontend\FrontendController::class, 'sitemap']);
Route::get('/googlenews', [App\Http\Controllers\Frontend\FrontendController::class, 'googlenews']);
Route::get('/radios', [App\Http\Controllers\Frontend\FrontendController::class, 'radios']);
Route::post('comment', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
Route::post('search')->name('search');

Route::get('/search/', [SearchController::class,'search'])->name('search');
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

 Route::prefix('amp')->group(function()
 {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\Frontend\AmpController::class, 'index']);
    Route::get('home', [App\Http\Controllers\Frontend\AmpController::class, 'home']);
    Route::get('iscategory/{category_slug}', [App\Http\Controllers\Frontend\AmpController::class, 'viewCategoryPost']);
    Route::get('videos', [App\Http\Controllers\Frontend\AmpController::class, 'viewVideoPost']);
    Route::get('isauthor/{user_id}', [App\Http\Controllers\Frontend\AmpController::class, 'viewAuthor']);
    Route::get('/article/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\AmpController::class, 'viewPost']);
    Route::get('/video/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\AmpController::class, 'viewVideo']);
    Route::get('/article/{post_slug}', [App\Http\Controllers\AuthorController::class, 'author']);
    Route::post('comment', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
 });


   Route::middleware(['auth'])->group(function () {
      Route::get('event/{event_id}/register', [RegistrationController::class, 'create']);
      Route::post('event/{event_id}/register', [RegistrationController::class,'store']);

      Route::get('vote/{event_id}/', [VotingController::class, 'create']);
      Route::post('vote/{event_id}/', [VotingController::class,'store']);

      Route::prefix('user')->middleware('isNotAdmin')->group(function () {
      });
   });

   Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function()
   {
    Route::prefix('screen')->group(function()
    {
        Route::get('/{event_id}/{first_name}', [ScreenController::class, 'viewUser']);
        Route::get('winner/', [ScreenController::class, 'winnerTop']);
        Route::get('/{event_id}/{first_name}/voting', [ScreenController::class, 'voteUser']);

    });
      // Images
      Route::get('/images', [ImageController::class, 'index'])->name('dashboard.albums.images.index');
      Route::get('/images/create', [ImageController::class, 'create'])->name('dashboard.albums.images.create');
      Route::post('/images', [ImageController::class, 'store'])->name('dashboard.albums.images.store');
      Route::get('/images/{album}/edit', [ImageController::class, 'edit'])->name('dashboard.albums.images.edit');
      Route::put('/images/{album}', [ImageController::class, 'update'])->name('dashboard.albums.images.update');
      Route::delete('/images/{album}', [ImageController::class, 'destroy'])->name('dashboard.albums.images.destroy');
      Route::post('/albums/{album}/images', 'ImageController@store')->name('albums.images.store');


      // Albums

      Route::get('/albums', [AlbumController::class, 'index'])->name('dashboard.albums.index');
      Route::get('/albums/create', [AlbumController::class, 'create'])->name('dashboard.albums.create');
      Route::post('/albums', [AlbumController::class, 'store'])->name('dashboard.albums.store');
      Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('dashboard.albums.edit');
      Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('dashboard.albums.update');
      Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('dashboard.albums.destroy');

      Route::get('/albums/{album}/images', [ImageController::class, 'index'])->name('dashboard.albums.images.index');
      Route::get('/albums/{album}/images/create', [ImageController::class, 'create'])->name('dashboard.albums.images.create');
      Route::post('/albums/{album}/images', [ImageController::class, 'store'])->name('dashboard.albums.images.store');
      Route::get('/albums/{album}/images/{image}/edit', [ImageController::class, 'edit'])->name('dashboard.albums.images.edit');
      Route::put('/albums/{album}/images/{image}', [ImageController::class, 'update'])->name('dashboard.albums.images.update');
      Route::delete('/albums/{album}/images/{image}', [ImageController::class, 'destroy'])->name('dashboard.albums.images.destroy');


      // Lyrics

      Route::get('/lyrics', [LyricsController::class, 'index'])->name('lyrics.index');
      Route::post('/lyrics', [LyricsController::class, 'store'])->name('lyrics.store');



    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('create-song', [App\Http\Controllers\SongController::class,'create']);
    Route::post('create-song', [App\Http\Controllers\SongController::class,'store']);
    Route::get('add-event', [App\Http\Controllers\Admin\EventController::class,'create']);
    Route::get('artists', [App\Http\Controllers\ArtistController::class,'all']);

    Route::post('add-event', [App\Http\Controllers\Admin\EventController::class,'store']);
    Route::get('events',[App\Http\Controllers\Admin\EventController::class,'index']);
    Route::get('event/{event_id}',[App\Http\Controllers\Admin\EventController::class,'view']);
    Route::get('edit-event/{event_id}', [App\Http\Controllers\Admin\EventController::class,'edit']);
    Route::match(['get', 'post'], 'update-event/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'update']);
    Route::get('delete-event/{event_id}', [App\Http\Controllers\Admin\EventController::class,'destroy']);
    Route::get('artist/{artist_id}/{artist_name}', [App\Http\Controllers\ArtistController::class, 'view']);
    Route::get('events/qrcode',[App\Http\Controllers\Admin\EventController::class,'qrcode']);
    Route::get('category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy']);
    Route::get('posts',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('drafts',[App\Http\Controllers\Admin\PostController::class,'drafts']);
    Route::get('videos',[App\Http\Controllers\Admin\VideosController::class,'index']);
    Route::get('/video/{category_slug}/{post_slug}', [App\Http\Controllers\Admin\VideosController::class, 'viewVideo']);
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('add-video',[App\Http\Controllers\Admin\VideosController::class,'create']);
    Route::post('add-video',[App\Http\Controllers\Admin\VideosController::class,'store']);
    Route::get('post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::get('profile/{user_id}/{user_first_name}',[App\Http\Controllers\Admin\UserController::class,'profile']);
    Route::get('video/{post_id}',[App\Http\Controllers\Admin\VideosController::class,'edit']);
    Route::put('update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update']);
    Route::get('delete-video/{post_id}',[App\Http\Controllers\Admin\VideosController::class,'destroy']);
    Route::put('update-video/{post_id}',[App\Http\Controllers\Admin\VideosController::class,'update']);
    Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'destroy']);
    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::get('delete-reg/{user_id}', [App\Http\Controllers\Admin\RegistrationController::class,'destroy']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});


Route::post('/vote/{singer}', [VoteController::class, 'submitVote'])->name('vote.submit');
Route::get('/live-votes', [VoteController::class, 'getLiveVotes'])->name('vote.live');
Route::get('/singers', [VoteController::class, 'index'])->name('vote.index');
Route::get('/vote/{singer}', [VoteController::class, 'vote'])->name('vote');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
