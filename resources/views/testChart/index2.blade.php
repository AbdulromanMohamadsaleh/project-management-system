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
    <script src="{{ asset('js/script2.js') }}" type="module" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet" />
</head>


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

            <div role="gantt-chart"></div>

        </div>
    </div>
</body>
<script>

</script>

</html>
