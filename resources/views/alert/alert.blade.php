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

        // Temporary Solution for not show alert agein when user clicjk back button
        setTimeout(() => {
            location.reload();
        }, 1600);
    </script>
    {{ Session()->pull('success') }}
@elseif (session()->has('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session()->get('error') }}',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        })
        // setTimeout(() => {
        //     location.reload();
        // }, 1600);
    </script>
@endif
