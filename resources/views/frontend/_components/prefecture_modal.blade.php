<script type="text/x-template" id="prefecture-modal-tpl">
    <div class="modal fade" id="prefectureModal" tabindex="-1" aria-labelledby="prefectureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prefectureModalLabel">都道府県</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="card-body">
                                <ul class="list-multi-columns">
                                    <li v-for="prefecture in prefectures" :key="prefecture.id">
                                        <a role="button" @click="openStationCity(prefecture.id)" type="button" data-toggle="modal" data-target="#stationCityModal" >@{{prefecture.display_name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</script>

<script>
    Vue.component('PrefectureModal', {
        // Template name
        template: '#prefecture-modal-tpl',
        props: ['prefectures'],
        data: function() {
            var data = {
                // -------------------------------------------------------------
                // Form result set here
                // -------------------------------------------------------------
                items: {
                    email_search_preference: null,
                },
                // -------------------------------------------------------------
            };
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            return data;
            // -----------------------------------------------------------------
        },
        computed: {
        },
        methods: {
            routeToPrefectureDetail(prefectureName){
                return root_url + '/prefecture/' + prefectureName;
            },
            openStationCity(prefectureId){
                this.$emit('click', prefectureId);
            }
        },
    });
</script>
