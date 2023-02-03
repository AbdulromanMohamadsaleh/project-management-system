@if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session()->get('success') }}',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        })
    </script>
@elseif (session()->has('error'))
    <script>
        console.log("ff")
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session()->get('error') }}',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        })
    </script>
@endif
