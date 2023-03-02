<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    <i class="fa fa-plus" aria-hidden="true"></i></button>
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="signUpForm" method="post" action="{{ route('admin.saveuser') }}">
                    @csrf
                    {{-- Project Name / Target --}}
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Emial</label>
                            <input type="text" name="email" class="form-control" id="projectName">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Password
                            </label>
                            <input type="text" name="password" class="form-control" id="projectName">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Name
                            </label>
                            <input type="text" name="name" class="form-control" id="projectName">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Agency
                                Name</label>
                            <input type="text" name="agency" class="form-control" id="projectName">
                            @error('Agency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Positon</label>
                            <select name="position" class="form-select" aria-label="Default select example">
                                <option selected> select Position</option>
                                <option value="1">admin</option>
                                <option value="0">empoyeee</option>
                                <option value="2">project manager</option>
                                <option value="3">manager</option>
                            </select>
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
