<script type="text/x-template" id="saved-conditions-tpl">
    <div class="modal fade" id="saveConditions" tabindex="-1" aria-labelledby="saveConditionsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" ref="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        条件を保存しました <br/>
                        <a href="#" @click="displaySavedConditions">
                            保存された条件の一覧を表示する
                        </a>
                        <search-condition-list></search-condition-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('SaveConditions', {

        // Template name
        template: '#saved-conditions-tpl',

        data: function(){
            var data = {}
            return data;
        },
        methods: {
            displaySavedConditions: function() {
                const element = document.getElementById("modalAlert");
                element.classList.remove("fade");

                const modalSearchCondition = document.getElementById("btnOpenModal");
                const closeModalSearchCondition = document.getElementById("btnCloseModal");
                this.$refs.close.click();
                setTimeout(() => {
                    // modalSearchCondition.dataset.target = "#modalSearchCondition";
                    modalSearchCondition.click();
                    closeModalSearchCondition.close();
                }, 100);
                modalSearchCondition.click();

                // get the number of matched properties in each search condition
                this.$parent.$refs.SearchConditionList.setCountedProperties();
            }
        }

    });
</script>
