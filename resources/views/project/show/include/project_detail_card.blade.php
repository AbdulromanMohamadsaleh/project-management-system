<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="bd-callout bd-callout-primary">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <dl>
                                <div>
                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Project Code</b>
                                        </dt>
                                        <dd>{{ $project_detail->DETAIL_ID }}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Project Name</b>
                                        </dt>
                                        <dd>{{ $project_detail->NAME_PROJECT }}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Record Name</b></dt>
                                        <dd>{{ $project_detail->ProjectCreator->NAME }}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Created Date</b></dt>
                                        <dd>{{ $project_detail->created_at->format('d/m/Y') }}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom text-break border-primary">Resons</b>
                                        </dt>
                                        <dd>{!! nl2br($project_detail->REASONS) !!}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Objective</b></dt>
                                        <dd>{!! nl2br($project_detail->OBJECTIVE) !!}</dd>
                                    </div>

                                </div>
                            </dl>
                        </div>
                        <div class="col-sm-6">
                            <dl>

                                <div class="my-4">
                                    <dt><b class="border-bottom border-primary">Target</b></dt>
                                    <dd>{{ $project_detail->TARGET }}</dd>
                                </div>

                                <div class="my-4">
                                    <dt><b class="border-bottom border-primary">Location</b></dt>
                                    <dd>{{ $project_detail->LOCATION }}</dd>
                                </div>

                                <div class="my-4">
                                    <dt><b class="border-bottom border-primary">Results</b></dt>
                                    <dd>{!! nl2br($project_detail->RESULT) !!}</dd>
                                </div>

                                <dl>
                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Start Date</b></dt>
                                        <dd>{{ date('d/m/Y', strtotime($project_detail->DATE_START)) }}</dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">End Date</b></dt>
                                        <dd>{{ date('d/m/Y', strtotime($project_detail->DATE_END)) }}
                                        </dd>
                                    </div>

                                    <div class="my-4">
                                        <dt><b class="border-bottom border-primary">Total Date</b>
                                        </dt>
                                        <dd>{{ $project_detail->TOTAL_DATE }}
                                            {{ $project_detail->DURATION_TYPE == 0 ? 'Days' : 'Weeks' }}
                                        </dd>
                                    </div>

                                </dl>
                                <div class="my-4">
                                    <dt><b class="border-bottom border-primary">Budget</b></dt>
                                    <dd>{{ $project_detail->BUDGET }}&#3647</dd>
                                </div>

                                <div class="my-4">
                                    <dt><b class="border-bottom border-primary">Project Manager</b></dt>
                                    <dd>{{ $project_detail->ProjectManager->NAME }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>
