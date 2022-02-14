<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title mb-0">Property ID @{{pd.id}}</h3>
    </div>
    <div class="card-body">
        <dl>
            <dt>Location</dt>
                <dd>@{{pd.location}}</dd>
            <dt>Rent Amount </dt>
                <dd>@{{pd.rent_amount}}</dd>
            <dt>Surface Area</dt>
                <dd>@{{pd.surface_area}}</dd>
        </dl>
        <div class="flex justify-content-end">
            <a id="favorite" type="button" style="color: red" @click="setLikeProperty(pd.id)">
                <i :class="items.like_property.includes(pd.id) ? 'fas' : 'far' " class="fa-heart fa-2x"></i>
            </a>
        </div>
    </div>
</div>
