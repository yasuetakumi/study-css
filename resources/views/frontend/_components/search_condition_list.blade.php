<script type="text/x-template" id="search-condition-list-tpl">
    <div>

        <!-- if its used on navbar then show navlink -->
        <a href="" v-if="isbutton=='false'" class="nav-link text-light" id="btnOpenModal" data-toggle="modal" :data-target="activeModal" @click="getLocalStorage">@{{label}}</a>

        <div class="modal fade" id="modalAlert" tabindex="-1" aria-labelledby="modalAlertLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="text-center">@lang('label.no_condition_saved')</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalSearchCondition" tabindex="-1" role="dialog" aria-labelledby="modalSearchConditionTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-0 modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-0" style="background-color: #AEA9A9">
                    <div class="modal-header bg-white mb-3">
                        <div class="d-flex flex-grow-1 justify-content-between">
                            <h5 class="mb-0" id="modalSearchConditionTitle">希望物件：マッチングサービス</h5>
                            <p class="mb-0"><span class="text-primary">@{{totalSavedSearchCondition}}</span>件の保存条件があります/最大10件</p>
                        </div>
                        <a role="button" id="btnCloseModal" data-dismiss="modal" aria-label="Close" class="ml-3 px-2" style="cursor: pointer;">
                            <span aria-hidden="true"><i class="fas fa-2x fa-times"></i></span>
                        </a>
                      </div>
                    <div>
                        <h4 class="mb-4 ml-4">保存した検索物件一覧</h4>
                    </div>
                    <div class="modal-body pl-4 pr-0 pb-4 pt-0">
                        <div class="position-relative border p-3 mb-4 bg-white" v-for="(sc, index) in items.search_condition" :key="index">
                            <div class="position-absolute" style="top: 0px; left: 0px;">
                                <div class="px-2 py-1 bg-primary rounded-sm">
                                    <span>@{{index + 1}}</span>
                                </div>
                            </div>
                            <p class="text-right">登録日:@{{convertToDateOnly(sc.created_at)}}</p>
                            <div class="pl-5">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <p class="mb-0">検索条件:
                                            <span><span style="color: rgb(243, 78, 5)">[市区町村] </span>@{{sc.市区町村 ? sc.市区町村 : ' ー '}} </span>
                                            <!-- If min and max surface-->
                                            <span v-if="sc.surfaceMin && sc.surfaceMax"><span style="color: rgb(243, 78, 5)">[面積] </span>@{{sc.surfaceMin + '〜' + sc.surfaceMax}}</span>
                                            <!-- If min != null and max == null surface-->
                                            <span v-else-if="sc.surfaceMin && !sc.surfaceMax"><span style="color: rgb(243, 78, 5)">[面積] </span>@{{sc.surfaceMin + '〜' + '上限なし'}}</span>
                                            <!-- If min == null and max != null surface-->
                                            <span v-else-if="!sc.surfaceMin && sc.surfaceMax"><span style="color: rgb(243, 78, 5)">[面積] </span>@{{'下限なし' + '〜' + sc.surfaceMax}}</span>
                                            <!-- If min == null and max == null surface-->
                                            <span v-else><span style="color: rgb(243, 78, 5)">[面積] </span> ー </span>

                                            <!-- If min and max rent_amount-->
                                            <span v-if="sc.rentAmountMin && sc.rentAmountMax"><span style="color: rgb(243, 78, 5)">[賃料] </span>@{{sc.rentAmountMin + '〜' + sc.rentAmountMax}}</span>
                                            <!-- If min != null and max == null rent_amount-->
                                            <span v-else-if="sc.rentAmountMin && !sc.rentAmountMax"><span style="color: rgb(243, 78, 5)">[賃料] </span>@{{sc.rentAmountMin + '〜' + '上限なし'}}</span>
                                            <!-- If min == null and max != null rent_amount-->
                                            <span v-else-if="!sc.rentAmountMin && sc.rentAmountMax"><span style="color: rgb(243, 78, 5)">[賃料] </span>@{{'下限なし' + '〜' + sc.rentAmountMax}}</span>
                                            <!-- If min == null and max == null rent_amount-->
                                            <span v-else><span style="color: rgb(243, 78, 5)">[賃料] </span> ー </span>

                                            <span><span style="color: rgb(243, 78, 5)">[フリーワード] </span>@{{sc.フリーワード ? sc.フリーワード : ' ー '}}</span>
                                            <span><span style="color: rgb(243, 78, 5)">[徒歩] </span>@{{sc.徒歩 ? sc.徒歩 : ' ー '}}</span>

                                            <!-- If min and max transfer_price-->
                                            <span v-if="sc.譲渡額下限 && sc.譲渡額上限"><span style="color: rgb(243, 78, 5)">[譲渡額] </span>@{{sc.譲渡額下限 + '〜' + sc.譲渡額上限}}</span>
                                            <!-- If min != null and max == null transfer_price-->
                                            <span v-else-if="sc.譲渡額下限 && !sc.譲渡額上限"><span style="color: rgb(243, 78, 5)">[譲渡額] </span>@{{sc.譲渡額下限 + '〜' + '上限なし'}}</span>
                                            <!-- If min == null and max != null transfer_price-->
                                            <span v-else-if="!sc.譲渡額下限 && sc.譲渡額上限"><span style="color: rgb(243, 78, 5)">[譲渡額] </span>@{{'下限なし' + '〜' + sc.譲渡額上限}}</span>
                                            <!-- If min == null and max == null transfer_price-->
                                            <span v-else><span style="color: rgb(243, 78, 5)">[譲渡額] </span> ー </span>

                                            <span><span style="color: rgb(243, 78, 5)">[階数(地上)] </span>@{{sc.階数_地上 ? sc.階数_地上 : ' ー '}}</span>
                                            <span><span style="color: rgb(243, 78, 5)">[階数(地下)] </span>@{{sc.階数_地下 ? sc.階数_地下 : ' ー '}}</span>
                                            <span><span style="color: rgb(243, 78, 5)">[こだわり条件] </span>@{{sc.こだわり条件 ? sc.こだわり条件 : ' ー '}}</span>
                                            <span><span style="color: rgb(243, 78, 5)">[飲食店の種類] </span>@{{sc.飲食店の種類 ? sc.飲食店の種類 : ' ー '}}</span>
                                            <span><span style="color: rgb(243, 78, 5)"> [スケルトン物件・居抜き物件] </span> @{{sc.スケルトン物件_居抜き物件 ? sc.スケルトン物件_居抜き物件 : ' ー '}}</span>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <!-- Button Mail-->
                                        <button type="button" class="shadow-md w-100 btn btn-secondary text-xs" data-toggle="modal" data-target="#emailPreferenceModal" @click="getIndexSearchPref(sc)">
                                            <span><i class="fas fa-envelope"></i>メール配信登録</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row align-items-end mb-2">
                                    <div class="col-8">
                                        <p class="mb-0">▼希望条件の詳細をご記入ください</p>
                                    </div>
                                    <div class="col-4">
                                        <!-- Total of Matches Property-->
                                        <p class="text-primary text-lg mb-0">@{{sc.number_of_match_property}}<span class="text-xs">件がマッチ</span></p>
                                    </div>
                                </div>
                                <!-- Handle For LoggedIn Member -->
                                <div class="row" v-if="islogin">
                                    <div class="col-8 mt-1">
                                        <textarea @input="handleTextArea(sc.id)" class="form-control w-100" name="comment" :id="'comment'+sc.id" cols="30" rows="5">@{{sc.comment ? sc.comment : ''}}</textarea>
                                        <div class="d-flex justify-content-end">
                                            {{-- Edit Or Save Button --}}
                                            <div class="text-right">
                                                <input :id="'btnEdit' + sc.id" value="保存" type="button" class="px-2 py-1 btn btn-secondary rounded-0 d-none" @click="handleEditOrSave(sc.id)">
                                            </div>
                                            <!-- Cancel Button-->
                                            <div class="text-right ml-2">
                                                <input :id="'btnCancel'+sc.id" type="button" value="キャンセル" class="px-2 py-1 btn btn-secondary rounded-0 d-none" @click="handleCancel(sc.id)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Link to C2 with Filter -->
                                        <a :href="sc.url" class="shadow-md w-100 btn btn-primary text-xs ">
                                            <span><i class="fas fa-search"></i>マッチした物件の一覧を表示</span>
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="shadow-md w-100 btn btn-danger text-xs mt-3" @click="deleteSearchCondition(sc.id)">
                                            <span><i class="fas fa-trash"></i>この条件を削除する</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Handle For Non LoggedIn Member-->
                                <div class="row" v-else>
                                    <div class="col-8 mt-1">
                                        <textarea @input="handleTextArea(index)" class="form-control w-100" name="comment" :id="'comment'+index" cols="30" rows="5">@{{sc.comment ? sc.comment : ''}}</textarea>
                                        <div class="d-flex justify-content-end">
                                            {{-- Edit Or Save Button --}}
                                            <div class="text-right">
                                                <input :id="'btnEdit' + index" value="保存" type="button" class="px-2 py-1 btn btn-secondary rounded-0 d-none" @click="handleEditOrSave(index)">
                                            </div>
                                            <!-- Cancel Button-->
                                            <div class="text-right ml-2">
                                                <input :id="'btnCancel'+index" type="button" value="キャンセル" class="px-2 py-1 btn btn-secondary rounded-0 d-none" @click="handleCancel(index)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Link to C2 with Filter -->
                                        <a :href="sc.url" class="shadow-md w-100 btn btn-primary text-xs ">
                                            <span><i class="fas fa-search"></i>マッチした物件の一覧を表示</span>
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="shadow-md w-100 btn btn-danger text-xs mt-3" @click="deleteSearchCondition(index)">
                                            <span><i class="fas fa-trash"></i>この条件を削除する</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white mt-5">
                        <button type="button" id="btn-close" class="btn btn-secondary rounded-pill px-4" data-dismiss="modal">閉じる</button>
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
            isbutton: {
                type: String,
                required: false,
                default: "true"
            },
            label: {
                type: String,
                required: false,
                default: ""
            },
            islogin: {
                type: Number,
                required: false,
                default: "",
            },
        },

        data: function(){
            var data = {
                root_url: @json(url('/')),
                items: {
                    controlTextArea: false,
                    comment: null,
                    search_condition: [],
                    active_modal_state: null,
                }
                api: {
                    store_comment: @json(route('api.search.store.comment')),
                    delete_search_condition: @json(route('api.search.condition.member.delete')),
                }
            }
            return data;
        },

        mounted: function(){
            if(this.islogin){
                this.getSearchPreferenceMember(this.islogin);
            } else {
                this.getLocalStorage();
            }
            this.$nextTick(() => {
                if(this.items.search_condition && this.items.search_condition.length > 0){
                    for(let i=0; i < this.items.search_condition.length; i++){
                        this.titleEditOrSave(i);
                        // this.showCancelButton(i);
                    }
                }

            });
        },
        updated: function(){
            if(this.items.search_condition && this.items.search_condition.length > 0){
                for(let i=0; i < this.items.search_condition.length; i++){
                    this.titleEditOrSave(i);
                    // this.showCancelButton(i);
                }
            }
        },

        // Computed properties
        computed: {
            totalSavedSearchCondition: function(){
                let savedCondition = [];
                if(this.items.search_condition && this.items.search_condition.length > 0){
                    savedCondition = this.items.search_condition;
                    return savedCondition.length;
                }
            },
            activeModal: function(){
                if(this.items.search_condition && this.items.search_condition.length === 0){
                    this.active_modal_state = '#modalAlert';
                    return this.active_modal_state;
                } else {
                    this.active_modal_state = '#modalSearchCondition';
                    return this.active_modal_state;
                }
            }
        },
        methods: {
            handleEditOrSave: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                let local = localStorage.getItem('searchCondition');
                conditions = JSON.parse(local) || [];
                const newData = Object.assign(conditions[index], {"comment" : currentTextArea.value})
                conditions[index] = newData;
                localStorage.setItem('searchCondition', JSON.stringify(conditions));

                document.getElementById("btnCancel"+index).classList.remove("d-block")
                document.getElementById("btnCancel"+index).classList.add("d-none");

                document.getElementById("btnEdit"+index).classList.remove("d-block");
                document.getElementById("btnEdit"+index).classList.add("d-none");

                this.getLocalStorage();
                // this.getSearchPreferenceMember(this.islogin)
            },

            handleCancel: function(index){
                let local = localStorage.getItem('searchCondition');
                conditions = JSON.parse(local) || [];
                let currentTextArea = document.getElementById("comment"+index);
                let currentBtnCancel = document.getElementById("btnCancel"+index);
                currentTextArea.value = conditions[index].comment == undefined ? null : conditions[index].comment;
                currentBtnCancel.classList.remove("d-block");
                currentBtnCancel.classList.add("d-none");
                document.getElementById("btnEdit"+index).classList.remove("d-block");
                document.getElementById("btnEdit"+index).classList.add("d-none");

            },
            getLocalStorage: function(){
                let local = localStorage.getItem("searchCondition");
                console.log("local", JSON.parse(local));
                let localArr = local != null ? JSON.parse(local) : [] ; // parse to array
                this.items.search_condition = localArr;
            },
            getSearchPreferenceMember: function(){
                axios.get(this.items.root_url + '/api/v1/search/getSearchConditionMember/' + this.islogin)
                .then((res) => {
                    this.items.search_condition = res.data;
                }).catch((err) => {
                    console.log(err);
                });
            },
            deleteSearchCondition: function(index){
                console.log(index);
                var conditions = [];
                let local = localStorage.getItem('searchCondition');
                conditions = JSON.parse(local) || [];
                console.log(conditions);
                if(conditions.length > 0){
                    conditions.splice(index, 1);
                    localStorage.setItem('searchCondition', JSON.stringify(conditions));
                    let msg = '@lang('label.SUCCESS_DELETE_MESSAGE')';
                    this.$toasted.show( msg, {
                        type: 'success'
                    });
                }
                this.getLocalStorage();

                if(this.items.search_condition.length === 0){
                    let close = document.getElementById("btnCloseModal");
                    let open = document.getElementById("btnOpenModal");
                    close.click();
                    // console.log(this.items.search_condition);
                    this.active_modal_state = '#modalAlert';
                    setTimeout(() => {
                        open.click();
                    }, 500);
                }

                this.getLocalStorage();
            },
            titleEditOrSave: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                if(currentTextArea.hasAttribute("readonly")){
                    document.getElementById("btnEdit"+index).setAttribute("value", "編集"); //edit
                    // return true;
                } else {
                    document.getElementById("btnEdit"+index).setAttribute("value", "保存"); //save
                    // return false;
                }
            },
            showCancelButton: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                if( currentTextArea.hasAttribute("readonly") ){
                    document.getElementById("btnCancel"+index).classList.add("d-none");
                    // return false;
                } else {
                    document.getElementById("btnCancel"+index).classList.add("d-block");
                    // return true;
                }
            },

            handleTextArea: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                let local = localStorage.getItem('searchCondition');
                conditions = JSON.parse(local) || [];
                if(currentTextArea.value != conditions[index]){
                    // document.getElementById("btnEdit"+index).setAttribute("value", "保存");
                    document.getElementById("btnEdit"+index).classList.remove("d-none");
                    document.getElementById("btnEdit"+index).classList.add("d-block");
                    document.getElementById("btnCancel"+index).classList.remove("d-none");
                    document.getElementById("btnCancel"+index).classList.add("d-block");
                } else {
                    // document.getElementById("btnEdit"+index).setAttribute("value", "保存");
                    document.getElementById("btnEdit"+index).classList.remove("d-block");
                    document.getElementById("btnEdit"+index).classList.add("d-none");
                    document.getElementById("btnCancel"+index).classList.remove("d-block");
                    document.getElementById("btnCancel"+index).classList.add("d-none");
                }
            },
            convertToDateOnly: function(date){
                let newDate = new Date(date);
                return newDate.toISOString().split('T')[0]
            },
            storeComment: function(id){
                const getCommentValue = document.getElementById("comment"+id).value;
                axios.post(this.api.store_comment, {
                    id: id;
                }).then((res) => {
                    console.log(res);
                    this.items.comment = '';
                    this.getLocalStorage();
                }).catch((err) => {
                    console.log(err);
                });
            }
        }

    });
</script>
