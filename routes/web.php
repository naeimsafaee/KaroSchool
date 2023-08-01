<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyController;
use App\Http\Controllers\Blog\BlogCommentController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\SingleBlogController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\PaymentController;
use App\Http\Controllers\Course\CommentController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Course\LessonController;
use App\Http\Controllers\Course\SingleCourseController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\YaldaController;
use App\Http\Controllers\Profile\EditProfileController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Search\TopicSearchController;
use App\Http\Controllers\Topic\AnswerController;
use App\Http\Controllers\Topic\CreatTopicController;
use App\Http\Controllers\Topic\TopicController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', HomeController::class)->name('home');
//Route::get('/database', [HomeController::class , 'hjhj']);
Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::post('/contact_us', [HomeController::class, 'contact_us_submit'])->name('contact_us_submit');
Route::get('/search', SearchController::class)->name('search');
Route::get('/faq', [HomeController::class , 'faq'])->name('faq');
Route::get('/terms', [HomeController::class , 'term'])->name('term');
Route::get('/support', [HomeController::class , 'support'])->name('support');


//yalda
Route::get('/yalda', YaldaController::class)->name('yalda');
Route::post('/yalde_code', [YaldaController::class , 'yalde_code'])->name('yalde_code');
Route::post('/yalde_submit', [YaldaController::class , 'yalde_submit'])->name('yalde_submit');
Route::post('/yalda_watermelon', [YaldaController::class , 'yalda_watermelon'])->name('yalda_watermelon');
Route::post('/poem', [YaldaController::class , 'poem'])->name('poem');
Route::post('/submit_poem', [YaldaController::class , 'submit_poem'])->name('submit_poem');


//auth
Route::get('/login', LoginController::class)->name('login');
Route::get('/login/password', [LoginController::class, 'password_2'])->name('login_password_2');
Route::post('/login/password', [LoginController::class, 'password'])->middleware(['throttle:10,1'])->name('login_password');
Route::post('/login/password_submit', [LoginController::class, 'password_submit'])->middleware(['throttle:10,1'])->middleware(['throttle:10,1'])->name('password_submit');
Route::get('/login/disposable', [LoginController::class, 'disposable'])->name('disposable');
Route::get('/login/disposable2', [LoginController::class, 'disposable2'])->name('disposable2');
Route::post('/login/disposable_submit', [LoginController::class, 'disposable_submit'])->middleware(['throttle:10,1'])->name('disposable_submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', RegisterController::class)->name('register');
Route::post('/register_submit', [RegisterController::class, 'submit'])->middleware(['throttle:10,1'])->name('register_submit');


//profile
Route::middleware(['client_login'])->group(function(){
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::get('/profile/edit', EditProfileController::class)->name('edit_profile');
    Route::post('/profile/edit/submit', [EditProfileController::class, 'edit'])->name('edit_profile_submit');
    Route::post('/profile/edit/avatar', [EditProfileController::class, 'avatar_submit'])->name('avatar_submit');
    Route::get('/profile/course', \App\Http\Controllers\Profile\CourseController::class)->name('course_profile');
    Route::get('/profile/password', PasswordController::class)->name('password_profile');
    Route::post('/profile/password_submit', [PasswordController::class, 'submit'])->name('password_submit_profile');
    Route::post('/profile/password_submit/new', [PasswordController::class, 'new_password'])->name('new_password_submit_profile');

});
Route::get('/forget_password', ForgetPasswordController::class)->name('forget_password');
Route::post('/forget_password', [ForgetPasswordController::class , 'submit'])->middleware(['throttle:10,1'])->name('forget_password');
Route::get('/forget2', [ForgetPasswordController::class , 'step_2'])->name('forget2');
Route::get('/forget2/{reset_link}', [ForgetPasswordController::class , 'step_3'])->middleware(['throttle:10,1'])->name('forget_code');

Route::get('/verify_email/{reset_link}', [VerifyController::class , 'verify_email'])->middleware(['throttle:10,1'])->name('verify_email');

Route::get('/forget/change', [ForgetPasswordController::class , 'change_submit_show'])->name('change_password');
Route::post('/forget/change', [ForgetPasswordController::class , 'change_submit'])->middleware(['throttle:10,1'])->name('change_submit');


//blog
Route::get('/blog/{slug?}', BlogController::class)->name('blog');
Route::post('/blog/comment', BlogCommentController::class)->name('blog_comment');
Route::get('/blog/single/{slug}', SingleBlogController::class)->name('single_blog');


//course

Route::get('/course', CourseController::class)->name('course');
Route::get('/course/{id}', [SingleCourseController::class , 'free'])->middleware('client_login')->name('course_free');
Route::post('/course/comment', CommentController::class)->name('course_comment');
Route::get('/course/single/{slug}', SingleCourseController::class)->name('single_course');
Route::get('/course/single/{slug}/{lesson_id}', LessonController::class)->middleware('client_login')->name('lesson');
Route::get('/see_lesson/{lesson}/{course}', [LessonController::class , 'see_lesson'])->name('see_lesson');


//cart
Route::get('/pay', [PaymentController::class, 'pay'])->middleware('client_login')->name('payment');
Route::get('/callback', [PaymentController::class, 'verify'])->middleware('client_login')->name('callback');
Route::get('/cart', CartController::class)->middleware('client_login')->name('cart');
Route::get('/add_to_cart/{id}', [CartController::class, 'add'])->middleware('client_login')->name('add_to_cart');
Route::post('/cart/discount', [CartController::class, 'discount'])->middleware('client_login')->name('discount_cart');


//topic
Route::get('/topic/create', CreatTopicController::class)->middleware('client_login')->name('topic_create');
Route::post('/topic/document_submit', [CreatTopicController::class , 'document_submit'])->name('document_submit');
Route::post('/topic/create_submit', [CreatTopicController::class , 'submit'])->middleware('client_login')->name('topic_submit');
Route::get('/topics/{slug}', TopicController::class)->name('topics');
Route::get('/topic/{id}', [TopicController::class , 'single'])->name('single_topic');
Route::post('/profile/like_topic', [TopicController::class , 'like_topic'])->name('like_topic');
Route::post('/profile/dis_like_topic', [TopicController::class , 'dis_like_topic'])->name('dis_like_topic');
Route::post('/answer', [AnswerController::class , 'answer'])->name('answer_profile');
Route::post('/answer/like', [AnswerController::class , 'like'])->name('like');
Route::post('/answer/dis_like', [AnswerController::class , 'dis_like'])->name('dis_like');
Route::post('/answer/reply', [AnswerController::class , 'reply'])->name('reply');
Route::get('/search_topic', TopicSearchController::class)->name('search_topic');






Route::get('/auth/redirect', function(){
    return Socialite::driver('google')->redirect();
})->name('login_with_google');

Route::get('/google/callback', function(){

    //$user = Socialite::driver('google')->userFromToken($token);
    $user = Socialite::driver('google')->user();


    $client = Client::query()->where('google_id', $user->id)->first();

    if(!$client) {

        $client = Client::query()->create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'google_id' => $user->getId(),
        ]);

    }

    auth()->guard('clients')->login($client , true);
    return redirect()->route('profile');
});

Route::group(['prefix' => 'admin'], function(){
    Voyager::routes();
});
