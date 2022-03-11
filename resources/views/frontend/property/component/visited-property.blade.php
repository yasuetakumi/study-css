<div class="px-1">
    <h5 class="mb-3">
        条件で絞る
    </h5>
    <div v-if="historyProperty" v-for="pd in historyProperty" :key="pd.id">
        @include('frontend._components.property_list')
    </div>
    <div v-else>
        <p>No Property Visited yet</p>
    </div>
    <a href="{{route('property.history', ['favorite' => true ])}}" class="btn btn-primary px-4 py-2 d-block w-100 mt-3">
        <span>
            お気に入り一覧を見る
            <i class="fas fa-arrow-right"></i>
        </span>
    </a>
</div>
