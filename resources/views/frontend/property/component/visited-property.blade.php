<div class="px-1"  v-if="historyProperty" >

    <h5 class="mb-3">
        最近の閲覧履歴
    </h5>
    <div v-for="pd in historyProperty" :key="pd.id">
        <property-list :property="pd">
            <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
        </property-list>
    </div>

    <a href="{{route('property.history', ['favorite' => true ])}}" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
        <span>
            お気に入り一覧を見る
            <i class="fas fa-arrow-right"></i>
        </span>
    </a>

</div>
