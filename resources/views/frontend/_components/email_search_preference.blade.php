<script type="text/x-template" id="email-search-preference-tpl">
    <div class="modal fade" id="emailPreferenceModal" tabindex="-1" aria-labelledby="emailPreferenceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailPreferenceModalLabel">新規メールを登録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close" ref="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div>
                            メールを記入してください。<br>
                            <br>
                            ご希望にマッチした新規物件物件ございましたらご記入頂いたメーアドレスに送ります。<br>
                            <br>
                        </div>
                        <label for="emailPreferences">メールアドレス：</label>
                        <input type="email" :class="validateEmail && value != null ? 'is-invalid' : '' " class="form-control" :value="value" @input="$emit('input', $event.target.value)" id="emailPreferences" placeholder="Enter email" aria-describedby="emailHelp">
                        <span v-if="validateEmail && value != null" id="emailHelp" class="error invalid-feedback">有効なメールアドレスを入力してください</span>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="registerEmail" :disabled="disableButton">新着メールを受け取る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('EmailSearchPreference', {

        // Template name
        template: '#email-search-preference-tpl',

        // Aavailable properties
        props: ['value'],
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

        // Computed properties
        computed: {
            disableButton: function(){
                if(this.validateEmail){
                    return true;
                } else {
                    return false;
                }
            },
            validateEmail: function() {
                if (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.value)) {
                    //email invalid
                    return false;
                } else {
                    return true;
                }
            }

        },
        methods: {
            registerEmail: function(){
                this.$emit('register');
                this.$refs.close.click();
            }
        }

    });
</script>
