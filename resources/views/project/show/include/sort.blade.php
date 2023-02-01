<style>
    ul#myList {
        background-color: #f5f5f5;
    }

    ul#myList li:hover {
        cursor: move;
    }

    ul#myList li {
        border: 1px solid #ddd;
    }

    ul#myList li {
        padding: 10px;
    }

    ul#myList li.ui-selected {
        background-color: #ddffdd;
    }

    ul#myList li span {
        font-size: 18px;
    }

    ul#myList li input {
        margin-right: 10px;
    }


    cs {
        cursor: move;
        /* other styles for when the list is draggable */
    }

    ds {
        cursor: default;
        /* other styles for when the list is not draggable */
    }

    #toggleSortable {

        background-color: tomato;
    }

    #toggleSortable.active {
        /* styles for when the button is active */
        background-color: green;
    }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<div class="form">

    <button id="toggleSortable">Sortable</button>
    <ul id="myList" class="sortable">
        <li class="itemm"><input class="order" type="text" disabled /><span>Item 1</span></li>
        <li class="itemm"><input class="order" type="text" disabled /><span>Item 2</span></li>
        <li class="itemm"><input class="order" type="text" disabled /><span>Item 3</span></li>
        <li class="itemm"><input class="order" type="text" disabled /><span>Item 4</span></li>
    </ul>

</div>



{{-- <script>
    function updateOrder() {
        $('.sortable li .order').each(function(index) {
            $(this).val(index + 1);
        });
    }

    $(document).ready(function() {
        $(".sortable").sortable({
            update: function(event, ui) {
                updateOrder();
            }
        });
    });


    $('#toggleSortable').click(function() {
        if ($("#myList").sortable("instance")) {
            $("#myList").sortable("destroy");
            console.log("default")
            $(this).addClass("active")

            $("ul#myList li").addClass("cs")
            $("ul#myList li").removeClass("ds");
            $("#myList").removeClass("sortable").addClass("disabledd");


        } else {
            $("#myList").sortable();
            $(this).removeClass("active")
            $("ul#myList li").addClass("ds")
            $("ul#myList li").removeClass("cs");
            $("#myList").removeClass("disabled").addClass("sortable");
            $(".sortable").sortable({
                update: function(event, ui) {
                    updateOrder();
                }
            });

        }
    })
</script> --}}
