<script type="text/x-template" id="search-condition-list-tpl">
    <div>
        {{-- Button Trigger Search Condition --}}
        <button type="button" class="btn btn-primary w-100 mt-3 px-4 py-2" data-toggle="modal" data-target="#modalSearchCondition">
            <span>
                <i class="fas fa-search"></i>
                Search Condition
            </span>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalSearchCondition" tabindex="-1" role="dialog" aria-labelledby="modalSearchConditionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" v-for="(filter, index) in items.filter" :key="filter.id">
                <div class="modal-content">
                    <div class="d-flex align-items-center p-2 border-bottom">
                        <div class="d-flex flex-grow-1 justify-content-between">
                            <h5 class="mb-0" id="modalSearchConditionTitle">希望物件：マッチングサービス</h5>
                            <p class="mb-0">$value件の保存条件があります/最大１０件</p>
                        </div>
                        <a role="button" data-dismiss="modal" aria-label="Close" class="ml-3 px-2" style="cursor: pointer;">
                            <span aria-hidden="true"><i class="fas fa-2x fa-times"></i></span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="position-relative bg-white">
                            <div class="position-absolute" style="top: 0px; left: 0px;">
                                <div class="px-2 py-1 bg-primary rounded-sm">
                                    <span>1</span>
                                </div>
                            </div>
                            <p class="text-right">登録日:$value</p>
                            <div class="pl-5">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <p class="mb-0">詳しく条件：</p>
                                    </div>
                                    <div class="col-4">
                                        <!-- Button Mail-->
                                        <button type="button" class="shadow-md w-100 btn btn-secondary text-xs">
                                            <span><i class="fas fa-envelope"></i>新規メールを受け取る</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row align-items-end mb-2">
                                    <div class="col-8">
                                        <p class="mb-0">▼希望条件の詳細をご記入ください</p>
                                    </div>
                                    <div class="col-4">
                                        <!-- Total of Matches Property-->
                                        <p class="text-primary text-lg mb-0">81 <span class="text-xs">$value件がマッチ</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mt-1">
                                        <textarea class="form-control w-100" name="comment" v-model="items.comment" id="" cols="30" rows="5" style="height: 50px;" :readonly="!items.controlTextArea"></textarea>
                                        <div class="d-flex justify-content-end">
                                            <div class="text-right">
                                                <button type="button" class="px-2 py-1 btn btn-secondary rounded-0" @click="handleEditOrSave">
                                                    @{{titleEditOrSave}}
                                                </button>
                                            </div>
                                            <!-- Cancel Button-->
                                            <div class="text-right ml-2" v-if="showCancelButton">
                                                <button type="button" class="px-2 py-1 btn btn-secondary rounded-0">
                                                    キャンセル
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Link to C2 with Filter -->
                                        <button type="button" class="shadow-md w-100 btn btn-primary text-xs ">
                                            <span><i class="fas fa-search"></i>マッチした一覧を表示</span>
                                        </button>
                                        <!-- Delete Button -->
                                        <button type="button" class="shadow-md w-100 btn btn-danger text-xs mt-3" @click="deleteSearchCondition(filter.id)">
                                            <span><i class="fas fa-search"></i>この条件削除する</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('SearchConditionList', {

        // Template name
        template: '#search-condition-list-tpl',

        // Aavailable properties
        props: {

        },

        data: function(){
            var data = {
                items: {
                    controlTextArea: false,
                    comment: null,
                    filter: [
                        {
                            id: 1,
                            value: 'a',
                        },
                        {
                            id: 2,
                            value: 'b',
                        },
                        {
                            id: 3,
                            value: 'c',
                        },
                    ]
                }
            }
            return data;
        },

        mounted: function(){
            this.getLocalStorage();
        },

        // Computed properties
        computed: {
            titleEditOrSave: function(){
                if(this.items.controlTextArea == false){
                    return '編集'; //edit
                } else {
                    return '保存'; //save
                }
            },
            showCancelButton: function(){
                if(this.items.controlTextArea == true){
                    return true;
                } else {
                    return false;
                }
            }
        },
        methods: {
            handleEditOrSave: function(){
                if(this.items.controlTextArea == false){
                    this.items.controlTextArea = true;

                } else {
                    this.items.controlTextArea = false;
                    localStorage.setItem("comment", this.items.comment);
                    localStorage.setItem('searchConditions', JSON.stringify(this.items.filter));
                }
            },
            getLocalStorage: function(){
                let local = localStorage.getItem("comment");
                if(local != null){
                    this.items.comment = local;
                }
            },
            deleteSearchCondition: function(id){
                console.log(id);
                var conditions = [];
                let local = localStorage.getItem('searchConditions');
                conditions = JSON.parse(local) || [];
                console.log(conditions);
                if(conditions.length > 0){
                    var values = conditions.map(object => object.id);
                    console.log(values);
                    let index = values.indexOf(id);
                    conditions.splice(index, 1);
                    localStorage.setItem('searchConditions', JSON.stringify(conditions));
                    let msg = '@lang('label.SUCCESS_DELETE_MESSAGE')';
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                }
            }

        }

    });
</script>
