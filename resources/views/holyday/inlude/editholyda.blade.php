<button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal"
    data-bs-target="#Modal{{ $Holyday->HOLYDAY_ID }}">
    <i class="fas fa-pencil-alt" style="font-size: 15px;">
    </i></button>

<!-- The Modal -->
<div class="modal" id="Modal{{ $Holyday->HOLYDAY_ID }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="signUpForm" method="post" action="{{ route('holyday.update', $Holyday->HOLYDAY_ID) }}">
                    @csrf
                    {{-- Project Name / Target --}}
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="holyday_name">Holyday Name</label>
                            <input type="text" name="holyday_name" class="form-control" id="holyday_name"
                                value="{{ $Holyday->HOLYDAY_NAME }}">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="target">Date Holyday</label>
                            <input type="date" name="date_holyday" value="{{ $Holyday->HOLYDAY_DATE }}"
                                class="form-control" id="target">
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
