<span @switch($project_detail->STATUS)
        @case(0)
            <span class="badge rounded-pill text-bg-secondary">New Release</span>
        @break

        @case(1)
            <span class="badge rounded-pill text-bg-primary">Approved</span>
        @break

        @case(2)
            <span style="background-color: orange" class="badge rounded-pill ">Progress</span>
        @break

        @case(3)
            <span class="badge rounded-pill text-bg-success">Completed</span>
        @break

        @case(4)
            <span class="badge rounded-pill text-bg-danger">Canceled</span>
        @break

        @default
            {{-- <span class="badge rounded-pill 'text-bg-secondary'"  >{{ $status }}</span> --}}
    @endswitch
