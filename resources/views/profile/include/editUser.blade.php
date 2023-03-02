<button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal"
    data-bs-target="#Modal{{ $logins->LOGIN_ID }}">
    <i class="fas fa-pencil-alt" style="font-size: 15px;">
    </i></button>

<!-- The Modal -->
<div class="modal" id="Modal{{ $logins->LOGIN_ID }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit_holy_day_form" class="formCustom" method="post"
                    action="{{ route('user.UpdatePosition', $logins->LOGIN_ID) }}">
                    @csrf
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5 ">
                            <label class="label-left fw-bold mb-2" for="holyday_name">POSITION</label>
                            <select class="form-select" name="position" aria-label="Default select example">

                                <option {{ $logins->POSITION == 'Employee' ? 'selected' : '' }} value="Employee">
                                    Employee
                                </option>
                                <option {{ $logins->POSITION == 'Admin' ? 'selected' : '' }} value="Admin">Admin
                                </option>
                                <option {{ $logins->POSITION == 'Project Manager' ? 'selected' : '' }}
                                    value="Project Manager">
                                    Project
                                    Manager</option>
                                <option {{ $logins->POSITION == 'Manager' ? 'selected' : '' }} value="Manager">Manager
                                </option>
                            </select>

                        </div>
                        <button id="submitCreateHolyDay" type="buttom" name="submit"
                            class="btn btn-success">SAVE</button>
                    </div>
            </div>
            <!-- end previous / next buttons -->
            </form>
        </div>

        <!-- Modal footer -->

    </div>
</div>
