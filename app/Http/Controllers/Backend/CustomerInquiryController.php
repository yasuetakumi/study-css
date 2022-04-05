<?php
// -----------------------------------------------------------------------------
namespace App\Http\Controllers\Backend;

// -----------------------------------------------------------------------------
use App\Models\Admin;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\ContactUsType;
use App\Models\CustomerInquiry;
// -----------------------------------------------------------------------------
use App\Helpers\DatatablesHelper;
use App\Mail\CustomerInquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
class CustomerInquiryController extends Controller {
    // -------------------------------------------------------------------------
    public function index() {
        $data['page_title'] = 'Customer Inquiry List';
        return view('backend.customer_inquiry.index', $data);
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function create() {
        //
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function store(Request $request) {
        // Validate the request
        $request->validate([
            'name'=> 'required|max:45',
            'email'=> 'required|email',
            'text' => 'required',
        ]);

        // Get necessary data
        $subjectToCustomer  = '[' . config('app.name') . ']' . 'お問い合わせありがとうございます。';
        $subjectToAdmin = '[' . config('app.name') . ']' . '物件のお問い合わせがありました。';
        $property = Property::with('user')->find($request->property_id);
        $company_user_email = $property->user->email;
        $developerEmail = env('BCC_PROPERTY_INQUIRY');
        $adminsEmail = $developerEmail ?
            Admin::pluck('email')->push($developerEmail) : Admin::pluck('email');

        // Compile request data
        $data = $request->all();
        $data['company_name'] = $property->user->company->company_name;

        $dataToCustomer = $data;
        $dataToCustomer['subject'] = $subjectToCustomer;

        $dataToAdmin = $data;
        $dataToAdmin['subject'] = $subjectToAdmin;

        // Save inquiry
        $inquiry = new CustomerInquiry();
        $inquiry->fill($data)->save();

        // Send email to company user
        Mail::to($company_user_email)->bcc($adminsEmail->toArray())->send(new CustomerInquiryMail($dataToAdmin));
        // Send email to customer
        $developerEmail ?
            Mail::to($data['email'])->bcc($developerEmail)->send(new CustomerInquiryMail($dataToCustomer))
            : Mail::to($data['email'])->send(new CustomerInquiryMail($dataToCustomer));

        return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function show($param) {
        if( $param == 'json' ){

            $model = CustomerInquiry::with(['property', 'contact_us_type'])->whereHas('property', function($query) {
                $query->where('user_id', Auth::guard('user')->user()->id);
            });
            return (new DatatablesHelper)->instance($model)
                                            ->filterColumn('property.id', function($query, $keyword){
                                                $query->whereHas('property', function($q) use ($keyword){
                                                    $q->where('id', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->filterColumn('contact_us_type.label_en', function($query, $keyword){
                                                $query->whereHas('contact_us_type', function($q) use ($keyword){
                                                    $q->where('label_en', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->toJson();

        }
        abort(404);
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function edit($id) {
        //
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function update(Request $request, $id) {
        //
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function destroy($id) {
        $inquiry = CustomerInquiry::find($id);
        $inquiry->delete();

        // return redirect()->route('inquiry.index')->with('success', __('label.SUCCESS_DELETE_MESSAGE'));
    }
    // -------------------------------------------------------------------------
}
// -----------------------------------------------------------------------------
