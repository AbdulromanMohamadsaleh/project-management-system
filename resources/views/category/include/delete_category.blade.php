<form style="display: inline-block" method="POST" action="{{ route('category.delete', $Categorys->CATEGORY_ID) }}">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
    <button type="submit" class="btn  btn-danger show-alert-delete-box " data-toggle="tooltip" title='Delete'><i
            class="bi bi-trash" style="font-size: 15px;"></i></button>
</form>
