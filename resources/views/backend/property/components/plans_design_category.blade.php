<div class="row">
    <div class="col-12">
        <div id="form-group--plans" class="row form-group">

            @include('backend._components._input_header',['label'=>'Plans', 'required'=>true])

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
                <div class="field-group clearfix">
                    <div v-if="loadingData">
                        Search Plans..
                    </div>
                    <div v-else-if="message_plan_properties">
                        @{{items.message_plan_properties}}
                    </div>
                    <div v-else>
                        <div class="mb-2" v-if="items.plans_design_category_1">
                            <p>居酒屋</p>
                            <div class="row">
                                <div v-for="plan in items.plans_design_category_1" :key="plan.id" class="col-md-3">
                                    <img src="{{asset('img/backend/noimage.png')}}" alt="" onerror="{{asset('img/backend/noimage.png')}}" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_1 != null && items.selected_plan_dc_1 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-1-'+ plan.display_name" v-model="items.selected_plan_dc_1" name="plan_id_dc_1"/>
                                        <label :for="'plan-dc-1-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2" v-if="items.plans_design_category_2">
                            <p>カフェ</p>
                            <div class="row" >
                                <div v-for="plan in items.plans_design_category_2" :key="plan.id" class="col-md-3">
                                    <img src="{{asset('img/backend/noimage.png')}}" alt="" onerror="{{asset('img/backend/noimage.png')}}" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_2 != null && items.selected_plan_dc_2 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-2-'+ plan.display_name" v-model="items.selected_plan_dc_2" name="plan_id_dc_2"/>
                                        <label :for="'plan-dc-2-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2" v-if="items.plans_design_category_3">
                            <p>バー</p>
                            <div class="row" >
                                <div v-for="plan in items.plans_design_category_3" :key="plan.id" class="col-md-3">
                                    <img src="{{asset('img/backend/noimage.png')}}" alt="" onerror="{{asset('img/backend/noimage.png')}}" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_3 != null && items.selected_plan_dc_3 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-3-'+ plan.display_name" v-model="items.selected_plan_dc_3" name="plan_id_dc_3"/>
                                        <label :for="'plan-dc-3-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2" v-if="items.plans_design_category_4">
                            <p>ラーメン</p>
                            <div class="row">
                                <div v-for="plan in items.plans_design_category_4" :key="plan.id" class="col-md-3">
                                    <img src="{{asset('img/backend/noimage.png')}}" alt="" onerror="{{asset('img/backend/noimage.png')}}" class="w-100 img-thumbnail d-block mx-auto">
                                    <div class="icheck-cyan d-inline" >
                                        <input :checked="items.selected_plan_dc_4 != null && items.selected_plan_dc_4 == plan.id" type="radio" :value="plan.id" :id="'plan-dc-4-'+ plan.display_name" v-model="items.selected_plan_dc_4" name="plan_id_dc_4"/>
                                        <label :for="'plan-dc-4-'+ plan.display_name" class="text-uppercase mr-5">@{{plan.display_name}}</label>
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
