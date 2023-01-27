<div id="refresher">
<table class="table" id="filterTable">
    <thead>
        <tr>
            <th style="text-align: center;" scope="col">Holyday Name</th>
            <th style="text-align: center;" scope="col">Date Holyday</th>
            <th style="text-align: center;">Action</th>

        </tr>
    </thead>
    <tbody id="download-forms-table-tbody">
        @foreach ($holydays as $Holyday)
            <tr class= "all serviceEleven" >
                <td  style="text-align:left">{{ $Holyday->HOLYDAY_NAME }}</td>
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
</div>
<script>
    $("document").ready(function () {

      $("#filterTable").dataTable({
        "searching": true
      });

      //Get a reference to the new datatable
      var table = $('#filterTable').DataTable();

      //Take the category filter drop down and append it to the datatables_filter div.
      //You can use this same idea to move the filter anywhere withing the datatable that you want.
      $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));

      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 0;
      $("#filterTable th").each(function (i) {
        if ($($(this)).html() == "Date Holyday") {
          categoryIndex = i; return false;
        }
      });

      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          var category = data[categoryIndex];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );

      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#categoryFilter").change(function (e) {
        table.draw();
      });

      table.draw();
    });
</script>
