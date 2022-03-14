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

        <!-- Start - Clear Search Condition -->
        <button @click="searchCondition = []" :disabled="!Object.keys(searchCondition).length"
            class="btn btn-dark px-4 py-2 w-100">
            条件クリア
        </button>
        <!-- End - Clear Search Condition -->

        <hr>

        <h6 class="text-center">今の検索条件で</h6>
        <div class="row">

            <!-- Start - Add Search Condition to Local Storage -->
            <div class="col-5">
                <button @click="registerSearchCondition(searchCondition)" :disabled="!Object.keys(searchCondition).length"
                    class="btn btn-dark py-2 px-4">
                    <span class="fa fa-list-alt"></span>
                    保存する
                </button>
            </div>
            <!-- End - Add Search Condition to Local Storage -->

            <!-- Start - Add Search Condition to Local Storage -->
            <div class="col-7">
                <button @click="registerNewEmail(searchCondition)" :disabled="!Object.keys(searchCondition).length"
                    class="btn btn-dark py-2 px-4" style="width: inherit">
                    <span class="fa fa-envelope"></span>
                    新規メールを登録
                </button>
            </div>
            <!-- End - Add Search Condition to Local Storage -->

        </div>

        <!-- Start - Add Filter Form Condition to Local Storage -->
        <button @click="registerCurrentFilter" class="btn btn-dark mt-3 px-4 py-2 w-100">
            この条件で新規メールを受け取る
        </button>
        <!-- End - Add Filter Form Condition to Local Storage -->

    </div>
</div>
