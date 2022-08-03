<div class="row">
    <div class="col-12">
        <div id="form-group--plans" class="row form-group">

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
                <strong class="field-title">@lang('label.plans')</strong>
                <span v-if="plans_design_category_1 || plans_design_category_2 || plans_design_category_3 || plans_design_category_4" class="label-attach required">@lang('label.required')</span>
                <span v-else class="label-attach optional">@lang('label.optional')</span>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                <div class="field-group clearfix">
                    <div v-if="loadingData">
                        Search Plans..
                    </div>
                    <div v-else>
                        <h4>居酒屋</h4>
                        <div class="mb-2" v-if="plans_design_category_1">
                            <div class="row">
                                <div v-for="plan in plans_design_category_1" :key="plan.id" class="col-md-3">
                                    <img :src="pathToImage + plan.id +'/'+ plan.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_1 != null && items.selected_plan_dc_1 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-1-'+ plan.display_name" v-model="items.selected_plan_dc_1" name="plan_id_dc_1"/>
                                        <label :for="'plan-dc-1-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <p>設定された坪数にマッチするプランが存在しません : @{{items.surface_area + '坪'}}</p>
                        </div>
                        <hr>
                        <h4>カフェ</h4>
                        <div class="mb-2" v-if="plans_design_category_2">
                            <div class="row" >
                                <div v-for="plan in plans_design_category_2" :key="plan.id" class="col-md-3">
                                    <img :src="pathToImage + plan.id +'/'+ plan.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_2 != null && items.selected_plan_dc_2 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-2-'+ plan.display_name" v-model="items.selected_plan_dc_2" name="plan_id_dc_2"/>
                                        <label :for="'plan-dc-2-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else>
                            <p>設定された坪数にマッチするプランが存在しません : @{{items.surface_area + '坪'}}</p>
                        </div>
                        <hr>
                        <h4>バー</h4>
                        <div class="mb-2" v-if="plans_design_category_3">
                            <div class="row" >
                                <div v-for="plan in plans_design_category_3" :key="plan.id" class="col-md-3">
                                    <img :src="pathToImage + plan.id +'/'+ plan.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_3 != null && items.selected_plan_dc_3 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-3-'+ plan.display_name" v-model="items.selected_plan_dc_3" name="plan_id_dc_3"/>
                                        <label :for="'plan-dc-3-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else>
                            <p>設定された坪数にマッチするプランが存在しません : @{{items.surface_area + '坪'}}</p>
                        </div>
                        <hr>
                        <h4>ラーメン</h4>
                        <div class="mb-2" v-if="plans_design_category_4">
                            <div class="row">
                                <div v-for="plan in plans_design_category_4" :key="plan.id" class="col-md-3">
                                    <img :src="pathToImage + plan.id +'/'+ plan.thumbnail_image" alt="" v-on:error="handleImageNotFound" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_4 != null && items.selected_plan_dc_4 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-4-'+ plan.display_name" v-model="items.selected_plan_dc_4" name="plan_id_dc_4"/>
                                        <label :for="'plan-dc-4-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <p>設定された坪数にマッチするプランが存在しません : @{{items.surface_area + '坪'}}</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
