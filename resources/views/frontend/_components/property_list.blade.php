<div class="card card-secondary">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <p class="text-black mb-0">@{{pd.city.display_name}}市
                    (@{{pd.property_stations[0] != null ? pd.property_stations[0].station.display_name + '徒歩' : '' }} 徒歩
                    @{{pd.property_stations[0] != null ? pd.property_stations[0].walking_distance.value + '分' : '' }})
                    の貸店舗</p>
            </div>
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
    <div class="card-body p-2">
        <div class="row">
            <div class="col-5">
                <div class="position-relative">
                    <img class="w-100" src="{{asset('uploads/1646206594-egao.jpg')}}" onerror="{{asset('img/backend/noimage.png')}}" alt="">
                    <div class="position-absolute" style="top:3px; left:0px">
                        <span class="p-1 bg-secondary rounded-sm">
                            @{{pd.is_skeleton == 1 ? 'スケルトン' : '居抜き'}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <dl>
                    <dt class="text-dark">@{{pd.property_stations[0] != null ? pd.property_stations[0].station.station_line.display_name : '' }} @{{pd.property_stations[0] != null ? pd.property_stations[0].station.display_name + '徒歩' : '' }} @{{pd.property_stations[0] != null ? pd.property_stations[0].walking_distance.value + '分' : '' }} </dt>
                    <dt class="text-info">賃料／坪単価 <span class="text-dark">@{{pd.man}}万円 / @{{pd.man_per_tsubo}}円</span></dt>
                    <dt class="text-info">面積 <span class="text-dark">@{{pd.rent_amount}} ㎡ / @{{pd.man_per_tsubo}}円</span></dt>
                    <dt class="text-info">所在地 <span class="text-dark">@{{pd.location}}</span></dt>
                    <dt class="text-info">前業態／希望譲渡料 <span class="text-dark">@{{!pd.is_skeleton ? pd.cuisine.label_jp : pd.interior_transfer_price}}</span></dt>
                </dl>
            </div>
        </div>

        <div class="flex justify-content-end mt-3">
            <a id="favorite" type="button" style="color: red" @click="setLikeProperty(pd.id)">
                <i :class="items.like_property.includes(pd.id) ? 'fas' : 'far' " class="fa-heart fa-2x"></i>
            </a>
        </div>
    </div>
</div>
