<table class="table" id="example">
    <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Nickname</th>
            <th scope="col">Card_id</th>
            <th scope="col">Tel</th>
            <th scope="col">Agency</th>
            <th scope="col">Position</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($login as $logins)
            <tr style="text-align:left">
                <td>{{ $logins->LOGIN_ID }}</td>
                <td>{{ $logins->EMAIL }}</td>
                <td>{{ $logins->NAME }}</td>
                <td>{{ $logins->Profile->NICKNAME }}</td>
                <td>{{ $logins->Profile->CARD_ID }}</td>
                <td>{{ $logins->Profile->TELEPHONE }}</td>
                <td>{{ $logins->Profile->AGENCY }}</td>
                <td>{{ $logins->Profile->Position->POS_NAME }}

                <td>
                    @include('profile.include.editUser')
                    @if ($logins->IS_ACTIVE == 0)
                        <form style="display: inline-block" method="POST"
                            action="{{ route('activeuser', $logins->LOGIN_ID) }}">
                            @csrf
                            <input name="_method" type="hidden" value="POST">
                            <button type="submit" class="btn  btn-success  show-alert-delete-box "
                                data-toggle="tooltip" title='ACTIVE'><i class='fas fa-check-circle'></i></button>
                        </form>
                    @else
                        <span class="badge bg-success">Active</span>
                    @endif

                </td>

            </tr>
        @endforeach
    </tbody>
</table>
