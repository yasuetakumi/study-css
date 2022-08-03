@component('backend._components.form_container', ["action" => $form_action_inquiry, 'id' => 'customer-inquiry',  "page_type" => 'create', "files" => false])
    <input type="hidden" name="property_id" value="{{ request()->id }}">
    <div class="col-12 border-bottom border-primary">
        <p class="text-center" style="font-size: 22px">@lang('label.customer_inquiry')</p>
    </div>
    <div id="form-group--contact_us_type" class="row form-group">

        @include('backend._components._input_header',['label'=>__('label.inquiry_type'), 'required'=> true])

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
            <select type="text" id="input-contact_us_type" name="contact_us_type_id" class="form-control @error('contact_us_type_id') is-invalid @enderror" value="{{ old('contact_us_type_id') }}" required>
                @foreach($contact_us_type as $contact)
                    <option value="{{ $contact->id }}" id="input-contact_us_type">{{ $contact->label_jp }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @component('backend._components.input_text', ['name' => 'name', 'placeholder' => 'ご担当者名を入力してください', 'label' => __('label.inquiry_name'), 'required' => 1, 'value' => '', 'isReadOnly' => false ]) @endcomponent
    @component('backend._components.input_email', ['name' => 'email', 'placeholder' => 'メールアドレスを入力してください', 'label' => __('label.enterEmailAddress'), 'required' => 1, 'value' => '', 'isReadOnly' => false ]) @endcomponent
    @component('backend._components.input_number', ['name' => 'phone', 'placeholder' => '電話番号を入力してください', 'label' => __('label.phone_number'), 'required' => 0, 'value' => '', 'isReadOnly' => false ]) @endcomponent
    @component('backend._components.input_textarea', ['name' => 'text', 'placeholder' => 'お問い合わせ内容を入力してください', 'label' => __('label.content_inquiry'), 'required' => 1, 'value' =>'', 'isReadOnly' => false ]) @endcomponent
    <div class="row justify-content-center mt-4">
        <div class="col-12 text-left mt-4">
            <button id="inquiry" class="btn btn-primary">@lang('label.send_inquiry')</button>
        </div>
    </div>
@endcomponent
