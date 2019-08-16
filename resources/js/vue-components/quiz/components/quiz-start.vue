<template>
<div class="row">
    <div class="col-xl-10">
        <h1 class="text-center mt-3">Sveiks, {{name}} !</h1>
        <select class="form-control" v-model="selectQuizId">
            <option value="">Izvēlies aptauju!</option>
            <option :value= "quiz.id" v-for="quiz in quizzes">
                {{quiz.title}}
            </option>
        </select>
        <button @click="startQuiz" :disabled="!canStartQuiz" class="mt-3 btn btn-warning text-white block">Sākt</button>
    </div>
</div>
</template>

<script>
    import axios from 'axios';
    import {Question} from "../models/quiz.models.js";

    export default {
        props:{
            name:{
                required: true,
            },
            quizzes: {
                default: [],
                required : true,
            },
        },
        data(){
            return{
                selectQuizId: '',
                loading: false,
                error: '',
            }
        },
        methods:{
            startQuiz(){
                if(!this.canStartQuiz){
                    return;
                }
                let data = new FormData;
                data.append('quizId', this.selectQuizId);
                this.loading = true;
                axios.post('/quiz/start', data)
                    .then((response) =>{
                        if(response.data.error){
                            window.alert(response.data.error);
                            return;
                        }
                        let question = Question.fromArray(response.data.questionData);
                        this.$emit('quiz-started', {
                            'quizId':this.selectQuizId,
                            'firstQuestion': question,
                        })


                })

                    .finally(() =>{
                    this.loading = false;
                });


            }
        },
        computed:{
            canStartQuiz(){
                return !!this.selectQuizId && !this.loading;
            }
        }
    }
</script>

