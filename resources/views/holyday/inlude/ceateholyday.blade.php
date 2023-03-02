<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    <i class="fa fa-plus" aria-hidden="true"></i></button>
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Holiday</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="createHolyDayForm" class="formCustom" method="post">
                    @csrf
                    {{-- Project Name / Target --}}
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="create_holyday_name">Holiday
                                Name</label>
                            <input type="text" name="create_holyday_name" class="form-control"
                                id="create_holyday_name">

                            <span class=" fw-bold text-danger" id="create_holyday_name_error">

                            </span>

                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="create_date_holyday">Date
                                Holiday</label>
                            <input type="date" name="create_date_holyday" class="form-control"
                                id="create_date_holyday">
                            <span class="  text-danger fw-bold" id="create_date_holyday_error">

                            </span>
                        </div>
                        <button id="submitCreateHolyDay" type="button" name="submit"
                            class="btn btn-success">SAVE</button>
                    </div>
            </div>
            <!-- end previous / next buttons -->
            </form>
        </div>

        <!-- Modal footer -->

    </div>
</div>
