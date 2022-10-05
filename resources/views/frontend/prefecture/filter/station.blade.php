<template>
    <div class="card-header bg-white border-bottom-0">
        <h3 class="card-title mb-0">路線で絞り込む</h3>
    </div>

    <hr class="my-0 mx-2">

    <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
        <div class="card-body text-sm">
            <div class="row mb-4">
                @foreach ($station_lines as $station)
                    <div class="col-lg-2 col-6">
                        <div class="form-check">
                            <input id="station-{{$station->id}}" class="form-check-input" value="{{$station->id}}" name="station_line" type="radio" @change="changeStationByStationLine">
                            <label for="station-{{$station->id}}" class="form-check-label">{{$station->display_name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <p style="font-size: 18px;">駅を選ぶ(複数選択)</p>
            <hr class="mx-2 my-0">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex py-3">
                        <div class="mr-4">
                            <button @click="checkAllStations('checkall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択</button>
                        </div>
                        <div>
                            <button @click="checkAllStations('uncheckall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択解除</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12" v-if="items.loading">
                    Loading Data...
                </div>
                <div class="col-12" v-else-if="!items.loading && !stations">
                    No Data
                </div>
                <div v-else class="col-lg-2 col-6" v-for="station in stations" :key="station.id">
                    <div class="form-check">
                        <input :id="'station2-'+station.id" class="form-check-input" :value="station.id" name="station[]" type="checkbox" v-model="items.stations">
                        <label :for="'station2-'+station.id" class="form-check-label">@{{station.display_name}} (@{{ station.properties_count }})</label>
                    </div>
                </div>
            </div>
        </div>
</template>
