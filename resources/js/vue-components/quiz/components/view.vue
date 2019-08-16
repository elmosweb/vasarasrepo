<template>
    <div>
        <template v-for="attempt in attempts">
            <div class="col-xl-5">
                {{attempt.user_id}}
            </div>
        </template>
    </div>
</template>

<script>
    import {Attempts} from './../models/view.models';
    export default {
        name: "view.vue"
    }
</script>

<style scoped>

</style>