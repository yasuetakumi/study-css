<template>
    <div class="card-header bg-white border-bottom-0">
        <h3 class="card-title mb-0">市区町村で絞り込む</h3>
    </div>
    <hr class="my-0 mx-2">
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('property.filter')}}" method="POST" id="formElement">
            @csrf
            <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex py-3">
                        <div class="mr-4">
                            <button @click="checkAllCity('checkall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択</button>
                        </div>
                        <div>
                            <button @click="checkAllCity('uncheckall')" type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択解除</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="(city, cityIndex) in items.cities" class="col-lg-2 col-6">
                    <div class="form-check">
                        <input v-model="items.selectedCities" class="form-check-input city-input" :value="city.id" name="city[]" type="checkbox" @change="getPropertyCountByCity">
                        <label class="form-check-label">@{{ city.display_name }} (@{{ city.properties_count }})</label>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="mb-3">
                        <span v-if="property_count" style="font-size: 18px; margin-right: 10px;">@{{property_count}}</span>
                        <span v-else style="font-size: 18px; margin-right: 10px;">0</span>
                        <span>件の該当物件</span>
                    </div>
                    <button type="submit" class="btn btn-danger px-2 py-2 rounded-0">チェックした市区町村で絞り込む</button>
                </div>
            </div>
        </form>
    </div>
</template>
