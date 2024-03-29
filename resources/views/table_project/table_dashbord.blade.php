@if ($project_details->count() != 0)
    <table class="table" id="example">
        <thead>
            <tr>
                <th style="text-align: center;" scope="col">ID Project</th>
                <th style="text-align: center;" scope="col">Name Porject</th>
                <th style="text-align: center;" scope="col">Record Caretor</th>
                <th>Progress</th>
                <th>Status</th>
                <th style="text-align: center;" scope="col">Created at</th>

            </tr>
        </thead>
        <tbody>


            @foreach ($project_details as $project_detail)
                <tr style="text-align:left">
                    <th scope="row">{{ $project_detail->DETAIL_ID }}</th>
                    <td>{{ $project_detail->NAME_PROJECT }}</td>
                    <td>{{ $project_detail->ProjectCreator->NAME }}</td>

                    <td>
                        <div class="progress">
                            <div class="progress-bar {{ $project_detail->PROJECT_PERCENTAGE == '100' ? 'bg-success' : 'bg-warning' }} "
                                role="progressbar" aria-label="Example with label"
                                style="width: {{ $project_detail->PROJECT_PERCENTAGE }}%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                {{ $project_detail->PROJECT_PERCENTAGE }}%</div>
                        </div>

                    </td>
                    </center>
                    <td>
                        @include('Admin.include.show_project_status')
                    </td>
                    <td>
                        {{ $project_detail->created_at->diffForHumans() }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@else
    <div class="alert alert-danger text-center" role="alert">
        No Projects
    </div>
@endif
