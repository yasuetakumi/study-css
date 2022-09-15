<div id="form-group-btn" class="row form-group">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-header">
        <strong class="field-title">@lang('label.nearest_station')</strong>
        <span class="label-attach optional">@lang('label.optional')</span>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-content">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalStation">
            @lang('label.select_station')
        </button>
        <div class="col-12 d-flex pl-0 mt-1" v-if="getSelectedStations.length > 0">
            <p class="mb-0">@{{getSelectedStationLine.text}}: <span v-for="station in getSelectedStations">@{{ station.display_name }}, </span></p>
        </div>
        <div v-else class="col-12 d-flex pl-0 mt-1">
            <p class="mb-0">未選択</p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalStation" tabindex="-1" aria-labelledby="modalStationLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <div class="block ">
                            @component('backend._components.vue.form.vue-select', [
                                'name'          => 'select_prefecture',
                                'label'         => __('label.prefecture'),
                                'label_select'  => 'text',
                                'required'      => 'false',
                                'options'       => 'prefectures',
                                'model'         => 'items.prefecture_id',
                                'method'        => 'handleSelectPrefecture',
                                'disabled'      => 'false',
                            ])@endcomponent

                            @component('backend._components.vue.form.vue-select', [
                                'name'          => 'select_station_line',
                                'label'         => __('label.station_line'),
                                'label_select'  => 'text',
                                'required'      => 'false',
                                'options'       => 'items.list_station_lines',
                                'model'         => 'items.station_line_id',
                                'method'        => 'handleSelectStationLine',
                                'disabled'      => 'false',
                            ])@endcomponent

                            <div id="form-group--selected-stations" class="row form-group align-content-start" style="height: 40vh">
                                <div class="col-12 mb-4">
                                    <strong class="field-title">@lang('label.stations_belong_to_station_line')</strong>
                                </div>
                                <div class="col-12">
                                    <div class="row" v-if="items.list_stations.length > 0">
                                        <div class="col-4 col-md-3 col-lg-2 mb-3" v-for="station in items.list_stations" :key="station.id">
                                            <div class="form-check">
                                                <input name="select_stations[]" v-model="items.selected_stations" class="form-check-input" type="checkbox" :value="station.id" :id="station.display_name">
                                                <label class="form-check-label" :for="station.display_name">
                                                  @{{station.display_name}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <p class="mb-0">@lang('label.selected_stations')</p>
                                </div>
                                <div class="col-12 d-flex" v-if="getSelectedStations.length > 0">
                                    <p class="mb-0">@{{getSelectedStationLine ? getSelectedStationLine.text + ' : ' : '' }} <span v-for="station in getSelectedStations">@{{ station.display_name }}, </span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearAll">@lang('label.clear_btn')</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('label.close_btn')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
