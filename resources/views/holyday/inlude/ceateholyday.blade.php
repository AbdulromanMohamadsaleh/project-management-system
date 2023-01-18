<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    <i class="fa fa-plus" aria-hidden="true"></i></button>
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Holyday</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="signUpForm" method="post" action="{{ route('holyday.save') }}">
                    @csrf
                    {{-- Project Name / Target --}}
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Holyday
                                Name</label>
                            <input type="text" name="holyday_name" class="form-control"
                                id="projectName">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="target">Date
                                Holyday</label>
                            <input type="date" name="date_holyday" class="form-control"
                                id="target">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">SAVE</button>
                    </div>
            </div>
            <!-- end previous / next buttons -->
            </form>
        </div>

        <!-- Modal footer -->

    </div>
</div>
