<button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal" data-bs-target="#Modal{{$Categorys->CATEGORY_ID}}">
    <i class="fas fa-pencil-alt" style="font-size: 15px;">
    </i></button>

  <!-- The Modal -->
  <div class="modal" id="Modal{{$Categorys->CATEGORY_ID}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form id="signUpForm" method="post" action="{{ route('category.update',$Categorys->CATEGORY_ID) }}">
                @csrf
                    {{-- Project Name / Target --}}
                    <div class="row mb-5 mb-sm-0">
                        <div class=" mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Category Name</label>
                            <input required value="{{$Categorys->NAME_CATEGORY}}" type="text" name="category_name" class="form-control" id="projectName">
                        </div>
                        <button type="submit" name="submit"  class="btn btn-success">SAVE</button>
                    </div>
                </div>
                <!-- end previous / next buttons -->
            </form>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
</div>
