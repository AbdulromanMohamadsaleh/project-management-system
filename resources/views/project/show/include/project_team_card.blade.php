<div class="card card-outline card-lime">
    <div class="card-header">
        <span><b>Team Member/s:</b></span>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <ul class="users-list clearfix list-group list-group-horizontal justify-content-center" style="flex-wrap: wrap">
            @foreach ($TeamsName as $TeamsName)
                <li class="nav-link m-3">

                    <img style="width:40px;height:40px" class="rounded-circle"
                        src="{{ $TeamsName->IMG ? asset('images/') . '/' . $TeamsName->IMG : asset('images/') . '/' . 'profile/no_img.png' }}"
                        alt="User Image">
                    <a style="text-decoration: none; color: black;" class="users-list-name"
                        href="javascript:void(0)">{{ $TeamsName->NAME }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
