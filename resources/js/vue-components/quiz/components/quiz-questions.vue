<template>
<div class="row">
<div class="col-xl-10"><h2 class="text-center">{{currentQuestion.text}}</h2></div>
       <template v-for="answer in currentQuestion.answers">
        <div class="col-xl-5">      <button @click="selectAnswer(answer)"
                    class="btn btn-primary block m-1"
                    :class="getAnswerButtonClass(answer)">
                {{answer.text}}
 </button>
        </div>
        </template>
    <div class="col-xl-10"><h3 class="text-center">Pavisam {{currentQuiz.questionCount}} jautājums/i</h3>
</div>



    <div class="col-xl-5 m-1">
    <button class="btn btn-primary block"
                    @click="getNextQuestion"
            :disabled="isButtonDisabled">
                Nākošais jautājums

            </button>
    </div>
</div>
</template>


<script>
    import axios from 'axios';
    import {Answer, Question, Result, Quiz} from "../models/quiz.models";
    import Vuex from 'vuex';

    export default {
        props: {
            /** @type {Question} */
            currentQuestion: {
                required: true,
            },
            currentQuiz:{
                required: true,
            }


        },
        data() {
            return {
                /** @type {?Answer} */
                selectedAnswer: null,
                loading: false,
            }
        },
        methods: {
            selectAnswer(answer) {
                this.selectedAnswer = answer;
            },
            getAnswerButtonClass(answer){
                return {

                    'btn-light': answer !== this.selectedAnswer,
                    'btn-success': answer === this.selectedAnswer,
                }
            },

            getNextQuestion(){
                if(this.isButtonDisabled){
                    return;
                }
                let data = new FormData;
                data.append('answerId', this.selectedAnswer.id);
                this.loading =true;
                axios.post('/quiz/next-question', data)
                    .then((response) =>{
                        /**
                         *
                         * @type {T}
                         */
                        if(response.data.error){
                            window.alert(response.data.error);
                            return;
                        }
                        if(response.data.resultData){
                            this.onResultsReceived(response.data.resultData);
                            return;

                        }
                        let data = response.data;
                        this.selectedAnswer = null;
                        let nextQuestion = Question.fromArray(data.questionData);
                        this.currentQuestion.id = nextQuestion.id;
                        this.currentQuestion.text = nextQuestion.text;
                        this.currentQuestion.answers = nextQuestion.answers;

            })
                    .finally(()=>{
                    this.loading =false
                })

            },
            onResultsReceived(resultData){

                let result = Result.fromArray(resultData);
                this.$emit('results-received', result);
            }
        },
        computed:{
            isButtonDisabled(){
                return !this.selectedAnswer || this.loading;
            }
        }
    }
</script>

