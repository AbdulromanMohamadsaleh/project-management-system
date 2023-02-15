<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
        const tasks = @php echo $tasks @endphp;
        const project = @php echo $project @endphp
    </script>
    <script src="{{ asset('js/gantt_chart_script.js') }}" type="module" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>

</head>

{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script> --}}

<script>
    function createPDFDay() {

        // var element = document.getElementById('print-day');
        // html2pdf(element, {
        //     margin: 4,
        //     padding: 5,
        //     filename: 'DayTimeLine.pdf',
        //     image: {
        //         type: 'jpeg',
        //         quality: 1
        //     },
        //     html2canvas: {
        //         scale: 2,

        //         // dpi: 300,
        //         letterRendering: true,
        //         width: 2000,
        //         height: 2000,
        //         logging: true
        //     },
        //     jsPDF: {
        //         unit: 'mm',
        //         format: 'A4',
        //         orientation: 'L',
        //         compress: true,

        //     },
        //     class: createPDFDay
        // });
    };

    function createPDFWeek() {

        var element = document.getElementById('print-week');
        // const invoice = this.document.getElementById(div == null ? "generalDiv" : div);
        console.log($(window).width() + "px");
        // element.style.width = $(window).width() + "px";
        // var contentWidth = document.getElementById("YourImageOrContent").offsetWidth;
        // var contentHeight = document.getElementById("YourImageOrContent").offsetHeight;
        // window.resizeTo(contentWidth, contentHeight);
        let widthChart = document.querySelector('.for-week .gantt-grid-container-width');
        widthChart.style.overflowX = "visible"
        // console.log($('.for-week .gantt-grid-container-width').width() + "px")

        let widthToPrint = $('.for-week .gantt-grid-container-width').width();

        var opt = {
            margin: 1,
            filename: 'weekTime' + '.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1,
                width: widthToPrint
            },
            jsPDF: {
                unit: 'in',
                format: 'A4',
                orientation: 'L'
            }
        };
        html2pdf().from(element).set(opt).save();

//  widthChart.style.overflowX = "auto"
        // html2pdf(element, {
        //     margin: 4,
        //     padding: 5,
        //     filename: 'weekTimeLine.pdf',
        //     image: {
        //         type: 'jpeg',
        //         quality: 1
        //     },
        //     html2canvas: {
        //         scale: 2,

        //         dpi: 300,
        //         // letterRendering: true,
        //         // width: 2000,
        //         // height: 2000,
        //         logging: true
        //     },
        //     jsPDF: {
        //         unit: 'in',
        //         format: 'A4',
        //         orientation: 'L',
        //         // compress: true,

        //     },
        //     class: createPDFWeek
        // });
    };
</script>
<style>
    .gantt-time-period {
        border: 0.01px solid #e9eaeb;
        box-sizing: border-box;
    }

    .gantt-time-period-cell {
        border-right: 0.01px solid #e9eaeb;
    }

    .gantt-task-row {
        border: 0.01px solid #e9eaeb;
        box-sizing: border-box;
    }

    .gantt-time-period-month {

        border: 0.01px solid #e9eaeb;
        box-sizing: border-box;
    }
</style>

<body>
    @include('include.header')
    <script></script>


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('include.navbar')<br>


        <div class="p-5 ">
            <!-- Recent Sales Start -->
            <div class="title">
                <h1> Gantt Tracker</h1>
            </div>
            {{-- <div class="ms-3 ">
                <input type="radio" class="btn-check" name="options" id="ChartType" autocomplete="off" value="Day">
                <label class="btn btn-secondary" for="option1">Day</label>

                <input type="radio" class="btn-check" name="options" id="ChartType" autocomplete="off" checked
                    value="Week">
                <label class="btn btn-secondary" for="option2">Week</label>

                <input type="radio" class="btn-check" name="options" id="ChartType" autocomplete="off" value="Month">
                <label class="btn btn-secondary" for="option3">Month</label>

            </div> --}}



            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Day"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Day</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Week" type="button"
                        role="tab" aria-controls="Week" aria-selected="false">Week</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane"
                        aria-selected="false">Month</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Day" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div id="print-day">
                        Day
                        <div class="for-day" role="gantt-chart-day">
                        </div>
                    </div>
                    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDFDay()">html to PDF
                    </button>
                </div>
                <div class="tab-pane fade" id="Week" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div id="print-week">
                        <div class="test-color">
                            Week
                        </div>
                        <div class="for-week" role="gantt-chart-week">
                        </div>
                    </div>
                    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDFWeek()">html to PDF
                    </button>

                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                        tabindex="0">
                        Month
                        <div class="for-month" role="gantt-chart-month">
                        </div>
                    </div>
                </div>


            </div>
        </div>
</body>
<script></script>
@include('include.scrip')
<script></script>

</html>
