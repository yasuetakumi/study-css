<div class="row">
    <div class="col-12">
        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div id="form-group--plans" class="row form-group">

                    @include('backend._components._input_header',['label'=>'Design Categories', 'required'=>true])

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                        <div class="field-group clearfix">
                            @foreach($design_categories as $dc)
                                <div class="icheck-cyan d-inline">
                                    <input @change="showDesignPlanByCategory" data-id="{{$dc['value']}}" type="radio" value="{{$dc['value']}}" id="input-dc-{{ $dc['value'] }}" name="design_category_id" {{ $loop->first ? 'checked' : '' }} />
                                    <label for="input-dc-{{ $dc['value'] }}" class="text-uppercase mr-5">{{ $dc['label_jp'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="form-group--plans" class="row form-group">

                    @include('backend._components._input_header',['label'=>'Design Styles', 'required'=>true])

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                        <div class="field-group clearfix">
                            <div v-if="loadingData">
                                <p>Loading Data...</p>
                            </div>
                            <div v-else class="row">
                                <div v-for="dc in designStyles" :key="dc.id" class="col-md-4">
                                    <div style="position: relative;">
                                        <img :src="pathToImage + dc.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    </div>
                                    <div class="my-2">
                                        <p>Design @{{dc.display_name}}</p>
                                        <p>居抜き @{{has_kitchen(dc.id, 1)}} <span :id="'furnished-'+ dc.id"></span></p>
                                        <p>スケルトン @{{has_kitchen(dc.id, 0)}} <span :id="'skeleton-'+ dc.id"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
