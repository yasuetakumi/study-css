<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3 class="card-title mb-0">
            選択中の条件
        </h3>
    </div>

    <div class="card-body clearfix">
        <div>検索条件</div>
        <ul>
            <li v-for="(condition, conditionKey) in searchCondition">
                @{{ conditionKey }}: @{{ condition }}
            </li>
        </ul>

        <button @click="searchCondition = ''" class="btn btn-dark px-4 py-2 w-100">
            条件クリア
        </button>

        <hr>
        今の検索条件で
        <ul>
            <li></li>
        </ul>

        <div class="row">
            <div class="col-5">
                <button @click="registerSearchCondition(searchCondition)" class="btn btn-dark py-2 px-4">
                    <span class="fa fa-list-alt"></span>
                    保存する
                </button>
            </div>
            <div class="col-7">
                <button @click="registerNewEmail(searchCondition)" class="btn btn-dark py-2 px-4">
                    <span class="fa fa-envelope"></span>
                    新規メールを登録
                </button>
            </div>
        </div>

        <button @click="registerCurrentFilter" class="btn btn-dark mt-3 px-4 py-2 w-100">
            この条件で新規メールを受け取る
        </button>
    </div>
</div>
