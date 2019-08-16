<template>
    <div class="row">
        <div class="col-xl-12 block"><h2 class="text-success">Tu atbildēji pareizi uz {{result.correctAnswerCount}} no {{currentQuiz.questionCount}} jautājumiem!</h2></div>
    <div class="col-xl-12 block"><button class="btn btn-primary" @click="endQuiz">Uz sākumu</button></div>


    </div>
</template>



<script>
    import {Attempts} from "../models/quiz.models";
    export default {
        props: {
            /**
             * @type {Quiz}
             */
            currentQuiz:{
              required: true,
            },
            /**
             * @type {Result}
             */
            result:{
                required: true,
            },
        },
        data(){
            return{
                loading: false,
                error: '',
            }
        },
        methods: {
            endQuiz(){
                this.$emit('quiz-finished');
            },
        }
    }
</script>

