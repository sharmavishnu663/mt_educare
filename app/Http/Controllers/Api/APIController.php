<?php


namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AboutVideo;
use App\Models\Award;
use App\Models\BoardOfDirector;
use App\Models\Center;
use App\Models\Committee;
use App\Models\ContactAddress;
use App\Models\ContactPost;
use App\Models\CorpGovernance;
use App\Models\CSR;
use App\Models\Disclaimer;
use App\Models\Enquiry;
use App\Models\Gallary;
use App\Models\GalleryCategory;
use App\Models\InvestorPresentation;
use App\Models\Job;
use App\Models\KeyManagement;
use App\Models\PressRelease;
use App\Models\PrivacyPolicy;
use App\Models\ReleaseCategory;
use App\Models\Report;
use App\Models\Team;
use App\Models\Term;
use App\Models\UserCount;
use App\Models\UserTestimonial;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function gallaryList()
    {
        try {
            $gallaryLists = GalleryCategory::join('gallary', 'gallery_type.id', '=', 'gallary.category_id')->select('gallery_type.id as id', 'gallery_type.name as name', 'gallary.image as image', DB::raw('count(gallary.category_id) as total'))->groupBy('id')->get();
            $response = ['success' => true, 'message' => 'Gallary get successfully', 'data' => $gallaryLists];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function gallaryDataList($id)
    {
        try {
            $gallaryDataLists = Gallary::where('category_id', $id)->with('category')->get();
            $response = ['success' => true, 'message' => 'Gallary get successfully', 'data' => $gallaryDataLists];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function gallaryVideoList()
    {
        try {
            $videos = VideoGallery::all();
            $response = ['success' => true, 'message' => 'Videos get successfully', 'data' => $videos];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function csrData()
    {
        try {
            $csrs = CSR::all();
            $response = ['success' => true, 'message' => 'CSR get successfully', 'data' => $csrs];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function jobList()
    {
        try {
            $jobs = Job::all();
            $response = ['success' => true, 'message' => 'Jobs get successfully', 'data' => $jobs];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function jobData($id)
    {
        try {
            $jobs = Job::find($id);
            $response = ['success' => true, 'message' => 'Jobs get successfully', 'data' => $jobs];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function privacyPolicyList()
    {
        try {
            $privacyPolicy = PrivacyPolicy::first();
            $response = ['success' => true, 'message' => 'Privacy Policy get successfully', 'data' => $privacyPolicy];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function termsList()
    {
        try {
            $term = Term::first();
            $response = ['success' => true, 'message' => 'Tems & Conditions get successfully', 'data' => $term];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function disclaimerList()
    {
        try {
            $disclaimer = Disclaimer::first();
            $response = ['success' => true, 'message' => 'Disclaimer get successfully', 'data' => $disclaimer];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function centersList()
    {
        try {
            $centers = Center::with(['state', 'city'])->get();
            $response = ['success' => true, 'message' => 'Centers get successfully', 'data' => $centers];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }


    public function introList()
    {
        try {
            $aboutUs = AboutUs::all();
            $response = ['success' => true, 'message' => 'AboutUs get successfully', 'data' => $aboutUs];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function boarOfDirectors()
    {
        try {
            $directors = BoardOfDirector::all();
            $response = ['success' => true, 'message' => 'Directors get successfully', 'data' => $directors];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function boarOfCOmmites()
    {
        try {
            $commites = Committee::all();
            $response = ['success' => true, 'message' => 'Borad of commitee get successfully', 'data' => $commites];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function keyManagement()
    {
        try {
            $keys = KeyManagement::all();
            $response = ['success' => true, 'message' => 'Key Management get successfully', 'data' => $keys];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function awardsData()
    {
        try {
            $awards = Award::all();
            $response = ['success' => true, 'message' => 'Awards get successfully', 'data' => $awards];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function corporateData()
    {
        try {
            $corpGOvernance = CorpGovernance::all();
            $response = ['success' => true, 'message' => 'Corporate Governance get successfully', 'data' => $corpGOvernance];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function investorData()
    {
        try {
            $investor = InvestorPresentation::all();
            $response = ['success' => true, 'message' => 'Investor get successfully', 'data' => $investor];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function releaseCategory()
    {
        try {
            $categories = ReleaseCategory::all();
            $response = ['success' => true, 'message' => 'Release category get successfully', 'data' => $categories];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function releaseData($id)
    {
        try {
            $releaseData = PressRelease::where('release_category_id', $id)->get();
            $response = ['success' => true, 'message' => 'Release data get successfully', 'data' => $releaseData];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function reportData($id)
    {
        try {
            $reports = Report::where('report_category_id', $id)->get();
            $response = ['success' => true, 'message' => 'Report data get successfully', 'data' => $reports];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function awardsDetail($id)
    {
        try {
            $award = Award::find($id);
            $response = ['success' => true, 'message' => 'Award get successfully', 'data' => $award];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function enquiryForm(Request $request)
    {
        try {

            $rules = [
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'category' => 'required',
                'board' => 'required',
                'standard' => 'required',
                'city' => 'required',
                'demo_time' => 'required',
            ];
            $requestData = $request->all();
            $validator = Validator::make($requestData, $rules);
            if ($validator->fails()) {

                $response = ['success' => false, 'message' => $validator->errors()->all()];
            } else {
                $contactForm = Enquiry::create($requestData);

                $response = ['success' => true, 'message' => 'Post successfully'];
            }
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function emailSubscription(Request $request)
    {
        try {

            $rules = [
                'email' => 'required'
            ];
            $requestData = $request->all();
            $validator = Validator::make($requestData, $rules);
            if ($validator->fails()) {

                $response = ['success' => false, 'message' => $validator->errors()->all()];
            } else {
                $email = $request->email;
                if ($email) {
                    $email = $request->email;
                    // Mail::send('admin.email.contactus', ['data' => $requestData], function ($message) use ($email) {
                    //     $message->from($email);
                    //     $message->to($email);
                    //     $message->subject('Contact Us');
                    // });
                }
                $response = ['success' => true, 'message' => 'Email sent successfully'];
            }
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }
}
