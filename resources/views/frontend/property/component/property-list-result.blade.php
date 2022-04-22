<div v-if="loading">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div v-else-if="!property_data">
    <p>現在の条件では物件が見つかりません。検索条件を広げてください</p>
</div>

<div v-else v-for="pd in property_data" :key=pd.id>
    <property-list :property="pd" :distance="items.walking_distance">
        <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
    </property-list>
</div>
