<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Complate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $project_details = $data['userInCompletedProjectsData'];
                @endphp
                <div style="overflow: scroll" class="table-responsive">
                    @include('table_project.table_dashbord')
                </div>
            </div>
        </div>
    </div>
</div>
