<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="bd-callout bd-callout-primary">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <dl>
                                <div>
                                    <dt><b class="border-bottom border-primary">Project Code</b>
                                    </dt>
                                    <dd>{{ $project_detail->DETAIL_ID }}</dd>

                                    <dt><b class="border-bottom border-primary">Record Name</b></dt>
                                    <dd>{{ $project_detail->ProjectCreator->NAME }}</dd>
                                    <dt><b class="border-bottom border-primary">Record Date</b></dt>
                                    <dd>{{ $project_detail->created_at->format('d/m/Y') }}</dd>
                                    <dt><b class="border-bottom border-primary">Project Name</b>
                                    </dt>
                                    <dd>{{ $project_detail->NAME_PROJECT }}</dd>
                                    <dt><b class="border-bottom text-break border-primary">Resons</b>
                                    </dt>
                                    <dd>{{ $project_detail->REASONS }}</dd>
                                    <dt><b class="border-bottom border-primary">Objective</b></dt>
                                    <dd>{{ $project_detail->OBJECTIVE }}</dd>



                                    {{-- <dt><b class="border-bottom border-primary">Record Date</b>
                                                            </dt>
                                                            <dd>{{ $project_detail->DATE_SAVE }}</dd>
                                                            <dt><b class="border-bottom border-primary">Project Name</b>
                                                            </dt> --}}
                                    <b class="border-bottom text-break border-primary">Resons</b>
                                    </dt>
                                    <dd>{{ $project_detail->REASONS }}</dd>
                                    <dt>
                                </div>
                            </dl>
                        </div>
                        <div class="col-sm-6">
                            <dl>

                                <dt><b class="border-bottom border-primary">Objective</b>
                                </dt>
                                <dd>{{ $project_detail->OBJECTIVE }}</dd>
                                <dt><b class="border-bottom border-primary">Target</b></dt>
                                <dd>{{ $project_detail->TARGET }}</dd>
                                <dt><b class="border-bottom border-primary">Location</b></dt>
                                <dd>{{ $project_detail->LOCATION }}</dd>
                                <dt><b class="border-bottom border-primary">Results</b></dt>
                                <dd>{{ $project_detail->RESULT }}</dd>
                                <dl>
                                    <dt><b class="border-bottom border-primary">Start Date</b></dt>
                                    <dd>{{ $project_detail->DATE_START }}</dd>
                                    <dt><b class="border-bottom border-primary">End Date</b></dt>
                                    <dd>{{ $project_detail->DATE_END }}</dd>
                                    <dt><b class="border-bottom border-primary">Total Date</b></dt>
                                    <dd>{{ $project_detail->TOTAL_DATE }}</dd>
                                </dl>
                                <dt><b class="border-bottom border-primary">Budget</b></dt>
                                <dd>{{ $project_detail->BUDGET }}</dd>
                                <dt><b class="border-bottom border-primary">Project Manager</b></dt>
                                <dd>{{ $project_detail->ProjectManager->NAME }}</dd>

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
