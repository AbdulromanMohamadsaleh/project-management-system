<div class="card card-outline card-lime">
    <div class="card-header">
        <span><b>Team Member/s:</b></span>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <ul class="users-list clearfix list-group list-group-horizontal justify-content-center" style="flex-wrap: wrap">
            @foreach ($TeamsName as $TeamsName)
                <li class="nav-link">
                    <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt="User Image">
                    <a style="text-decoration: none; color: black;" class="users-list-name"
                        href="javascript:void(0)">{{ $TeamsName->NAME }}</a>
                </li>
            @endforeach
            <!-- <span class="users-list-date">Today</span> -->
        </ul>
    </div>
</div>
