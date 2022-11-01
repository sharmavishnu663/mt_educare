<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('gallary-list', '\App\Http\Controllers\Api\APIController@gallaryList')->name('gallary.list');

Route::get('gallary-data-list/{id}', '\App\Http\Controllers\Api\APIController@gallaryDataList')->name('gallary.data.list');

Route::get('gallary-video-list', '\App\Http\Controllers\Api\APIController@gallaryVideoList')->name('gallary.video.list');

Route::get('privacy-list', '\App\Http\Controllers\Api\APIController@privacyPolicyList')->name('privacy.policy.list');

Route::get('term-list', '\App\Http\Controllers\Api\APIController@termsList')->name('terms.list');

Route::get('disclaimer-list', '\App\Http\Controllers\Api\APIController@disclaimerList')->name('disclaimer.list');

Route::get('centers-list', '\App\Http\Controllers\Api\APIController@centersList')->name('centers.list');

Route::get('intro-list', '\App\Http\Controllers\Api\APIController@introList')->name('intro.list');

Route::get('directors-list', '\App\Http\Controllers\Api\APIController@boarOfDirectors')->name('directors.list');

Route::get('committes-list', '\App\Http\Controllers\Api\APIController@boarOfCOmmites')->name('committes.list');

Route::get('key-management-list', '\App\Http\Controllers\Api\APIController@keyManagement')->name('keymanagement.list');

Route::get('awards-list', '\App\Http\Controllers\Api\APIController@awardsData')->name('awards.list');

Route::get('awards-detail-list/{id}', '\App\Http\Controllers\Api\APIController@awardsDetail')->name('awards.detail.list');

Route::get('corporate-list', '\App\Http\Controllers\Api\APIController@corporateData')->name('corporate.list');

Route::get('investor-list', '\App\Http\Controllers\Api\APIController@investorData')->name('investor.list');

Route::get('release-list', '\App\Http\Controllers\Api\APIController@releaseCategory')->name('release.list');

Route::get('release-data-list/{id}', '\App\Http\Controllers\Api\APIController@releaseData')->name('release.data.list');

Route::get('report-data-list/{id}', '\App\Http\Controllers\Api\APIController@reportData')->name('report.data.list');

Route::get('csr-data-list', '\App\Http\Controllers\Api\APIController@csrData')->name('csr.data.list');

Route::get('job-list', '\App\Http\Controllers\Api\APIController@jobList')->name('job.list');

Route::get('job-data-list/{id}', '\App\Http\Controllers\Api\APIController@jobData')->name('job.data.list');

Route::post('enquiry-post', '\App\Http\Controllers\Api\APIController@enquiryForm')->name('enquiy.post');


Route::post('email-Subscription', '\App\Http\Controllers\Api\APIController@emailSubscription')->name('email.subscription');
