<div v-if="loading">
    <p>Loading data...</p>
</div>

<div v-else-if="!property_data">
    <p>No data</p>
</div>

<div v-else v-for="pd in property_data" :key=pd.id>
    @include('frontend._components.property_list')
</div>
