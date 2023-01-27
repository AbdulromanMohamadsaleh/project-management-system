<button style="background-color:orange" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalactivity">
    <i class="bi bi-pencil"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modalactivity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit activity</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="signUpForm" method="post" action="{{ route('activity.edit',$act->ACTIVITY_ID ) }}">
                @csrf
                <div class="row mb-5 mb-sm-0">
                    <div class=" mb-sm-5">
                        <label class="label-left fw-bold mb-2" for="projectName">Activity</label>
                        <input value="{{ $act->ACTIVITY_NAME }}" type="text" name="activity" class="form-control"
                            id="projectName">
                    </div>
                    <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
