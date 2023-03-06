<form style="display: inline-block" method="POST" action="{{ route('activeuser', $logins->LOGIN_ID) }}">
    @csrf
    <input name="_method" type="hidden" value="POST">
    <button type="submit" class="btn  btn-success  show-alert-active-box" data-toggle="tooltip" title='ACTIVE'><i
            class='fas fa-check-circle'></i></button>
</form>
<script>
    $('.show-alert-active-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to active  this user?",
            text: "If you active this, it will be gone forever.",
            icon: "success",
            type: "success",
            buttons: ["Cancel", "Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            text - align: 'center',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
