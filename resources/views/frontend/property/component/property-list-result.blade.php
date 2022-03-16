<!-- Modal -->
<div v-if="items.confirmDelete">
    <div style="position: fixed; z-index: 10; top: 0; left: 0; width:100%; height: 100%; overflow:hidden; padding-top:10px; background-color: rgba(0,0,0,0.4);">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card p-3 bg-dark">
                    <p class="text-white">削除してもよろしいですか？</p>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark mr-2 border border-white" id="buttonYes" ref="buttonYes" @click="deleteFavorite(true)">
                            確認
                        </button>
                        <button class="btn btn-dark border border-white" id="buttonNo" ref="buttonNo" @click="deleteFavorite(false)">
                            キャンセル
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div v-if="loading">
    <p>Loading data...</p>
</div>

<div v-else-if="!property_data">
    <p>No data</p>
</div>

<div v-else v-for="pd in property_data" :key=pd.id>
    <property-list :property="pd">
        <button-favorite :likes="items.like_property" :idproperty="pd.id" @click="setLikeProperty(pd.id)"></button-favorite>
    </property-list>
</div>
