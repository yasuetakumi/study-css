@extends("backend._base.app")

@section("content-wrapper")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark h1title">{{$page_title}}</h1>
                </div>
                <div class="col-sm-6 text-sm">
                    @yield("breadcrumbs")
                </div>
            </div>
        </div>
    </div>
    @include("backend._includes.alert")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6 card-title mb-0">
                                    @if (empty($page_type))
                                    @elseif ($page_type == "detail")
                                        <h3 class="card-title"></h3>
                                    @elseif ($page_type == "create")
                                        <h3 class="card-title">@lang('label.add')</h3>
                                    @else
                                        <!-- <h3 class="card-title">@lang('label.edit')</h3> -->
                                    @endif
                                    <br>
                                    <h3 class="card-title">@yield('form_title')</h3>
                                </div>
                                <div class="col-sm-6 card-header-link">
                                    @yield('top_buttons')
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('plugins/parsley/parsley.min.js')}}"></script>
    @if (App::isLocale('en'))
      <script src="{{asset('plugins/parsley/i18n/en.js')}}"></script>
    @elseif (App::isLocale('ja'))
      <script src="{{asset('plugins/parsley/i18n/ja.js')}}"></script>
    @endif
    <script src="{{asset('plugins/summernote/summernote.js')}}"></script>
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/i18n/ja.js')}}"></script>
    <script>
        $(function () {
            //used for select2 component
            $('.select2').select2();

            $(".select2").change(function() {
                $(this).parsley().validate();
            });

            // init: show tooltip on hover
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            });

            // show password field only after 'change password' is clicked
            $('#reset-button').click(function (e) {
                $('#reset-field').removeClass('d-none');
                $('#show-password-check').removeClass('d-none');
                // to always uncheck the checkbox after button click
                $('#show-password').prop('checked', false);
                $("#input-password").prop("type", "password");
                $("#input-password").val('');
            });

            // toggle password in plaintext if checkbox is selected
            $("#show-password").click(function () {
                $(this).is(":checked") ? $("#input-password").prop("type", "text") : $("#input-password").prop("type", "password");
            });

            $('[data-parsley]').parsley({
                uiEnabled: true,
                errorClass: 'is-invalid',
                successClass: 'is-valid'
            })

            $('.text-editor').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['table', 'link', 'hr']],
                    ['misc', ['fullscreen', 'codeview', 'undo', 'redo']]
                ],
                height: 200
            });

            $('.input-datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-M-D'
                }
            });

            //for address search
            $('.address-search').on('click', function(e){
                e.preventDefault();
                $postcode_btn = $(this);
                $postcode_form = $(this).siblings('input')
                $address_form = $("#input-address")
                $city_form = $("#input-city")
                $prefecture_form = $("#input-prefecture")
                $url = window.location.origin + '/api/v1/postcode/'+ $postcode_form.val()
                let request = $.ajax({
                    url: $url,
                    type: 'GET',
                    dataType: 'json',
                })

                request.done(function(data){
                    if(data.status == 201){
                        toastr.error(data.message);
                    }else{
                        $address_form.val(data.address)
                        $city_form.val(data.city)
                        $prefecture_form.val(data.prefecture)
                        $prefecture_form.val(data.prefecture).trigger('change');
                        $postcode_btn.closest('.postcode-group').siblings('.address-error-text').prop('hidden', true);
                    }
                })
                request.fail(function(data){
                    $address_form.val('')
                    $city_form.val('')
                    $prefecture_form.val('')
                    $prefecture_form.val('').trigger('change');
                    $postcode_btn.closest('.postcode-group').siblings('.address-error-text').prop('hidden', false);
                })
            })

            $("body").on('change', '.input-image', function() {
                input = this;
                var img = $(input).closest('.field-group').find('img');
                var input_remove = $(input).closest('.field-group').find('.input-remove-image');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        img.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    img.attr('src', img.data('default'));
                    input_remove.val('false');
                }
            });
            // this is for image 360 upload
            $("body").on('change', '.input-image-360', function() {
                input = this;

                var img = $(input).closest('.field-group').find('img');
                var input_remove = $(input).closest('.field-group').find('.input-remove-image');
                var image_360 = $(input).closest('.field-group').find('.panorama-image');
                var loading_spinner = $(input).closest('.field-group').find('.spinner-border');
                // add loading spinner while mount 360 viewer
                loading_spinner.removeClass('d-none');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        image_360.removeClass('d-none'); // show image 360 viewer wrapper if hidden
                        img.attr('src', e.target.result);
                        image_360.html('<iframe width="400" height="200" allowfullscreen style="border-style:none;" src="' + pannelum_asset + '#panorama=' + e.target.result + '"></iframe>');
                        setTimeout(() => {
                            loading_spinner.addClass('d-none');
                        }, 200);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    img.attr('src', img.data('default'));
                    input_remove.val('false');
                }
            });

            $("body").on('change', '.input-video', function() {
                input = this;
                var video = $(input).closest('.field-group').find('video');
                var input_remove = $(input).closest('.field-group').find('.input-remove-video');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        video.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    video.attr('src', video.data('default'));
                    input_remove.val('false');
                }
            });

            $('body').on('click', '.remove-image', function(){
                var img = $(this).closest('.field-group').find('img');

                $(this).closest('.field-group').find('.input-image').val('');
                $(this).closest('.image-preview').find('.input-remove-image').val( 'true' );

                if(this.id == 'remove-image-image1') {
                    $("#input-image1").prop('required',true);
                }

                img.attr('src', img.data('empty'));
            })
            // this is for remove image 360
            $('body').on('click', '.remove-image-360', function(){
                var img = $(this).closest('.field-group').find('img');
                var img360wrapper = $(this).closest('.field-group').find('.panorama-image-edit')

                $(this).closest('.field-group').find('.input-image-360').val('');
                $(this).closest('.image-preview').find('.input-remove-image-360').val( 'true' );

                if(this.id == 'remove-image-360-image1') {
                    $("#input-image1").prop('required',true);
                }

                img.attr('src', img.data('empty'));
                // hidden image 360 on delete image
                img360wrapper.addClass('d-none');
            })

            $('body').on('click', '.remove-video', function(){
                var video = $(this).closest('.field-group').find('video');

                $(this).closest('.field-group').find('.input-video').val('');
                $(this).closest('.video-preview').find('.input-remove-video').val( 'true' );

                if(this.id == 'remove-video-video1') {
                    $("#input-video1").prop('required',true);
                }

                video.attr('src', video.data('empty'));
            })

            $('.select2ajax').each(function(){
                $(this).select2({
                    theme: 'bootstrap4',
                    minimumInputLength: 0,
                    {!! App::isLocale('ja') ? 'language: "ja",' : '' !!}
                    ajax: {
                        delay: 500,
                        url: $(this).data('url'),
                        data: function (params) {
                            var query = {
                                q: params.term,
                                page: params.page || 1
                            };
                            return query;
                        },
                        processResults: function (response) {
                            var is_more = response.items.next_page_url !== null ? true : false;
                            return {
                                results:  $.map(response.items.data, function (item) {
                                    return {
                                        text: item[response.display],
                                        id: item[response.value]
                                    }
                                }),
                                pagination: {
                                    "more": is_more
                                }
                            };
                        },
                        cache: true
                    }
                });
                $(this).on('change', function(){
                    var selected_label = $(this).find('option:selected').text();
                    $(this).closest('.col-content').find('.selected-label').val( selected_label );
                });
            })

            $('.input-decimal-ratio').each(function(){
                $( '#' + $(this).data('target') ).val(
                    parseFloat( $(this).val() * $(this).data('multiply') ).toFixed(2)
                );

                $(this).on('change keyup', function(){
                    $( '#' + $(this).data('target') ).val(
                        parseFloat( $(this).val() * $(this).data('multiply') ).toFixed(2)
                    );
                });
            });

            //full width HIRAGANA & full width KATAKANA & KANJI
            window.Parsley.addValidator("fullwidthjpntext", {
                validateString: function(value, element) {
                    regex = /^[ぁ-んァ-ン一-龥]+$/;
                    return regex.test(value);
                }
            });

            //full width KANJI
            window.Parsley.addValidator("fullwidthkanji", {
                validateString: function(value, element) {
                    regex = /^[\u4E00-\u9FFF ]+$/;
                    return regex.test(value);
                }
            });

            //full width KATAKANA
            window.Parsley.addValidator("fullwidthkatakana", {
                validateString: function(value, element) {
                    regex = /^[\u30A0-\u30FF ]+$/;
                    return regex.test(value);
                }
            });

            //no space
            window.Parsley.addValidator("nospace", {
                validateString: function(value, element) {
                    regex = /^[^-\s]+$/;
                    return regex.test(value);
                }
            });
        });
    </script>
@endpush
