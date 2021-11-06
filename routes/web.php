<?php

use App\Http\Livewire\Admin\Admin;
use App\Http\Livewire\Admin\Blog as AdminBlog;
use App\Http\Livewire\Admin\BookFlight;
use App\Http\Livewire\Admin\Category;
use App\Http\Livewire\Admin\Comment;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\FlightCategory;
use App\Http\Livewire\Admin\Flight as AdminFlight;
use App\Http\Livewire\Admin\Users as AdminUsers;
use App\Http\Livewire\Admin\Review;
use App\Http\Livewire\AdminAuth\Login as AdminAuthLogin;
use App\Http\Livewire\Pages\About;
use App\Http\Livewire\Pages\Blog;
use App\Http\Livewire\Pages\BlogDetail;
use App\Http\Livewire\Pages\CategoryFlight;
use App\Http\Livewire\Pages\Contact;
use App\Http\Livewire\Pages\Flight;
use App\Http\Livewire\Pages\FlightDetail;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\UserAuth\Login;
use App\Http\Livewire\UserAuth\Signup;
use App\Http\Livewire\UserDashboard\Dashboard;
use App\Http\Livewire\UserDashboard\MyBooking;
use App\Http\Livewire\UserDashboard\MyProfile;
use App\Http\Livewire\UserDashboard\MyReview;
use Illuminate\Support\Facades\Route;




// user routes start{
Route::middleware(['guest'])->group(function () {
    Route::get("/registration", Signup::class)->name("registration");
    Route::get("/login", Login::class)->name("login");
});
Route::middleware(['auth'])->group(function () {
    Route::prefix("/user")->group(function(){
        Route::get('/dashboard',Dashboard::class)->name('user.dashboard');
        Route::get('/review',MyReview::class)->name('user.myreview');
        Route::get('/profile',MyProfile::class)->name('user.profile');
        Route::get('/booking',MyBooking::class)->name('user.booking');
    });
});
Route::get('/', Home::class);
Route::get("/blog", Blog::class)->name("blog");
Route::get("/blog-detail/{slug}", BlogDetail::class)->name("blogdetail");
Route::get("/fligths", Flight::class)->name("flight");
Route::get("/flight-detail/{slug}", FlightDetail::class)->name("flightdetail");
Route::get("/flight-category/{slug}", CategoryFlight::class)->name("categoryflight");
Route::get("/contact", Contact::class)->name("contact");
Route::get("/about", About::class)->name("about");
// }user routes end


// admin routes start{
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login',AdminAuthLogin::class)->name("admin.login");
});
Route::middleware(['auth:admin','admin'])->group(function () {
    Route::prefix('/admin')->group(function(){
        // Route::get('/',AdminAuthLogin::class);
        Route::get('/dashboard',AdminDashboard::class)->name("admin.dashboard");
        Route::get('/posts',AdminBlog::class)->name('admin.post');
        Route::get('/category',Category::class)->name('admin.category');
        Route::get('/flightcategory',FlightCategory::class)->name('admin.flightcategory');
        Route::get('/flight',AdminFlight::class)->name('admin.flight');
        Route::get('/admins',Admin::class)->name('admin.admins');
        Route::get('/users',AdminUsers::class)->name('admin.users');
        Route::get('/bookflight',BookFlight::class)->name('admin.booked');
        Route::get('/reviews',Review::class)->name('admin.reviews');
        Route::get('/comments',Comment::class)->name('admin.comment');
    }); 
});

Route::middleware(['auth:admin','noadmin'])->group(function () {
    Route::prefix('/normal')->group(function(){
        Route::get('/post',AdminBlog::class)->name('normal.posts');
        Route::get('/flight',AdminFlight::class)->name('normal.flight');
    }); 
});


// } admin routes end


