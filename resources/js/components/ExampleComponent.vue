<style>
    .quiz-question-pills li {
        background-color: black;
        color: white;
        margin: 10px;
        padding: 5px 15px 5px 35px;
        border-radius: 20px;
    }
    .quiz-question-pills li i {
        margin-left: 40px;
    }

    .quiz-question-pills li a {
        color: white;
    }
    .container-quiz-question-pills ul {
        margin-left: 35%;
    }
</style>



<template>


    <div>

        <div  v-for="(question,index) in questions">
            <div class="container quiz-steps" v-if="index === currentIndex && timer>0">
                <div>
                    <span class="badge badge-danger">{{ minutes }}</span>
                    <span class="badge badge-danger">{{ seconds }}</span>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" :style="{width: returnTimerWidth()}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <div class="container-quiz-question-pills">
                    <ul class="nav nav-pills quiz-question-pills">
                        <li><a href="#"> {{ wrong }}</a><i class="icon-remove"></i></li>
                        <li><a href="#"> {{ right }} </a><i class="icon-ok"></i></li>
                    </ul>
                </div>
                <div class="question-content">
                    <p>{{ question.question }}</p>
                    <!-- Material unchecked -->
                    <div class="form-check">
                        <input type="radio" v-model="picked" checked class="form-check-input" value="1" id="materialUnchecked" name="materialExampleRadios">
                        <label class="form-check-label" for="materialUnchecked">{{ question.option1 }}</label>
                    </div>

                    <!-- Material checked -->
                    <div class="form-check">
                        <input type="radio" v-model="picked" checked class="form-check-input" value="2" id="materialChecked" name="materialExampleRadios">
                        <label class="form-check-label" for="materialChecked">{{ question.option2 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" v-model="picked" checked class="form-check-input" value="3" id="materialChecked" name="materialExampleRadios">
                        <label class="form-check-label" for="materialChecked">{{ question.option3 }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" v-model="picked" checked class="form-check-input" value="3" id="materialChecked" name="materialExampleRadios">
                        <label class="form-check-label" for="materialChecked">{{ question.option4 }}</label>
                    </div>

                </div>
                <br><br><br><br>
                <div>
                    <span> {{index+1}} / {{questions.length}} </span>
                    <button type="button" class="btn btn-outline-danger float-right btn-next" @click="nextQuestion(question.isCorrect)">Next</button>
                </div>
                <br>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" :style="{width: returnWidth(index)}" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>

                </div>
            </div>



        </div>


        <div class="container thankyou-quiz-page" v-if="currentIndex === questions.length || timer==0">
            <div class="text-center">
                <p>Thnakyou for taking the Quiz!</p>
                <br>
                <div class="thankyou-msg">
                    <p>You have answered <span>{{ right }}</span> correct answers out of <span>{{ questions.length }}</span>. Your total time was <span>{{ minutesTaken }}:{{ secondsTaken }}</span>. The answers were sent to the administrator and he will contact you shortly.</p>
                    <p>Your total marks are: {{calculateScore()}}</p>
                </div>
                <br><br>
                <div class="text-center quiz-choice">
                    <a href="#" class="text-dark">Retake the Quiz</a><br>
                    <a href="#" class="text-dark">Next Quiz</a>
                </div>
            </div>
            <br><br>
            <div class="thankyou-message-button">
                <a href=""><button type="button" class="btn ">Retake the Quiz</button> </a>
                <a href=""><button type="button" class="btn float-right ">Next Quiz</button> </a>
            </div>
        </div>

    </div>

</template>


<script>
    export default {
        name : 'TEST',
        props : [
            'quizid1',
        ],
        data(){
            // debugger
            return{
                currentIndex:0,
                picked:'',
                right:0,
                wrong:0,
                questions:[],
                timer:0,
                total:0,
                minutes:0,
                seconds:0,
                minutesTaken:0,
                secondsTaken:0,
                remainingTime:0,
                done:false,
                interval: '',
                negative: 0,
                totalMarks: 0,
                quizId: 0
            }
        },
        methods:{
            nextQuestion:function(e){
                if(this.picked){

                    if(e==this.picked){
                        this.right++;
                    }
                    else{
                        this.wrong++;
                    }

                }

                this.currentIndex++;

                if(this.currentIndex == this.questions.length){
                    this.timer = 0;
                    this.storeMarks();
                }
                this.picked = '';


            },
            returnWidth(e){
                if( e==0 ){
                    return 0+'%';
                }
                else {
                    return e / this.questions.length * 100+'%';

                }




            },
            returnTimerWidth(){
                if( this.remainingTime == 0 )
                {
                    return 0+'%';
                }
                else{
                    return this.remainingTime / this.total * 100 + '%';

                }

            },
            loadQuestions(){
                axios.get("/api/quiz/"+this.quizid1).
                then( ({ data }) => (
                        this.questions = data.data.questions,
                        this.timer = data.data.time * 60,
                        this.quizId = data.data.id,
                        this.total = this.timer,
                        this.getTime(this)


                ) )
            },
            getTime(){


                let interval = setInterval( () => {
                    this.minutes = parseInt(this.timer / 60, 10);
                    this.seconds = parseInt(this.timer % 60, 10);
                    this.minutes = this.minutes < 10 ? "0" + this.minutes : this.minutes;
                    this.seconds = this.seconds < 10 ? "0" + this.seconds : this.seconds;

                    if (--this.timer <0 ) {
                        // this.timer = 0;
                        this.totalTime();
                        clearInterval(interval);
                    }
                    else{
                        this.remainingTime++;
                        this.returnTimerWidth();
                    }
                }, 1000);
            },
            totalTime(){

                this.minutesTaken = parseInt(this.remainingTime / 60, 10);
                this.secondsTaken = parseInt(this.remainingTime % 60, 10);
                this.minutesTaken = this.minutesTaken < 10 ? "0" + this.minutesTaken : this.minutesTaken;
                this.secondsTaken = this.secondsTaken < 10 ? "0" + this.secondsTaken : this.secondsTaken;

            },
            calculateScore(){

                this.totalMarks = this.right - ( this.wrong * this.negative );
                return this.totalMarks;
            },
            storeMarks(){
                    axios.post('/saveMarks', {
                        marks: this.calculateScore(),
                        //marks: 10,
                        quiz_id: this.quizId
                    })
                        .then(function (response) {
                            console.log(response);
                        })
                        .catch(function () {
                            // console.log(error);
                        });
                }


        },
        created() {
            this.loadQuestions();

        }

    }
</script>

