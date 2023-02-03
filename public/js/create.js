var TotalDaysToComplateProject = 0;

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("step");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";

    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {

    // This function will figure out which tab to display
    var x = document.getElementsByClassName("step");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";

    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;

    if (currentTab == x.length){
        x[currentTab-1].style.display="block"
    }

    // if you have reached the end of the form...
    if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("signUpForm").submit();
    x[currentTab].style.display="block"
    return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {

    var x, y, i, valid = true;
    x = document.getElementsByClassName("step");
    y = x[currentTab].getElementsByTagName("input");
    let textLenght = true;
    // This function deals with validation of the form fields
    let ProjectNameInput = document.getElementById("projectName").value.trim()

    if(ProjectNameInput.length < 255 && ProjectNameInput.length > 1 )
        CheckIsProjectNameExist();

    // Check if user pass the total duration of the project when enter task duration
    let validateTotalDurationTask= true;
    if(currentTab >= x.length-1){
        validateTotalDurationTask = ValidateProjectDuration();
    }


    // A loop that checks every input field in the current tab:

    for (i = 0; i < y.length; i++) {



            // If a field is empty... taskDuration

            if ( y[i].value.length > 255 || ((y[i].value == "" || (y[i].value.length<=1 && y[i].type != "number" && y[i].name != "taskCounter[]" ) )  && y[i].name != "taskDuration[]")|| ((IsDate1AfterDate2() && y[i].type=="date"))) {
                // add an "invalid" class to the field:
                if(!y[i].classList.contains('is-invalid')){

                    y[i].className += " invalid is-invalid";
                }
                // and set the current valid status to false
                console.log(y[i].value);
                valid = false;
            }else{

                y[i].classList.remove("invalid")
                y[i].classList.remove("is-invalid")
            }



        }

    selectinput = x[currentTab].getElementsByTagName("select");


    for (i = 0; i < selectinput.length; i++) {
        // If a field is empty...
        if (selectinput[i].value == "") {
            // add an "invalid" class to the field:
            selectinput[i].style.borderColor = "#ffaba5";
            selectinput[i].classList.add("is-invalid")
            // and set the current valid status to false
            valid = false;
        }else{
            selectinput[i].classList.remove("is-invalid")
           selectinput[i].style.borderColor = "#e3e3e3";
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    // console.log(IsProjectNameValid,valid,validateTotalDurationTask)
    valid = IsProjectNameValid && valid && validateTotalDurationTask && textLenght;

    // This is for make the duration task red if its in valid
    let taskDurationUserInput = document.querySelectorAll('[id = "taskDuration"]');
    if(!validateTotalDurationTask){
        taskDurationUserInput.forEach((inp)=>{
            inp.className += " invalid is-invalid";
        })
    }else{
        taskDurationUserInput.forEach((inp)=>{
        if(inp.classList.contains('is-invalid')){
            inp.classList.remove("invalid");
            inp.classList.remove("is-invalid");
            }
        })
    }



    if (valid) {
    document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
    }
    console.log(valid)
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("stepIndicator");
    for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
    // x[i].className = x[i].className.replace(" finish", "");

    }
    //... and adds the "active" class on the current step:
    // x[n].className += " active finish ";
        x[n].className += " active  ";

}





// const radioButtons = document.querySelectorAll('input[name="projectDuration"]');
const showDurationField = document.querySelector('#show-duration');
const StartDateProject = document.getElementById("projectStart");
const EndDateProject = document.getElementById("projectEnd");
const totalDate = document.querySelector('input[name="totalDate"]');


function getProjectDuration(){
    differenceDays = daysDifference();

    if(!differenceDays){
        showDurationField.innerHTML="<p class='pt-2 text-danger'>Please Select Start and End Date</p>"
        setTimeout(function(){
            showDurationField.innerHTML=""

        }, 2000);

        return;
    }

    if (this.checked) {

        selected = this.id;
        let duration="";
        if(selected=='week'){
            duration = Math.floor(differenceDays/7) + ' week';
        }
        else if(selected=='day'){
            duration = differenceDays + ' Day';
        }
        else if(selected=='month'){
            duration = Math.floor(differenceDays/30) + ' Month';
        }
        // showDurationField.innerHTML=""
        // showDurationField.innerHTML=duration;
        totalDate.value = duration;
    }
}

function daysDifference() {
    var dateI1 = document.getElementById("projectStart").value;
    var dateI2 = document.getElementById("projectEnd").value;
    //define two variables and fetch the input from HTML form

    //define two date object variables to store the date values
    var date1 = new Date(dateI1);
    var date2 = new Date(dateI2);

    //calculate time difference
    var time_difference = date2.getTime() - date1.getTime();

    //calculate days difference by dividing total milliseconds in a day
    var result = time_difference / (1000 * 60 * 60 * 24);

    return result;
}

function IsDate1AfterDate2() {
    var dateI1 = document.getElementById("projectStart").value;
    var dateI2 = document.getElementById("projectEnd").value;
    //define two variables and fetch the input from HTML form

    //define two date object variables to store the date values
    var date1 = new Date(dateI1);
    var date2 = new Date(dateI2);

    //calculate time difference
    return date1.getTime() > date2.getTime();
}





// Validate Project Name
let projectNameY = document.getElementById('projectName');
let feedbackProjectName = document.getElementById('feedbackProjectName');
let IsProjectNameValid = true;

projectNameY.addEventListener('input', CheckIsProjectNameExist);

function CheckIsProjectNameExist(e) {

    let pp = document.getElementById("projectName").value.trim()

    if (!pp) {
        return;
    }

    let urll = `http://127.0.0.1:8000/check-project-name/${pp}`
    // (B) INIT FETCH POST


    fetch(urll)
        .then(response => response.json())
        .then(data => {
            if (data.status == 0) {
                feedbackProjectName.classList.add('invv')
                projectNameY.classList.add('is-invalid')
                feedbackProjectName.innerHTML = data.msg
                IsProjectNameValid = false;

            } else {
                feedbackProjectName.classList.remove('invv')
                projectNameY.classList.remove('is-invalid')
                feedbackProjectName.innerHTML = ""
                // feedbackProjectName.style.color="green"
                IsProjectNameValid = true;
            }
        })
        .catch((error) => {
            console.log(error);
        });

}


function ValidateProjectDuration(){



    let taskDurationUserInput = document.querySelectorAll('[id = "taskDuration"]');

    let totalDurationUserInput = 0;

    taskDurationUserInput.forEach(d=>{
        if(d.value==""){
            totalDurationUserInput = parseInt(totalDurationUserInput);
        }else{
            totalDurationUserInput = parseInt(totalDurationUserInput) + parseInt(d.value);
        }
    })

    // console.log(TotalDaysToComplateProject);
    let errorMessage = ` <i class="bi bi-exclamation-triangle-fill me-3"></i>
                                <div class="text-center">
                                    The number of project days entered <b>${totalDurationUserInput}</b> are exceeded the set days <b>${TotalDaysToComplateProject}</b><br>you need to derease <b>${totalDurationUserInput-TotalDaysToComplateProject}</b> day.
                                </div>`;

    let errorContainer = document.getElementById("alert");

    if(TotalDaysToComplateProject < totalDurationUserInput){
        if(errorContainer.classList.contains('d-none')){
            errorContainer.classList.remove('d-none')
        }
        errorContainer.innerHTML=errorMessage;
        return false;
    }else{
        if(!errorContainer.classList.contains('d-none')){
            errorContainer.classList.add('d-none')
        }
    }



    return true;
}

