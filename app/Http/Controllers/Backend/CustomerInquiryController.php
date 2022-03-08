<?php
// -----------------------------------------------------------------------------
namespace App\Http\Controllers\Backend;

// -----------------------------------------------------------------------------
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\DatatablesHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerInquiryMail;
// -----------------------------------------------------------------------------
use App\Models\Admin;
use App\Models\CustomerInquiry;
use App\Models\ContactUsType;
use App\Models\Property;
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
        $subject  = ContactUsType::find($request->contact_us_type_id);
        $property = Property::with('user')->find($request->property_id);
        $company_user_email = $property->user->email;
        $developerEmail = env('BCC_PROPERTY_INQUIRY');
        $adminsEmail = $developerEmail ?
            Admin::pluck('email')->push($developerEmail) : Admin::pluck('email');

        // Compile request data
        $data = $request->all();
        $data['company_name'] = $property->user->company->company_name;
        $data['subject'] = $subject->label_jp;

        // Save inquiry
        $inquiry = new CustomerInquiry();
        $inquiry->fill($data)->save();

        // Send email to company user
        Mail::to($company_user_email)->bcc($adminsEmail->toArray())->send(new CustomerInquiryMail($data));
        // Send email to customer
        $developerEmail ?
            Mail::to($data['email'])->bcc($developerEmail)->send(new CustomerInquiryMail($data))
            : Mail::to($data['email'])->send(new CustomerInquiryMail($data));

        return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function show($param) {
        if( $param == 'json' ){

            $model = CustomerInquiry::with(['property', 'contact_us_type']);
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
