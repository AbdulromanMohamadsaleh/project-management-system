    // document.addEventListener('DOMContentLoaded', function() {
    //     var data = @php echo $project_detail @endphp;

    //     var products = "",
    //         names = "",
    //         years = "",
    //         statusAll = "",
    //         projetManagers = "",
    //         projectCreator = "",
    //         categories = "";


    //     let totalProject = 0;
    //     let totalCompletedProject = 0;
    //     let totalInProjressProject = 0;
    //     let totalBudget = 0;
    //     let totalNewRelease = 0;

    //     for (var i = 0; i < data.length; i++) {

    //         let b = new Date(data[i].created_at);
    //         console.log(b.getFullYear())

    //         var name = data[i].NAME_PROJECT,
    //             year = b.getFullYear(),
    //             budget = data[i].BUDGET,
    //             category = data[i].category.NAME_CATEGORY,
    //             projetManager = data[i].project_manager.NAME,
    //             projectCreator = data[i].project_creator.NAME;

    //         var status;
    //         var statusColor;

    //         if (data[i].STATUS == 2) {
    //             status = "In Progress";
    //             statusColor = "text-bg-warning";
    //         } else if (data[i].STATUS == 3) {
    //             status = "Complete";
    //             statusColor = "text-bg-success";
    //         } else if (data[i].STATUS == 0) {
    //             status = "New Release";
    //             statusColor = "text-bg-secondary";
    //         } else if (data[i].STATUS == 1) {
    //             status = "In Progress";
    //             statusColor = "text-bg-warning";
    //         }


    //         totalBudget += parseInt(budget);
    //         //create product cards all
    //         products += " <tr class='firstRow projets col-sm-4 product' data-name='" + name + "' data-year='" +
    //             year + "' data-all='" + "all" + "' data-status='" +
    //             status + "' data-category = '" + category + "' data-projectManager='" + projetManager +
    //             "' data-budget='" + budget +
    //             "' ><div class='product-inner text-center'><td>" + name + "</td><td>" + year +
    //             "<td/><td><span class='badge rounded-pill " + statusColor + "'>" + status + "</span></td><td>" +
    //             category + "</td><td>" +
    //             budget + "&#3647</td><td>" +
    //             projetManager +
    //             "</td></div></tr>";



    //         if (years.indexOf("<option value='" + year + "'>" + year + "</option>") == -1) {
    //             years += "<option value='" + year + "'>" + year + "</option>";
    //         }

    //         if (names.indexOf("<option value='" + name + "'>" + name + "</option>") == -1) {
    //             names += "<option value='" + name + "'>" + name + "</option>";
    //         }

    //         if (statusAll.indexOf("<option value='" + status + "'>" + status + "</option>") == -1) {
    //             statusAll += "<option value='" + status + "'>" + status + "</option>";
    //         }

    //         if (categories.indexOf("<option value='" + category + "'>" + category + "</option>") == -1) {
    //             categories += "<option value='" + category + "'>" + category + "</option>";
    //         }

    //         if (projetManagers.indexOf("<option value='" + projetManager + "'>" + projetManager +
    //                 "</option>") == -1) {
    //             projetManagers += "<option value='" + projetManager + "'>" + projetManager + "</option>";
    //         }
    //     }

    //     //create dropdown of makes

    //     $("#products").html(products);
    //     console.log(data)
    //     getProjectSummary2(data)
    //     $(".filter-year").append(years);
    //     $(".filter-name").append(names);
    //     $(".filter-status").append(statusAll);
    //     $(".filter-category").append(categories);
    //     $(".filter-projectManager").append(projetManagers);

    // }, false);


    // var filtersObject = {};

    // //on filter change
    // $(".filter").on("change", function() {

    //     var filterName = $(this).data("filter"),
    //         filterVal = $(this).val();


    //     // if (filterVal == 'all')
    //     //     filterName = filterVal

    //     if (filterVal == "") {
    //         delete filtersObject[filterName];
    //     } else {
    //         filtersObject[filterName] = filterVal;
    //     }

    //     var filters = "";

    //     for (var key in filtersObject) {

    //         if (filtersObject.hasOwnProperty(key)) {
    //             filters += "[data-" + key + "='" + filtersObject[key] + "']";
    //         }
    //     }

    //     // console.log(filters)
    //     if (filters == "") {
    //         $(".product").show();
    //         getProjectSummaryFiltred($(".product"));

    //     } else {
    //         $(".product").hide();
    //         $(".product").hide().filter(filters).show();

    //         let filtredData = $(".product").filter(filters);
    //         getProjectSummaryFiltred(filtredData);
    //     }
    // });

    // //on search form submit
    // $("#search-form").submit(function(e) {
    //     e.preventDefault();
    //     let results = [];
    //     var query = $("#search-form input").val().toLowerCase();

    //     if (query == "") {
    //         $(".product").show();
    //         getProjectSummaryFiltred($(".product"))
    //         return;
    //     }

    //     $(".product").hide();
    //     $(".product").each(function() {
    //         var name = $(this).data("name").toLowerCase(),
    //             status = $(this).data("status").toLowerCase(),
    //             year = $(this).data("year"),
    //             projetManager = $(this).data("projectmanager"),
    //             category = $(this).data("category").toLowerCase(),
    //             budget = toString($(this).data("budget"));


    //         year = year.toString();
    //         if (name.indexOf(query) > -1 || status.indexOf(query) > -1 || year.indexOf(query) > -1 ||
    //             projetManager.indexOf(query) > -1 || category.indexOf(query) > -1 || budget.indexOf(
    //                 query) > -1) {
    //             results.push($(this));
    //             $(this).show();
    //         }
    //     });
    //     let filtredData = results.map(element => {
    //         return element[0];
    //     });

    //     getProjectSummaryFiltred(filtredData)


    // });

    // function getProjectSummaryFiltred(filtredData) {
    //     let projectsData = filtredData;
    //     let totalBudgetFild = document.getElementById("total-budget");
    //     let totalProjectFild = document.getElementById("total-project");
    //     let totalCompleteFild = document.getElementById("total-complete");
    //     let totalProgresstFild = document.getElementById("total-progress");
    //     let totalNewReleaseFild = document.getElementById("total-newRelease");

    //     let totalBudget = 0;
    //     let totalComplete = 0;
    //     let totalInPronggress = 0;
    //     let totalApproved = 0;
    //     let totalNew = 0;

    //     for (var i = 0; i < projectsData.length; i++) {


    //         if (projectsData[i].dataset.status == "In Progress") {
    //             totalInPronggress++
    //         } else if (projectsData[i].dataset.status == "Complete") {
    //             totalComplete++;
    //         } else if (projectsData[i].dataset.status == "New Release") {
    //             totalNew++;
    //         } else if (projectsData[i].dataset.status == "Approved") {
    //             totalApproved++;
    //         }


    //         totalBudget += parseInt(projectsData[i].dataset.budget);


    //     }

    //     totalBudgetFild.innerHTML = totalBudget;
    //     totalProjectFild.innerHTML = projectsData.length;
    //     totalCompleteFild.innerHTML = totalComplete;
    //     totalProgresstFild.innerHTML = totalInPronggress;
    //     totalNewReleaseFild.innerHTML = totalNew;
    // }

    // function getProjectSummary2(filtredData) {
    //     let projectsData = filtredData;

    //     let totalBudgetFild = document.getElementById("total-budget");
    //     let totalProjectFild = document.getElementById("total-project");
    //     let totalCompleteFild = document.getElementById("total-complete");
    //     let totalProgresstFild = document.getElementById("total-progress");
    //     let totalNewReleaseFild = document.getElementById("total-newRelease");

    //     let totalBudget = 0;
    //     let totalComplete = 0;
    //     let totalInPronggress = 0;
    //     let totalApproved = 0;
    //     let totalNew = 0;

    //     for (var i = 0; i < projectsData.length; i++) {

    //         if (projectsData[i].STATUS == 2) {
    //             totalInPronggress++
    //         } else if (projectsData[i].STATUS == 3) {
    //             totalComplete++;
    //         } else if (projectsData[i].STATUS == 0) {
    //             totalNew++;
    //         } else if (projectsData[i].STATUS == 1) {
    //             totalApproved++;
    //         }

    //         totalBudget += parseInt(projectsData[i].BUDGET);


    //     }

    //     totalBudgetFild.innerHTML = totalBudget;
    //     totalProjectFild.innerHTML = projectsData.length;
    //     totalCompleteFild.innerHTML = totalComplete;
    //     totalProgresstFild.innerHTML = totalInPronggress;
    //     totalNewReleaseFild.innerHTML = totalNew;
    // }

    // $(document).ready(function() {
    //     $('#exampl').DataTable({
    //         "bPaginate": false,
    //         "bLengthChange": false,
    //         "bFilter": false,
    //         "bInfo": false,
    //         "bAutoWidth": false
    //     });
    // });
