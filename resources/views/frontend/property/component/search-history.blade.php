<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3 class="card-title mb-0">
            選択中の条件
        </h3>
    </div>

    <div class="card-body clearfix">
        <!-- Start - Search Condition -->
        <h6>検索条件</h6>
        <ul>
            <li v-for="(condition, conditionKey) in displayedSearchCondition">
                @{{ conditionKey }}: @{{ condition }}
            </li>
        </ul>
        <!-- End - Search Condition -->

        <hr>

        <h6 class="text-center">今の検索条件で</h6>
        <div class="row">

            <!-- Start - Add Search Condition to Local Storage -->
            <div class="col-5">
                <button data-toggle="modal" data-target="#saveConditions" @click="registerSearchCondition(searchCondition)" :disabled="!Object.keys(searchCondition).length"
                    class="btn btn-dark py-2 px-4">
                    <span class="fa fa-list-alt"></span>
                    保存する
                </button>
            </div>
            <!-- End - Add Search Condition to Local Storage -->

            <!-- Start - Add Search Condition to Local Storage -->
            <div class="col-7">
                <button data-toggle="modal" data-target="#emailPreferenceModal"  @click="registerNewEmail(searchCondition)" :disabled="!Object.keys(searchCondition).length"
                    class="btn btn-dark py-2 px-4" style="width: inherit">
                    <span class="fa fa-envelope"></span>
                    保存してメール配信登録
                </button>
            </div>
            <!-- End - Add Search Condition to Local Storage -->

        </div>


    </div>
</div>
