
let IncludeWeekend = "no";



var HolyDays = JSON.parse(document.querySelector("#HolyDays").value);

HolyDaysDate = HolyDays.map(h => h.HOLYDAY_DATE);

const radios = document.querySelectorAll('input[name="projectDurationFormat"]');
const projectStart = document.querySelector('input[name="projectStart"]');
const projectEnd = document.querySelector('input[name="projectEnd"]');
projectStart.valueAsDate = new Date();

const isIncludeHolyday = document.querySelectorAll('input[name="isIncludeHolyday"]');

isIncludeHolyday.forEach((e)=>{
    e.addEventListener(('click'),updateEndDateForRadios);
})


const isIncludeWeekend = document.querySelectorAll('input[name="isIncludeWeekend"]');

    isIncludeWeekend.forEach((e)=>{
        e.addEventListener(('click'),updateEndDateForRadiosIsIncludeWeekEnd);
    })

const DurationP = document.querySelector('#Duration');
DurationP.addEventListener('input', updateEndDate);

var projectDurationFormat = '';

for (var i = 0, max = radios.length; i < max; i++) {
    radios[i].onclick = function(e) {
        projectDurationFormat = this.value;
        if (DurationP.value != '') {
            updateEndDateGeneral(DurationP.value);
        }
    }
}

function updateEndDate(e) {
    amount = e.target.value;

    if (amount == '')
        amount = 0;

    if (projectDurationFormat == 'week') {

        projectEnd.valueAsDate = addWeeks(projectStart.value, parseInt(amount))

        isIncludeHolyday.forEach((e)=>{
            if(e.checked==true){
                if(e.value=="yes"){
                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }
            }
        })

    } else if (projectDurationFormat == 'month') {
        projectEnd.valueAsDate = addMonths(projectStart.value, parseInt(amount))

        isIncludeHolyday.forEach((e)=>{
            if(e.checked==true){
                if(e.value=="yes"){

                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }

            }
        })
    } else {
        projectEnd.valueAsDate = addDays(projectStart.value, parseInt(amount))

        isIncludeHolyday.forEach((e)=>{
            if(e.checked==true){
                if(e.value=="yes"){
                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }

            }
        })
    }
}

function updateEndDateForRadios(e) {
    amount = document.querySelector('#Duration').value;

    if (amount == '')
        amount = 0;

    if (projectDurationFormat == 'week') {

        projectEnd.valueAsDate = addWeeks(projectStart.value, parseInt(amount))

    if(e.target.value=="yes"){

            // console.log(convertToHtmlDateFormat(removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value)))
            projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
        }

    } else if (projectDurationFormat == 'month') {
        projectEnd.valueAsDate = addMonths(projectStart.value, parseInt(amount))
        if(e.target.value=="yes"){

            // console.log(convertToHtmlDateFormat(removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value)))
            projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
        }
    } else {
        projectEnd.valueAsDate = addDays(projectStart.value, parseInt(amount))
        if(e.target.value=="yes"){

            // console.log(convertToHtmlDateFormat(removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value)))
            projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
        }
    }
}



function updateEndDateGeneral(a) {
    amount = a
    if (amount == '')
        amount = 0;

    if (projectDurationFormat == 'week') {
        projectEnd.valueAsDate = addWeeks(projectStart.value, parseInt(amount))
        isIncludeHolyday.forEach((e)=>{

            if(e.checked==true){
                if(e.value=="yes"){

                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }

            }
        })
    } else if (projectDurationFormat == 'month') {
        projectEnd.valueAsDate = addMonths(projectStart.value, parseInt(amount))
        isIncludeHolyday.forEach((e)=>{

            if(e.checked==true){
                if(e.value=="yes"){

                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }

            }
        })
    } else {
        projectEnd.valueAsDate = addDays(projectStart.value, parseInt(amount))
        isIncludeHolyday.forEach((e)=>{

            if(e.checked==true){
                if(e.value=="yes"){

                    projectEnd.valueAsDate = removePublicHolyday(HolyDaysDate,projectStart.value,projectEnd.value);
            }

            }
        })
    }
}



function addDays(date, days) {
    TotalDaysToComplateProject = days;

    if (days > 10000 || days == 0 || days == "")
        return new Date();

    var result = new Date(date);
    result.setDate(result.getDate() + days);

    rWorkingDays = 0;
    // document.querySelector('input[name="isIncludeWeekend"]:checked').value;
    IncludeWeekend = document.querySelector("input[type='radio'][name=isIncludeWeekend]:checked").value;
    if(IncludeWeekend=="no"){
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != days) {
            result.setDate(result.getDate() + (days - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > days) {
                break;
            }
        }
    }

    return result;
}


function addMonths(date, month) {
    day = 30 * month;
    TotalDaysToComplateProject = day;
    if (day > 10000 || day == 0 || day == "")
        return new Date();

    let result = new Date(date);
    result.setDate(result.getDate() + day);

    IncludeWeekend = document.querySelector("input[type='radio'][name=isIncludeWeekend]:checked").value;
    if(IncludeWeekend=="no"){
        rWorkingDays = 0;
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != day) {
            result.setDate(result.getDate() + (day - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > day) {
                break;
            }
        }
    }
    return result;
}

function addWeeks(date, weeks) {
    day = 7 * weeks;
    TotalDaysToComplateProject = day;
    if (day > 10000 || day == 0 || day == "")
        return new Date();

    let result = new Date(date);
    result.setDate(result.getDate() + day);

    IncludeWeekend = document.querySelector("input[type='radio'][name=isIncludeWeekend]:checked").value;
    if(IncludeWeekend=="no"){
        rWorkingDays = 0;
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != day) {
            result.setDate(result.getDate() + (day - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > day) {
                break;
            }
        }
    }
    return result;
}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

function convertToHtmlDateFormat(result) {
    let months = result.getMonth() + 1;
    newDate = '';
    newDate += result.getFullYear() + '-';

    if (result.getMonth() < 10) {
        newDate += pad(months) + '-'

    } else {
        newDate += months + '-';
    }

    if (result.getDate() < 10) {
        newDate += pad(result.getDate())
    } else {
        newDate += result.getDate()
    }

    return newDate;
}

function workingDays(fromDate, toDate) {
    fromDate = new Date(fromDate);
    toDate = new Date(toDate);

    // ensure that the argument is a valid and past date
    if (!fromDate || isNaN(fromDate) || toDate < fromDate) {
        return -1;
    }

    // clone date to avoid messing up original date and time
    var frD = new Date(fromDate.getTime()),
        toD = new Date(toDate.getTime()),
        numOfWorkingDays = 1;

    // reset time portion
    frD.setHours(0, 0, 0, 0);
    toD.setHours(0, 0, 0, 0);

    while (frD < toD) {
        frD.setDate(frD.getDate() + 1);
        var day = frD.getDay();
        if (day != 0 && day != 6) {
            numOfWorkingDays++;
        }
    }
    return numOfWorkingDays - 1;
};


function isWeekEnd(date) {
    var dayOfWeek = date.getDay();
    return  (dayOfWeek === 6) || (dayOfWeek === 0); // 6 = Saturday, 0 = Sunday
}


function removePublicHolyday(HolyDaysDate,startDate,endDate){
    // chick if holy days include in the duration

    for(i=0;i<HolyDaysDate.length;i++){
        if(checkDateIsInclude(startDate,endDate,HolyDaysDate[i])){
            var endDate = new Date(endDate);
            endDate.setDate(endDate.getDate() + 1);

            while(isWeekEnd(endDate)){
                endDate.setDate(endDate.getDate() + 1);
            }
        }

    }

    return new Date(endDate)


}


function checkDateIsInclude(from,to,check) {

    var fDate,lDate,cDate;
    fDate = Date.parse(from);
    lDate = Date.parse(to);
    cDate = Date.parse(check);

    if((cDate <= lDate && cDate >= fDate)) {
        return true;
    }
    return false;
}


function updateEndDateForRadiosIsIncludeWeekEnd(e) {
    amount = document.querySelector('#Duration').value;

    updateEndDateGeneral(amount);
}
