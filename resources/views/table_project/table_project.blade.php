@if ($project_details->count() != 0)
    <table class="table" id="example">
        <thead>
            <tr>
                <th style="text-align: center;" scope="col">ID Project</th>
                <th style="text-align: center;" scope="col">Name Porject</th>
                <th style="text-align: center;" scope="col">Record Caretor</th>
                {{-- <th style="text-align: center;" scope="col">Date Record</th> --}}
                <th>Progress</th>
                <th>Status</th>
                <th style="text-align: center;" scope="col">Created at</th>
                <th style="text-align: center;">Action</th>

            </tr>
        </thead>
        <tbody id="download-forms-table-tbody">


            @foreach ($project_details as $project_detail)
                <tr style="text-align:left">
                    <th scope="row">{{ $project_detail->DETAIL_ID }}</th>
                    <td>{{ $project_detail->NAME_PROJECT }}</td>
                    <td>{{ $project_detail->ProjectCreator->NAME }}</td>
                    {{-- <td>{{ $project_detail->DATE_SAVE }}</td> --}}
                    <td>
                        <div class="progress">
                            <div class="progress-bar {{ $project_detail->track->PROJECT_PERCENTAGE == '100' ? 'bg-success' : 'bg-warning' }} "
                                role="progressbar" aria-label="Example with label"
                                style="width: {{ $project_detail->track->PROJECT_PERCENTAGE }}%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                {{ $project_detail->track->PROJECT_PERCENTAGE }}%</div>
                        </div>
                        {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <center>
                        <p>50%</p> --}}
                    </td>
                    </center>
                    <td>
                        @include('Admin.include.show_project_status')
                    </td>
                    <td>
                        {{ $project_detail->created_at->diffForHumans() }}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm3" data-toggle="tooltip" title="view project"
                            href="{{ route('show', $project_detail->DETAIL_ID) }}">
                            <i class="bi bi-eye" style="font-size: 25;"></i>
                        </a>
                        <a class="btn btn-primary btn-sm3" data-toggle="tooltip" title="view project"
                            href="{{ route('timeline', $project_detail->DETAIL_ID) }}">
                            <i class="bi bi-alarm" style="font-size: 25;"></i>
                        </a>
                        @if ($project_detail->IS_APPROVE == 0 || Auth::user()->POSITION == 'Admin')
                            <a class="btn btn-warning btn-sm2" data-toggle="tooltip" title="edit project"
                                href="{{ route('update.project', $project_detail->DETAIL_ID) }}">
                                <i class="fas fa-pencil-alt" style="font-size: 25;">
                                </i>
                            </a>
                        @endif

                        @if ($project_detail->IS_APPROVE == 0 || Auth::user()->POSITION == 'Admin')
                            <form style="display: inline-block" method="POST"
                                action="{{ route('project.delete', $project_detail->DETAIL_ID) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger  show-alert-delete-box "
                                    data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@else
    <div class="alert alert-danger" role="alert">
        No Projects
    </div>
@endif
