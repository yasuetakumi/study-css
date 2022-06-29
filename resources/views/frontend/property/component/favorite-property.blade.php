<div class="px-1 mt-3 mb-3" v-if="getLikeProperty" >

    <h5 class="mb-3">
        最近お気に入りに追加した物件
    </h5>
    <div v-for="pd in list_favorite" :key="pd.id">
        <property-list :property="pd">
            <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
        </property-list>
    </div>

    <a href="{{route('property.history', ['favorite' => true ])}}" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
        <span>
            もっと見る
            <i class="fas fa-arrow-right"></i>
        </span>
    </a>

</div>
