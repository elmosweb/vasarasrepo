class Quiz{
    constructor(){
        /**
         *
         * @type {?int}
         */
        this.id = null;
        /**
         *
         * @type {string}
         */
        this.title = '';
        /**
         * @type {Number}
         */
        this.questionCount = 0;
    }
    static fromArray (rawData){
        let quiz = new Quiz();
        /**
         * raw data bus no backenda
         */
        quiz.id = rawData.id;
        quiz.title = rawData.title;
        quiz.questionCount = rawData.questionCount;
        return quiz;
    }
}

class Question{
    constructor(){
        /**
         *
         * @type {?int}
         */
        this.id = null;
        this.text = '';
        /**
         *
         * @type {Array}
         */
        this.answers = [];
        this.questionCount = 0;
    }
    static fromArray (rawData){
        let question = new Question();
        /**
         * raw data bus no backenda
         */
        question.id = rawData.id;
        question.text = rawData.text;
        question.questionCount = rawData.questionCount;
        question.answers = rawData.answers.map((answerDatum)=>{
            return Answer.fromArray(answerDatum);
        });
        return question;

    }
}

class Answer{
    constructor(){
        /**
         *
         * @type {?int}
         */
        this.id = null;
        this.text = '';
        this.is_correct = '';
        /**
         *
         * @type {Array<Answer>>}
         */
    }
    static fromArray (rawData){
        let answer = new Answer();
        /**
         * raw data bus no backenda
         */
        answer.id = rawData.id;
        answer.text = rawData.text;
        answer.is_correct =rawData.is_correct;
        return answer;
    }
}
class Result{
    constructor(){
        /**
         *
         * @type {}
         */
        this.answers = [];
        this.correctAnswerCount = 0;
        this.is_correct = 0;
    }
    static fromArray (rawData){
        let result = new Result();
        /**
         * raw data bus no backenda
         */
        result.correctAnswerCount = rawData.correctAnswerCount;
        return result;

    }
}
class View{
    constructor(){
        /**
         *
         * @type {?int}
         */
        this.correctAnswerCount = 0;
    }
    static fromArray (rawData){
        let result = new Result();
        /**
         * raw data bus no backenda
         */
        result.correctAnswerCount = rawData.correctAnswerCount;
        return result;
    }
}





export {Quiz, Question, Answer, Result}

