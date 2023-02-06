<form style="display: inline-block" method="POST" action="{{ route('holyday.delete', $Holyday->HOLYDAY_ID) }}">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
    <input name="year" type="number" value="{{ $Holyday->year }}" hidden>

    <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip"
        title='Delete'><i class="bi bi-trash" style="font-size: 15px;"></i></button>
</form>
