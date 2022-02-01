<div id="form-group--{{ $name }}" class="row form-group">

    @include('backend._components._input_header',['label'=>$label, 'required'=>$required])

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <input type="text" id="input-{{ $name }}" name="{{ $name }}" style="width:50%;display:inline-block;vertical-align: middle;" class="form-control @error($name) is-invalid @enderror" value="{{ !empty($value) ? $value : old($name) }}" {{ !empty($required) ? 'required' : '' }} />
        <button type="button" id="postcodeserch" class="address-search btn btn-primary postcode-button" style="line-height:normal;">Submit</button>
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
