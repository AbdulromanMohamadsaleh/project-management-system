<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
        var project = @php echo $project @endphp;
        let tasks = @php echo $tasks @endphp;
    </script>
    <script src="{{ asset('js/gantt_chart_scriptv2.js') }}" type="module" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet" />

    {{-- html2pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>

</head>


<script>
    function createPDFDay() {
        var element = document.getElementById('print-day');

        let widthChart = document.querySelector('.for-day .gantt-grid-container-width');
        widthChart.style.overflowX = "visible"

        let widthToPrint = $('.for-day .gantt-grid-container-width').width() + 300;
        let heightToPrint = $('#print-day').height() + 300;

        if (widthToPrint <= 1950) {
            var opt = {
                margin: 1,
                filename: 'DayTimeline' + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 3
                },
                html2canvas: {
                    scale: 2,
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A3',
                    orientation: 'L'
                }
            };
        } else {
            var opt = {
                margin: 1,
                filename: 'DayTimeline' + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 3
                },
                html2canvas: {
                    scale: 2,
                    width: widthToPrint,
                    height: heightToPrint,
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A3',
                    orientation: 'L'
                }
            };
        }

        html2pdf().from(element).set(opt).save();

        setTimeout(function() {
            widthChart.style.overflowX = "auto";

        }, 5000)



    };

    function createPDFWeek() {

        var element = document.getElementById('print-week');

        let widthChart = document.querySelector('.for-week .gantt-grid-container-width');
        widthChart.style.overflowX = "visible";

        let widthToPrint = $('.for-week .gantt-grid-container-width').width() + 300;
        let heightToPrint = $('#print-week').height() + 300;

        var opt = {
            margin: 1,
            filename: 'weekTimeline' + '.pdf',
            image: {
                type: 'jpeg',
                quality: 4,
            },
            html2canvas: {
                scale: 3,
                width: widthToPrint,
                height: heightToPrint,
            },
            jsPDF: {
                unit: 'in',
                format: 'A3',
                orientation: 'P',
            }
        };


        html2pdf().from(element).set(opt).save();

        setTimeout(function() {
            widthChart.style.overflowX = "auto"

        }, 5000)

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


        <div class="px-5 ">
            <!-- Recent Sales Start -->
            <div class="title">
                <h1 id="chartTitle"> </h1>

            </div>

            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Day"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Day</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Week" type="button"
                        role="tab" aria-controls="Week" aria-selected="false">Week</button>
                </li>

            </ul>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="Day" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">

                    <div id="print-day">
                        <div class="for-day" role="gantt-chart-day">
                        </div>
                    </div>
                    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDFDay()">Export to PDF
                    </button>
                </div>
                <div class="tab-pane fade " id="Week" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="test-color">
                    </div>
                    <div id="print-week">
                        <div class="for-week" role="gantt-chart-week">
                        </div>
                    </div>
                    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDFWeek()">Export to PDF
                    </button>

                </div>


            </div>
        </div>

        <br>
</body>
@include('include.scrip')
<script src="{{ asset('js/app.js') }}"></script>

</html>
