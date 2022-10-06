<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="d-flex flex-grow-1">
        <div class="col-lg-5 col-8 col-md-5 col-content pr-0">
            <input data-parsley-required-message="@lang('validation.required', ['attribute' => $label])" type="text" id="input-{{ $name }}" name="{{ $name }}" style="display:inline-block;vertical-align: middle;" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }}
            {{isset($isReadOnly) && $isReadOnly == true ? 'readonly' : '' }} />

        </div>
        <div class="col-auto align-self-start">
            <button type="button" id="postcodeserch" class="address-search btn btn-primary postcode-button" style="line-height:normal;" {{isset($isReadOnly) && $isReadOnly == true ? 'disabled' : '' }}>
                @lang('label.submit')
            </button>
        </div>
    </div>
</div>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<!-- <script>
$("#postcodeserch").on("click", function() {
    console.log("eee");
    var form = $("#postcodeserch").val();

    array = Array.from(form);
    $.ajax({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "result/ajax",
      data: {
        postcode: form
      },
      /* *  get params from db, and set data * */
      success: function(data) {
        $("#input-address").val(data.prefecture + data.city + data.local);
      },
      error: () => {
        alert("Please enter the correct postcode!");
      }
    });
  });
  </script> -->
