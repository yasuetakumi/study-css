<div v-if="loading">
    <p>Loading data...</p>
</div>

<div v-else-if="!property_data">
    <p>No data</p>
</div>

<property-list v-else v-for="pd in property_data" :property="pd" :key=pd.id></property-list>
