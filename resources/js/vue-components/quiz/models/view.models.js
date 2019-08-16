class Attempts{
    constructor(){
        /**
         *
         * @type {?int}
         */
        this.quiz_id = null;
        this.user_id = null;
        /**
         *
         * @type {Array<Attempts>}
         */
    }
    static fromArray (rawData){
        let attempts = new Attempts();
        /**
         * raw data bus no backenda
         */
        attempts.quiz_id = rawData.quiz_id;
        attempts.user_id = rawData.user_id;
        return attempts;
    }
}
export {Attempts}