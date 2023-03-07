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
                    @if ($routename == 'createuser')
                        @include('profile.include.editUser')
                    @endif
                    @if ($logins->STATUS == 0)
                        @include('profile.include.delete_user')
                        @include('profile.include.active_user')
                    @elseif ($logins->STATUS == 2)
                        <span class="badge bg-secondary">Leave</span>
                    @else
                        <span class="badge bg-success">Active</span>
                    @endif

                </td>

            </tr>
        @endforeach
    </tbody>
</table>
