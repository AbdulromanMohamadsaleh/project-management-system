<table class="table" id="example">
    <thead>
        <tr>
            <th style="text-align: center;" scope="col">Holyday Name</th>
            <th style="text-align: center;" scope="col">Date Holyday</th>
            <th style="text-align: center;">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($holydays as $Holyday)
            <tr>
                <td style="text-align:left">{{ $Holyday->HOLYDAY_NAME }}</td>
                <td style="text-align:center">{{ $Holyday->HOLYDAY_DATE }}</td>
                </center>
                <td class="project-actions text-right">
                    @include("holyday.inlude.editholyda")
                    @include("holyday.inlude.deleteholyday")
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
