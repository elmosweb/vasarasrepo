<template>
    <div class="row">
        <h1>Testu pildīšanas statistika:</h1>
        <template v-for="attempt in attempts">
            <div class="col-xl-10 bg-primary p-2 m-2">
                {{attempt.user_id}} Lietotājs ir pildijis testu nr.{{attempt.quiz_id}}
            </div>

        </template>
    </div>
</template>


<script>
    import {Attempts} from "../models/view.models";


    export default {
        props: {
            attempts: {
                default: [],
                required : true,
            },


        },

    }
</script>

