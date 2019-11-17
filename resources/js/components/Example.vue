<template>
    <div>
        <div class="card">
            <div class="card-header">Example Component</div>

            <div class="card-body">
                <a class="btn btn-xs" href="javascript:" @click="$root.isModalOpen = true">Open sample modal</a>
            </div>
        </div>

        <v-modal v-if="$root.isModalOpen">
            <h2 slot="header">Lorem ipsum dolor sit amet</h2>

            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </v-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                //
            };
        },

        props: {
            //
        },

        mounted() {
            //
        },

        watch: {
            //
        },

        methods: {
            //
        }
    };
</script>
