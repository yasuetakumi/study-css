<script type="text/x-template" id="station-city-modal">
    <div class="modal fade" id="stationCityModal" tabindex="-1" aria-labelledby="stationCityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stationCityModalLabel">都道府県</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" ref="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="card">
                                <div class="card-header bg-white border-bottom-0">
                                    <div class="btn-group border rounded mb-3">
                                        <button type="button" class="btn btn-primary btn px-4 py-2">地域から探す
                                        </button>
                                        <button type="button" class="btn btn-primary btn px-4 py-2">駅から探す
                                        </button>
                                    </div>
                                </div>
                                <form action="#" method="POST">
                                    <div>
                                        <template>
                                            <div class="card-header bg-white border-bottom-0">
                                                <h3 class="card-title mb-0">市区町村で絞り込む</h3>
                                            </div>

                                            <hr class="my-0 mx-2">

                                            <div class="card-body">
                                                <input type="hidden" name="prefecture_id" value="">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex py-3">
                                                            <div class="mr-4">
                                                                <button type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択</button>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-danger px-2 py-2 rounded-0">すべて選択解除</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @{{prefecture}}
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('StationCityModal', {
        // Template name
        template: '#station-city-modal',
        props: ['prefecture'],
        computed: {
        }
    });
</script>
