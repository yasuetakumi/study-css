<script type="text/x-template" id="search-condition-list-tpl">
    <div>
        <!-- if its used on page as button then show button search -->
        {{-- Button Trigger Search Condition --}}
        <button v-if="isbutton=='true'" type="button" class="btn btn-primary w-100 mt-3 px-4 py-2" data-toggle="modal" :data-target="activeModal" @click="getLocalStorage">
            <span>
                <i class="fas fa-search"></i>
                Search Condition
            </span>
        </button>

        <!-- if its used on navbar then show navlink -->
        <a href="" v-if="isbutton=='false'" class="nav-link text-light" data-toggle="modal" :data-target="activeModal" @click="getLocalStorage">@{{label}}</a>

        <div class="modal fade" id="modalAlert" tabindex="-1" aria-labelledby="modalAlertLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="text-center">No Search Condition Saved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalSearchCondition" tabindex="-1" role="dialog" aria-labelledby="modalSearchConditionTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-0" role="document" v-for="(sc, index) in items.search_condition" :key="index">
                <div class="modal-content rounded-0">
                    <div class="modal-header" v-if="index == 0">
                        <div class="d-flex flex-grow-1 justify-content-between">
                            <h5 class="mb-0" id="modalSearchConditionTitle">希望物件：マッチングサービス</h5>
                            <p class="mb-0"><span class="text-primary">@{{totalSavedSearchCondition}}</span>件の保存条件があります/最大１０件</p>
                        </div>
                        <a role="button" data-dismiss="modal" aria-label="Close" class="ml-3 px-2" style="cursor: pointer;">
                            <span aria-hidden="true"><i class="fas fa-2x fa-times"></i></span>
                        </a>
                      </div>
                    <div class="modal-body">
                        <div class="position-relative bg-white">
                            <div class="position-absolute" style="top: 0px; left: 0px;">
                                <div class="px-2 py-1 bg-primary rounded-sm">
                                    <span>@{{index + 1}}</span>
                                </div>
                            </div>
                            <p class="text-right">登録日:@{{sc.created_at}}</p>
                            <div class="pl-5">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <p class="mb-0">詳しく条件：
                                            <span v-if="sc.市"><span style="color: rgb(243, 78, 5)">市</span>@{{sc.市}} - </span>
                                            <span v-if="sc.面積下限"><span style="color: rgb(243, 78, 5)">面積下限 </span>@{{sc.面積下限}} - </span>
                                            <span v-if="sc.面積上限"><span style="color: rgb(243, 78, 5)">面積上限 </span>@{{sc.面積上限}} - </span>
                                            <span v-if="sc.賃料下限"><span style="color: rgb(243, 78, 5)">賃料下限 </span>@{{sc.賃料下限}} - </span>
                                            <span v-if="sc.賃料上限"><span style="color: rgb(243, 78, 5)">賃料上限 </span>@{{sc.賃料上限}} - </span>
                                            <span v-if="sc.徒歩"><span style="color: rgb(243, 78, 5)">徒歩 </span>@{{sc.徒歩}} - </span>
                                            <span v-if="sc.譲渡額下限"><span style="color: rgb(243, 78, 5)">譲渡額下限 </span>@{{sc.譲渡額下限}} - </span>
                                            <span v-if="sc.譲渡額上限"><span style="color: rgb(243, 78, 5)">譲渡額上限 </span>@{{sc.譲渡額上限}} - </span>
                                            <span v-if="sc.階数_地上"><span style="color: rgb(243, 78, 5)">階数(地上) </span>@{{sc.階数_地上}} - </span>
                                            <span v-if="sc.階数_地下"><span style="color: rgb(243, 78, 5)">階数(地下) </span>@{{sc.階数_地下}} - </span>
                                            <span v-if="sc.こだわり条件"><span style="color: rgb(243, 78, 5)">こだわり条件 </span>@{{sc.こだわり条件}} - </span>
                                            <span v-if="sc.スケルトン物件_居抜き物件"><span style="color: rgb(243, 78, 5)"> スケルトン物件・居抜き物件 </span> @{{sc.スケルトン物件_居抜き物件}} - </span>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <!-- Button Mail-->
                                        <button type="button" class="shadow-md w-100 btn btn-secondary text-xs" data-toggle="modal" data-target="#emailPreferenceModal" @click="getIndexSearchPref(sc)">
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
                                        <p class="text-primary text-lg mb-0">@{{sc.number_of_match_property}}<span class="text-xs">件がマッチ</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mt-1">
                                        <textarea class="form-control w-100" name="comment" :id="'comment'+index" cols="30" rows="5" readonly>@{{sc.comment ? sc.comment : ''}}</textarea>
                                        <div class="d-flex justify-content-end">
                                            {{-- Edit Or Save Button --}}
                                            <div class="text-right">
                                                <input :id="'btnEdit' + index" value="" type="button" class="px-2 py-1 btn btn-secondary rounded-0" @click="handleEditOrSave(index)">
                                            </div>
                                            <!-- Cancel Button-->
                                            <div class="text-right ml-2">
                                                <input :id="'btnCancel'+index" type="button" value="キャンセル" class="px-2 py-1 btn btn-secondary rounded-0" @click="handleCancel(index)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Link to C2 with Filter -->
                                        <a :href="sc.url" class="shadow-md w-100 btn btn-primary text-xs ">
                                            <span><i class="fas fa-search"></i>マッチした一覧を表示</span>
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="shadow-md w-100 btn btn-danger text-xs mt-3" @click="deleteSearchCondition(index)">
                                            <span><i class="fas fa-trash"></i>この条件削除する</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
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
        },

        data: function(){
            var data = {
                items: {
                    controlTextArea: false,
                    comment: null,
                    search_condition: null,
                }
            }
            return data;
        },

        mounted: function(){
            this.getLocalStorage();
            this.$nextTick(() => {
                if(this.items.search_condition && this.items.search_condition.length > 0)
                    for(let i=0; i < this.items.search_condition.length; i++){
                        this.titleEditOrSave(i);
                        this.showCancelButton(i);
                    }
            });
        },
        updated: function(){
            if(this.items.search_condition && this.items.search_condition.length > 0)
                for(let i=0; i < this.items.search_condition.length; i++){
                    this.titleEditOrSave(i);
                    this.showCancelButton(i);
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
                if(this.items.search_condition != null){
                    return '#modalSearchCondition';
                } else {
                    return '#modalAlert';
                }
            }
        },
        methods: {
            handleEditOrSave: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                if(currentTextArea.hasAttribute("readonly")){
                    currentTextArea.removeAttribute("readonly");
                    document.getElementById("btnEdit"+index).setAttribute("value", "保存");
                    document.getElementById("btnCancel"+index).classList.add("d-block");

                } else {
                    let local = localStorage.getItem('searchCondition');
                    conditions = JSON.parse(local) || [];
                    const newData = Object.assign(conditions[index], {"comment" : currentTextArea.value})
                    conditions[index] = newData;
                    localStorage.setItem('searchCondition', JSON.stringify(conditions));
                    currentTextArea.setAttribute("readonly", "true");
                    document.getElementById("btnEdit"+index).setAttribute("value", "編集");
                    document.getElementById("btnCancel"+index).classList.remove("d-block")
                    document.getElementById("btnCancel"+index).classList.add("d-none");
                }
                this.getLocalStorage();
            },

            handleCancel: function(index){
                let currentTextArea = document.getElementById("comment"+index);
                let currentBtnCancel = document.getElementById("btnCancel"+index);
                currentTextArea.setAttribute("readonly", "true");
                currentBtnCancel.classList.remove("d-block");
                currentBtnCancel.classList.add("d-none");

            },
            getLocalStorage: function(){
                let local = localStorage.getItem("searchCondition");
                let localArr = JSON.parse(local) || []; // parse to array
                if(localArr.length > 0){ //check if array null
                    this.items.search_condition = localArr;
                }
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
            getIndexSearchPref: function(sc){
                this.$emit("getindex", sc)
            }

        }

    });
</script>
