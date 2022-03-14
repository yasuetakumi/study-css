<script type="text/x-template" id="email-search-preference-tpl">
    <div class="modal fade" id="emailPreferenceModal" tabindex="-1" aria-labelledby="emailPreferenceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailPreferenceModalLabel">新規メールを登録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <div class="d-flex flex-column">
                        <label for="emailPreferences">メールアドレス：</label>
                        <input type="email" class="form-control" :value="value" @input="$emit('input', $event.target.value)" id="emailPreferences" placeholder="Enter email" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="$emit('register')">Register</button>
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
            emailPeference: {
                get(){
                    return this.value;
                },
                set(val) {
                    this.$emit('input', val);
                }
            }
        },

    });
</script>
