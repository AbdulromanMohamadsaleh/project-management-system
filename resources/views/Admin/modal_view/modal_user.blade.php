<div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project All</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $project_details = $data['totalUsersData'];
                @endphp
                <div style="overflow: scroll" class="table-responsive">
                    @include('createuser.include.tableuser')
                </div>
            </div>
        </div>
    </div>
</div>
