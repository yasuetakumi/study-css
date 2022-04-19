<script type="text/x-template" id="button-favorite-tpl">
    <a id="favorite" type="button" style="color: red" @click="$emit('click')">
        <i :class="likes.includes(idproperty) ? 'fas' : 'far' " class="fa-heart fa-2x"></i>
    </a>
</script>

<script>
    Vue.component('ButtonFavorite', {

        // Template name
        template: '#button-favorite-tpl',

        // Aavailable properties
        props: {
            likes: {required: true, default: null},
            idproperty: {required: true, default: null},
        },

        // Computed properties
        computed: {

        },

    });
</script>
