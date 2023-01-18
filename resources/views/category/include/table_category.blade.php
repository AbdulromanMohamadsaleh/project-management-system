<table class="table" id="example">
    <thead>
        <tr>
            <th style="text-align: center;" scope="col">ID</th>
            <th style="text-align: center;" scope="col">Name Category</th>
            <th style="text-align: center;">Action</th>

        </tr>
    </thead>
    <tbody>
            @foreach ( $Category as $Categorys )
            <tr style="text-align: center">
                <td >{{$Categorys->CATEGORY_ID}}</td>
                <td>{{$Categorys->NAME_CATEGORY}}</td>
                <td class="">
                    @include("category.include.edit_category")
                    @include("category.include.delete_category")
               </td>
            </tr>
            @endforeach
    </tbody>
</table>
