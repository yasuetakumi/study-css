<div class="row">
    <div class="col-12">
        <div class="row justify-content-center mt-4">

            <div class="col-12">
                <div id="form-group--plans" class="row form-group">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                        <strong class="field-title">@lang('label.design_categories')</strong>
                    </div>

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
            <!-- show all data if there is data for design styles-->
            <div class="col-12" v-if="initialDesignStyles && initialDesignStyles.length>0">
                <div id="form-group--plans" class="row form-group">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header" style="align-self:flex-start;">
                        <strong class="field-title">@lang('label.desgin_styles')</strong>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                        <div class="field-group clearfix">
                            <div v-if="loadingData">
                                <p>Loading Data...</p>
                            </div>
                            <div v-else class="row">
                                <div v-for="dc in initialDesignStyles" :key="dc.id" class="col-md-4">
                                    <div style="position: relative;">
                                        <img :src="pathToImage + dc.id +'/'+ dc.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    </div>
                                    <div class="my-2">
                                        <p>@{{dc.display_name}}</p>
                                        <span v-if="estimationLoading && items.displayBtnShowMore">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                        <span v-else>
                                            <p>?????????????????? @{{has_kitchen(dc.id, 1)}} <span :id="'furnished-'+ dc.id"></span></p>
                                            <p>???????????? @{{has_kitchen(dc.id, 0)}} <span :id="'skeleton-'+ dc.id"></span></p>
                                        </span>
                                    </div>
                                </div>
                                <div v-if="!items.displayBtnShowMore" v-for="dc in designStyles" :key="dc.id" class="col-md-4">
                                    <div style="position: relative;">
                                        <img :src="pathToImage + dc.id +'/'+ dc.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    </div>
                                    <div class="my-2">
                                        <p>@{{dc.display_name}}</p>
                                        <span v-if="estimationLoading && !items.displayBtnShowMore">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                        <span v-else>
                                            <p>?????????????????? @{{has_kitchen(dc.id, 1)}} <span :id="'furnished-'+ dc.id"></span></p>
                                            <p>???????????? @{{has_kitchen(dc.id, 0)}} <span :id="'skeleton-'+ dc.id"></span></p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" v-if="items.displayBtnShowMore">
                        <div class="text-center">
                            <button class="btn btn-secondary" @click="showMoreDesign">
                                ???????????????
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- if no data on design styles then show contact us-->
            <div class="col-12" v-else-if="items.designNotFound == true">
                <div id="form-group--plans" class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-content" style="border:2px solid #2462A2">
                        <div class="row no-gutters list-plans clearfix">
                            <div id="under_contruction" class="clearfix" style="display: block; margin: auto; padding: 30px 0;">
                                <div class="plan-under-contruction d-flex">
                                    <div class="under-contruction-wrapper justify-content-center align-items-center">
                                        <div class="message text-center">
                                            ?????????????????????<br class="sp-only">?????????????????????????????????????????????<br> ??????????????????????????????????????????????????????<br>?????????????????????????????????<br class="sp-only">????????????????????????
                                        </div>
                                        <div class="text-center">
                                            <div class="phone-button">????????????????????????????????????</div>
                                            <a class="btn-phone-bottom" href="tel:03-6262-8740"><i class="fa fa-phone"></i>03-6262-8740</a>
                                            <p>??????????????????9:00???18:00<br class="sp-only">??????????????????????????????????????????</p>
                                            <a class="contact-buttons" href="{{ route('contact') }}">????????????????????????????????????</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
