<script type="text/x-template" id="example-tpl">
    <div>
        <h2>Example Component @{{min}}</h2>
    </div>

</script>

<script>
    Vue.component('Example', {

        // Template name
        template: '#example-tpl',

        // Aavailable properties
        props: {
            min: { required: true, default: null },
        },

        // Computed properties
        computed: {

        },

    });
</script>
