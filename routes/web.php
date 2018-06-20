<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','usercontroller@getIndex');
Route::get('our-business/{id}/{slug}','usercontroller@getSinglebusines');
Route::get('what-we-do/{id}/{slug}','usercontroller@getSinglewhatwedo');
Route::get('where-we-work/{id}/{slug}','usercontroller@getSinglewherewework');
Route::get('our-services/{id}/{slug}','usercontroller@getSingleourservices');
Route::get('our-company','usercontroller@getSingleourcompany');
Route::get('our-team','usercontroller@getOurteam');
Route::get('career','usercontroller@getCarrer');
Route::get('research','usercontroller@getResearch');
Route::get('single-research/{id}/{slug}','usercontroller@getSingleresearch');

Route::get('blogs','usercontroller@getBlog');
Route::get('single-blog/{id}','usercontroller@getSingleblog');
Route::get('events','usercontroller@getEvents');
Route::get('single-event/{id}','usercontroller@getSingleevent');
Route::get('case-studies','usercontroller@getCasestudies');
Route::get('news','usercontroller@getNews');
Route::get('news/vision-news','usercontroller@getAllvisionnews');
Route::get('news/press-release','usercontroller@getAllpressnews');
Route::get('single-news/{id}/{slug}','usercontroller@getSinglenews');
Route::get('contact_us','usercontroller@getContactus');
Route::post('send_message','usercontroller@postContactus');
Route::get('apply-job/{id}','usercontroller@getSinglejob');
Route::post('job-applied','usercontroller@postResume');
Route::get('partner','usercontroller@getPartnerpage');
Route::post('partner-applied','usercontroller@postPartner');
Route::get('our-mission-and-value','usercontroller@getOurmissionandvalue');
Route::get('our-story','usercontroller@getOurstory');
Route::post('comment','usercontroller@postNewscomment');
Route::get('search','usercontroller@getSearch');
Route::get('videos','usercontroller@getVideos');
Route::get('single-video/{id}/{slug}','usercontroller@getSinglevideo');
Route::get('books','usercontroller@getBooks');
Route::get('single-book/{id}/{slug}','usercontroller@getSinglebook');
Route::get('search','usercontroller@getSearch');

Route::get('admin','admincontroller@getAdminindex');
Route::get('admin/login','adminlogin@getAdminlogin');
Route::post('login_attempt','adminlogin@postAdminlogin');
Route::get('logout','adminlogin@getLogout');

//Business kolagi
Route::get('addbusiness','admincontroller@getAddbusiness');
Route::post('postbusiness','admincontroller@postAddbusiness');
Route::get('see-all-business','admincontroller@getSeebusiness');
Route::get('delete-business/{id}','admincontroller@getDeletebusiness');
Route::get('edit-a-business/{id}','admincontroller@getEditbusiness');
Route::post('business-content-edited/{id}','admincontroller@postEditbusiness');
//end

//for ourcomapny
Route::get('add-about-our-company','admincontroller@getAddourcompany');
Route::post('post-about-our-company','admincontroller@postAddourcompany');
Route::get('see-about-our-company','admincontroller@getSeeaboutcompanycontent');
Route::get('delete-about-our-company/{id}','admincontroller@getDeleteaboutcompanycontent');
Route::get('edit-about-our-company/{id}','admincontroller@getEditaboutcompanycontent');
//Route::post('edited-company/{id}','admincontroller@postEditaboutcompanycontent');
Route::post('about-our-company-edited/{id}','admincontroller@postEditaboutcompanycontent');
//end

//foraddingteam
Route::get('add-a-team-member','admincontroller@getAddteammember');
Route::post('post-a-team-member','admincontroller@postAddteammember');
Route::get('see-all-team-member','admincontroller@getSeeallteammember');
Route::get('delete-team-member/{id}','admincontroller@getDeleteteammember');
Route::get('edit-team-member/{id}','admincontroller@getEditteammember');
Route::post('edited-team-member/{id}','admincontroller@postEditteammember');
//end

//adding a job
Route::get('add-a-new-job','admincontroller@getAddjob');
Route::post('new-job-added','admincontroller@postAddjob');
Route::get('see-all-jobs','admincontroller@getSeealljobs');
Route::get('delete-a-job/{id}','admincontroller@getDeletejob');
Route::get('edit-a-job/{id}','admincontroller@getEditjob');
Route::post('job-edited/{id}','admincontroller@postEditjob');
//end

//adding a blog
Route::get('add-a-new-blog','admincontroller@getAddnewblog');
Route::post('new-blog-added','admincontroller@postAddnewblog');
Route::get('see-all-blogs','admincontroller@getSeeallblogs');
Route::get('delete-a-blog/{id}','admincontroller@getDeleteablog');
Route::get('edit-a-blog/{id}','admincontroller@getEditblog');
Route::post('blog-edited/{id}','admincontroller@postEditblog');
//end

//slider image
Route::get('add-a-slider-image','admincontroller@getAddsliderimage');
Route::post('slider-image-added','admincontroller@postAddsliderimage');
Route::get('see-all-slider-image','admincontroller@getSeeallsliderimage');
Route::get('delete-a-slider-image/{id}','admincontroller@getDeletesliderimage');
Route::get('edit-a-slider-image/{id}','admincontroller@getEditsliderimage');
Route::post('slider-image-edited/{id}','admincontroller@postEditsliderimage');

//end

//what we do
Route::get('add-what-we-do','admincontroller@getAddwhatwedo');
Route::post('what-we-do-added','admincontroller@postAddwhatwedo');
Route::get('see-all-what-we-do','admincontroller@getSeeallwhatwedo');
Route::get('delete-what-we-do/{id}','admincontroller@getDeletewhatwedo');
Route::get('edit-what-we-do/{id}','admincontroller@getEditwhatwedo');
Route::post('what-we-do-edited/{id}','admincontroller@postEditwhatwedo');
//end

//add event
Route::get('add-event','admincontroller@getAddevent');
Route::post('new-event-added','admincontroller@postAddevent');
Route::get('see-all-event','admincontroller@getSeeallevent');
Route::get('delete-event/{id}','admincontroller@getDeleteevent');
Route::get('edit-event/{id}','admincontroller@getEditevent');
Route::post('event-edited/{id}','admincontroller@postEditevent');
//end

//add where we work
Route::get('add-where-we-work','admincontroller@getAddwherewework');
Route::post('where-we-work-added','admincontroller@postAddwherewework');
Route::get('see-all-where-we-work','admincontroller@getSeeallwherewework');
Route::get('delete-where-we-work/{id}','admincontroller@getDeletewherewework');
Route::get('edit-where-we-work/{id}','admincontroller@getEditwherewework');
Route::post('where-we-work-edited/{id}','admincontroller@postEditwherewework');
//end

//research
Route::get('add-new-research','admincontroller@getAddresearch');
Route::post('new-research-added','admincontroller@postAddnewresearch');
Route::get('see-all-research','admincontroller@getSeeallresearch');
Route::get('delete-research/{id}','admincontroller@getDeleteresearch');
Route::get('edit-research/{id}','admincontroller@getEditresearch');
Route::post('research-edited/{id}','admincontroller@postEditresearch');
//end

//add case study
Route::get('add-case-study','admincontroller@getAddcasestudy');
Route::post('case-study-added','admincontroller@postAddcasestudy');
Route::get('see-all-case-study','admincontroller@getSeeallcasestudy');
Route::get('delete-case-study/{id}','admincontroller@getDeletecasestudy');
Route::post('edit-case-study/{id}','admincontroller@postEditcasestudy');
//end

//service
Route::get('see-our-service','admincontroller@getSeeallservices');
Route::post('post-our-service','admincontroller@postService');
Route::get('delete-service/{id}','admincontroller@getDeleteservice');
Route::post('edit-service/{id}','admincontroller@postEditservice');
//end

//news
Route::get('see-all-news','admincontroller@getSeeallnews');
Route::post('add-news','admincontroller@postAddnews');
Route::get('delete-news/{id}','admincontroller@getDeletenews');
Route::post('edit-news/{id}','admincontroller@postEditnews');
// Auth::routes();


Route::get('see-partner','admincontroller@getSeepartner');
Route::post('add-call-partner','admincontroller@postCallpartner');
Route::get('delete-partner/{id}','admincontroller@getDeletepartner');
Route::get('edit-partner/{id}','admincontroller@getEditpartner');
Route::post('post-partner/{id}','admincontroller@postEditPartner');

Route::get('see-our-story','admincontroller@getSeeourstory');
Route::post('add-our-story','admincontroller@postAddourstory');
Route::post('edited-our-story/{id}','admincontroller@postEditourstory');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('see-our-missionandvalue','admincontroller@getSeemissionandvalue');
Route::post('post-mission','admincontroller@postAddmission');
Route::post('edit-mission/{id}','admincontroller@postEditmission');

Route::get('see-all-admins','admincontroller@getSeealladmin');
Route::post('add-admin','admincontroller@postAddadmin');
Route::get('delete-admin/{id}','admincontroller@getDeleteadmin');
Route::get('change-to-super/{id}','admincontroller@getUpgradetosuper');
Route::get('change-to-admin/{id}','admincontroller@getDegradetoadmin');




Route::get('see-all-video','admincontroller@getSeevideo');
Route::post('add-video','admincontroller@postVideo');
Route::get('delete-video/{id}','admincontroller@getDeletevideo');
Route::post('edit-video/{id}','admincontroller@postEditvideo');

Route::get('see-all-books','admincontroller@getSeebook');
Route::post('add-book','admincontroller@postBook');
Route::get('delete-book/{id}','admincontroller@getDeletebook');
Route::post('edit-book/{id}','admincontroller@postEditbook');



Route::get('search','usercontroller@getSearch');

Route::get('forgot-password','adminlogin@getForgotpassword');
Route::post('send-code','adminlogin@postCode');
Route::post('check-code','adminlogin@postCheckcode');
Route::post('change-password','adminlogin@postNewpassword');