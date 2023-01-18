@include('include.header')

<body>
    {{-- <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        @include('include.navbar')

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Category</h6>

                      </div>
                    {{-- <a href="{{route('createcategory')}}"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="add category"><i class="fa fa-plus" aria-hidden="true"></i></button></a> --}}
                </div>
                <div class="table-responsive">
                 @include("category.include.table_category")
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->



</body>


@include('include.scrip');
<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel", "Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $('.btn-sm2').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Edit ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })

</script>
<style>
 * {
            box-sizing: border-box;
        }

        button {
            display: block;
            margin: 8px;
            padding: 5px 10px;
            border: 0em;
            border-radius: 3px;
        }

        button.s {
            background: #01B940;
            color: white;
        }

        button.w {
            background: #ffc400;
            color: #836400;
        }

        button.d {
            background: #F91E00;
            color: white;
        }

        button.cstm1 {
            background: #4f70ff;
            color: white;
        }

        button.cstm2 {
            background: #ff66b3;
            color: white;
        }

        button.cstm3 {
            background: linear-gradient(60deg, #3866ff, #38c0ff);
            color: white;
        }

        button.cstm4 {
            background: linear-gradient(60deg, #ff2c2c, #ff9564);
            color: white;
        }

        button.cstm5 {
            background: linear-gradient(60deg, #00ad34, #0ee4c7);
            color: white;
        }

        #Noti_container {
            width: 200px;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 9999999999999999999999999999999999999999;
            margin: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            font-weight: 500;
        }

        #Noti_container ion-icon {
            font-size: large;
        }

        .Noti_success {
            padding: 10px 10px;
            background: #01B940;
            color: white;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;

        }

        .Noti_warning {
            padding: 10px 10px;
            background: #ffc400;
            color: #836400;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;
        }

        .Noti_danger {
            padding: 10px 10px;
            background: #F91E00;
            color: #ffffff;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;
        }

        @keyframes Noti_animation {
            0% {
                transform: scale(0.5);
            }

            50% {
                transform: scale(1.07);
            }

            100% {
                transform: scale(1);
            }
        }

        @-webkit-keyframes Noti_animation {
            0% {
                transform: scale(0.5);
            }

            50% {
                transform: scale(1.07);
            }

            100% {
                transform: scale(1);
            }
        }

        .timer_progress {
            height: 2px;
            background-color: rgba(255, 245, 245, 0.7);
            position: absolute;
            margin-top: -8px;
        }

        @keyframes timer_progress_animation {
            from {
                width: 100%;
            }

            to {
                width: 0%;
                transform: rotate(0deg);
            }
        }

        @-webkit-keyframes timer_progress_animation {
            from {
                width: 100%;
            }

            to {
                width: 0%;
                transform: rotate(0deg);
            }
        }
</style>
<script>
function Noti({ content, status, animation = true, timer = 4000, progress = true, bgcolor, icon = 'save' }) {
            if (timer > 10000) {
                timer = 4000;
            }
            var status = status;
            var Noti_container = document.createElement('div');
            var Noti_alert = document.createElement('div');
            var timer_progress = document.createElement('div');
            Noti_container.setAttribute('id', 'Noti_container');
            document.body.appendChild(Noti_container);
            document.getElementById('Noti_container').appendChild(Noti_alert);
            timer_progress.setAttribute('class', 'timer_progress');
            if (progress != false) {
                document.querySelector('#Noti_container').appendChild(timer_progress);
            }
            if (animation == true) {
                Noti_alert.style = `
                -webkit-animation: 1s Noti_animation;
            animation: 1s Noti_animation;
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            background: ${bgcolor}
            `;
            } else {
                Noti_alert.style = `
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            background: ${bgcolor}
            `;
            }
            Noti_alert.addEventListener('click', function () {
                this.remove();
                timer_progress.remove();
            });
            const noti_destroy = function () {
                document.getElementById('Noti_container').removeChild(Noti_alert);
                timer_progress.remove();
            }
            var timeout = setTimeout(() => {
                noti_destroy();
            }, timer);
            Noti_alert.onmouseover = function () {
                clearTimeout(timeout);
                timer_progress.style.animationPlayState = 'paused';
                this.onmouseleave = function () {
                    setTimeout(noti_destroy, timer);
                    timer_progress.style.animationPlayState = 'running';
                }
            };
            switch (status) {
                case 'success':
                    Noti_alert.setAttribute('class', 'Noti_success');
                    icon == 'save' || icon == '' ?
                        Noti_alert.innerHTML = "<ion-icon name='checkmark-circle'></ion-icon>" + "<span>" + content + "</span>"
                        :
                        Noti_alert.innerHTML = content;
                    break;
            }
            var new_timer_mode = '';
            switch (timer) {
                case 1000:
                    new_timer_mode = '1s';
                    break;
                case 2000:
                    new_timer_mode = '2s';
                    break;
                case 3000:
                    new_timer_mode = '3s';
                    break;
                case 4000:
                    new_timer_mode = '4s';
                    break;
                case 5000:
                    new_timer_mode = '5s';
                    break;
                case 6000:
                    new_timer_mode = '6s';
                    break;
                case 7000:
                    new_timer_mode = '7s';
                    break;
                case 8000:
                    new_timer_mode = '8s';
                    break;
                case 9000:
                    new_timer_mode = '9s';
                    break;
                case 10000:
                    new_timer_mode = '10s';
                    break;
                default:
                    new_timer_mode = '4s';
            }
            timer_progress.style.animation = `${new_timer_mode} timer_progress_animation`;
            timer_progress.style.webkitAnimation = `${new_timer_mode} timer_progress_animation`;
        }
        function success() {
            Noti({
                status: 'success',
                content: 'Success message',
                timer: 5000,
                animation: true,
                progress: true,
            });
        }
      // custom background
        function custombg1() {
            Noti({
                status: 'success',
                content: 'Success message',
                timer: 4000,
                animation: true,
                progress: true,
                bgcolor: '#4f70ff',
                icon: 'save'
            });
        }


        function custombg5() {
            Noti({
                status: 'success',
                content: 'Success message',
                timer: 4000,
                animation: true,
                progress: true,
                bgcolor: 'linear-gradient(60deg,#00ad34,#0ee4c7)',
                icon: 'save'
            });
        }


            Noti({
                status: 'success',
                content: 'Success message without animation',
                timer: 10000,
                animation: false,
                progress: true
            });

</script>

</html>
