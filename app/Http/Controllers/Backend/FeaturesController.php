<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\DatatablesHelper;
use App\Helpers\FileHelper;
use App\Helpers\ImageHelper;
use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Traits\CommonToolsTraits;

class FeaturesController extends Controller
{

    use CommonToolsTraits;

    public function __construct(){
    }

    protected function validator( array $data, $type ){
        return Validator::make($data, [
            'title'         => 'required|string|max:100',
            'company_id'    => 'nullable|exists:companies,id',
            'pdf_file'      => 'file|mimes:pdf|max:20000',
            'body'          => 'required|string|max:255',
            'publish_date'  => 'date',
            'status'        => 'required|in:draft,publish',
            'radius'        => 'numeric',
            'image1'        => $data['removable_image']['image1'] == false ? 'required|image|mimes:jpeg,bmp,png,jpg|max:25600' : 'image|mimes:jpeg,bmp,png,jpg|max:25600',
            'image2'        => 'image|mimes:jpeg,bmp,png,jpg|max:25000',
            'image3'        => 'image|mimes:jpeg,bmp,png,jpg|max:25000',
            'video1'        => $data['removable_video']['video1'] == false ? 'required|mimes:mp4,x-m4v|max:50000' : 'mimes:mp4,x-m4v|max:50000',
            'video2'        => 'mimes:mp4,x-m4v|max:50000',
            'video3'        => 'mimes:mp4,x-m4v|max:50000',
        ]);
    }

    public function show( $param ){
        if( $param == 'json' ){

            $model = Feature::all();
            return (new Datatableshelper)->instance($model)->toJson();
        }
        abort(404);
    }

    public function index()
    {
        $data['page_title'] = __('label.Feature'). __('label.list');
        return view('backend.features.index', $data);
    }

    public function create(){
        $data['item']       = new Feature();
        $data['page_title'] = __('label.add') . __('label.Feature');
        $data['form_action']= route('admin.features.store');
        $data['page_type']  = 'create';

        // options for vue select 2 options
        $company                     = collect(Company::pluck('company_name', 'id'));
        $data['company_options']     = $this->initSelect2Options($company);

        return view('backend.features.form', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validator($data, 'create')->validate();

        $data['pdf_file']   = FileHelper::upload( $request->file('pdf_file') );
        $data['image1']     = ImageHelper::upload( $request->file('image1') );
        $data['image2']     = ImageHelper::upload( $request->file('image2') );
        $data['image3']     = ImageHelper::upload( $request->file('image3') );
        $data['video1']     = FileHelper::upload( $request->file('video1') );
        $data['video2']     = FileHelper::upload( $request->file('video2') );
        $data['video3']     = FileHelper::upload( $request->file('video3') );

        $feature = new Feature();
        $feature->fill($data)->save();

        return redirect()->route('admin.features.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }

    public function edit($id)
    {
        $data['item']           = Feature::find($id);

        $data['page_title']     = __('label.edit') . __('label.Feature');
        $data['form_action']    = route('admin.features.update', $id);
        $data['page_type']      = 'edit';

        // options for vue select 2 options
        $company                     = collect(Company::pluck('company_name', 'id'));
        $data['company_options']     = $this->initSelect2Options($company);

        return view('backend.features.form', $data);
    }

    public function update(Request $request, $id){
        $data               = $request->all();

        $this->validator($data, 'update')->validate();

        $edit = Feature::find($id);

        $data['pdf_file']   = FileHelper::update( $request->file('pdf_file'), $edit->pdf_file );
        $data['image1']     = ImageHelper::update( $request->file('image1'), $edit->image1, $data['removable_image']['image1'] );
        $data['image2']     = ImageHelper::update( $request->file('image2'), $edit->image2, $data['removable_image']['image2'] );
        $data['image3']     = ImageHelper::update( $request->file('image3'), $edit->image3, $data['removable_image']['image3'] );
        $data['video1']     = FileHelper::update( $request->file('video1'), $edit->video1, $data['removable_video']['video1'] );
        $data['video2']     = FileHelper::update( $request->file('video2'), $edit->video2, $data['removable_video']['video2'] );
        $data['video3']     = FileHelper::update( $request->file('video3'), $edit->video3, $data['removable_video']['video3'] );

        $edit->update($data);

        return redirect()->route('admin.features.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
    }

    public function destroy($id){
        $delete = Feature::findOrFail($id);
        FileHelper::remove($delete->pdf_file);
        ImageHelper::remove($delete->image1);
        ImageHelper::remove($delete->image2);
        ImageHelper::remove($delete->image3);
        FileHelper::remove($delete->video1);
        FileHelper::remove($delete->video2);
        FileHelper::remove($delete->video3);
        $delete->delete();

        return 1;
    }


}
