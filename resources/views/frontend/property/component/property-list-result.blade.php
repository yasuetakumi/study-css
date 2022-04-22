<div v-if="loading">
    <p>Loading data...</p>
</div>

<div v-else-if="!property_data">
    <p>No data</p>
</div>

<div v-else v-for="pd in property_data" :key=pd.id>
    <property-list :property="pd" :distance="items.walking_distance">
        <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
    </property-list>
</div>
