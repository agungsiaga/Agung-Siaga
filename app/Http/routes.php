<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function(){
	Route::get('/', 'WebController@index');
	Route::get('map', 'WebController@indexMap');
	Route::get('donate/{id}', 'WebController@indexDonate');
	Route::post('donate', 'WebController@processDonate');
	Route::post('invoice/{id}', 'WebController@processInvoice');
	Route::get('about-us', 'WebController@indexAboutUs');
	Route::get('contact-us', 'WebController@indexContactUs');
	Route::get('campaigns', 'WebController@indexCampaigns');
	Route::get('detail-campaign/{id}', 'WebController@indexDetailCampaign');

	/* Auth */
	Route::get('login', 'Auth\AuthController@login');
	Route::post('login', 'Auth\AuthController@proses_login');
	Route::post('register', 'Auth\AuthController@registerProcess');
	Route::get('logout', 'Auth\AuthController@admin_logout');
	Route::get('verify_email', 'Auth\AuthController@processVerifyEmail');



});

Route::group(['middleware' => ['volunteer']], function(){
	Route::group(['prefix' => 'panel'], function(){
		Route::group(['prefix' => 'volunteer'], function(){
			Route::get('/', 'Volunteer\CampaignController@index');
		});
	});
});

Route::group(['middleware' => ['admin']], function(){
	Route::group(['prefix' => 'panel'], function(){
		Route::group(['prefix' => 'administrator'], function(){
			Route::get('/', 'Administrator\DashboardController@index');
			/* Donation Posts*/
			Route::get('donation_posts', 'Administrator\DonationPostsController@index');
			Route::get('add_donation_posts', 'Administrator\DonationPostsController@add');
			Route::get('edit_donation_posts/{id}', 'Administrator\DonationPostsController@edit');
			Route::get('data_donation_posts', 'Administrator\DonationPostsController@dataDonationPosts');
			Route::post('add_donation_posts', 'Administrator\DonationPostsController@addProcess');
			Route::post('edit_donation_posts', 'Administrator\DonationPostsController@editProcess');
			Route::get('delete_donation_posts/{id}', 'Administrator\DonationPostsController@deleteProcess');
			/* Donation */
			Route::get('list_donation', 'Administrator\DonationController@index');
			Route::get('data_donation', 'Administrator\DonationController@dataDonation');
			/* Volunteer */
			Route::get('volunteer', 'Administrator\VolunteerController@index');
			Route::get('add_volunteer', 'Administrator\VolunteerController@add');
			Route::post('add_volunteer', 'Administrator\VolunteerController@addProcess');
			Route::get('edit_volunteer/{id}', 'Administrator\VolunteerController@edit');
			Route::post('edit_volunteer', 'Administrator\VolunteerController@editProcess');
			Route::get('data_volunteers', 'Administrator\VolunteerController@dataVolunteers');
			Route::get('delete_volunteer/{id}', 'Administrator\VolunteerController@deleteProcess');
			/* Bank */
			Route::get('bank', 'Administrator\BankController@index');
			Route::get('add_bank', 'Administrator\BankController@add');
			Route::post('add_bank', 'Administrator\BankController@addProcess');
			Route::get('edit_bank/{id}', 'Administrator\BankController@edit');
			Route::post('edit_bank', 'Administrator\BankController@editProcess');
			Route::get('data_bank', 'Administrator\BankController@dataBank');
			Route::get('delete_bank/{id}', 'Administrator\BankController@deleteProcess');
			/* Campaign */
			Route::get('list_campaign', 'Administrator\CampaignController@index');
			Route::get('add_campaign', 'Administrator\CampaignController@add');
			Route::post('add_campaign', 'Administrator\CampaignController@addProcess');
			Route::get('edit_campaign/{id}', 'Administrator\CampaignController@edit');
			Route::post('edit_campaign', 'Administrator\CampaignController@editProcess');
			Route::get('data_campaign', 'Administrator\CampaignController@dataCampaign');
			Route::get('delete_campaign/{id}', 'Administrator\CampaignController@deleteProcess');
			Route::get('pending_campaign', 'Administrator\CampaignController@detailCheck');
			Route::get('pending_campaign/{id}', 'Administrator\CampaignController@detailCheck');
			Route::post('activate_campaign', 'Administrator\CampaignController@activateCheck');
			Route::get('list_campaign_requested', 'Administrator\CampaignController@indexRequested');
			Route::get('data_campaign_requested', 'Administrator\CampaignController@dataCampaignRequested');
			Route::get('view_campaign_requested/{id}', 'Administrator\CampaignController@viewCampaignRequested');
			Route::get('view_campaign_requested/confirm/{id}', 'Administrator\CampaignController@confirmRequest');
			/* Nearest Place */
			Route::get('nearest_posts', 'Administrator\DonationPostsController@indexNearest');
			Route::post('nearest_posts', 'Administrator\DonationPostsController@findNearest');
			Route::get('map/startLat/{startLat}/startLng/{startLng}/destLat/{destLat}/destLng/{destLng}', 'Administrator\DonationPostsController@indexMap');

		});	
	});
});
