<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<style>
    /* .general-stat-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
    } */


    .general-stat-icon {

        transition: all .1s ease-in-out;
    }

    .stat-group i {
        font-size: 60px;
    }

    .stat-group {
        transition: all .3s ease-in-out;
    }

    .stat-group:hover {
        transform: translateY(-5px);
    }

    .stat-group:hover .general-stat-icon {
        /* filter: invert(50%) sepia(11%) saturate(2483%) hue-rotate(80deg) brightness(95%) contrast(87%); */
    }

    @media only screen and (min-width: 992px) {
        .general-stat-icon {
            height: 60px;
        }
    }

    /* .stat-group:not(:last-child):after {
        content: "";
        width: 2px;
        height: 75px;
        background: #eee;
    } */

    @media only screen and (max-width: 576px) {
        .general-stat-grid {
            grid-template-columns: 1fr;
            grid-row-gap: 30px;
        }

        .general-stat-icon {
            height: 100px;
        }

        .stat-group:not(:last-child):after {
            content: none;
        }
    }


    .TableHead {
        box-sizing: border-box;
        width: 1302.49px;
        height: 50px;
        background: #F9F9F9;
        border: 1px solid #DDE0E2;
        border-style: solid !important;
        border-width: thin !important;
    }

    .TableHead tr {
        padding: 50px !important;
    }

    th {
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
    }

    th:first-child {
        border-left: 1px solid #dddddd;
    }

    /* tbody:before {
        content: "@";
        display: block;
        line-height: 10px;
        text-indent: -99999px;
    } */


    .firstRow {
        box-sizing: border-box;

        height: 55px;
        /* width: 1302.49px;
        left: 309.54px;
        top: 404.06px; */
        background: #FFFFFF;
        border-width: 1px 1px 1px 1px !important;
        border-style: solid !important;
        border-color: #DDE0E2 !important;
    }


    h1 {
        font-size: 42px;
        color: #2c3e50;
    }

    input[type="checkbox"] {
        position: relative;
        width: 80px;
        height: 30px;
        -webkit-appearance: none;
        border-radius: 20px;
        outline: none;
        transition: .4s;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    input:checked[type="checkbox"] {
        background: green;
    }

    input[type="checkbox"]::before {
        z-index: 2;
        position: absolute;
        content: "";
        left: 0;
        width: 30px;
        height: 30px;
        background: #8E9AA0;
        border-radius: 50%;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: .4s;
    }

    input:checked[type="checkbox"]::before {
        left: 50px;
        background: #FFFFFF;
    }

    .toggle {
        position: relative;
        display: inline;
    }

    label {
        position: absolute;
        color: #fff;
        font-weight: 600;
        pointer-events: none;
    }

    .onbtn {
        bottom: 0px;
        left: 11px;
    }

    .ofbtn {
        bottom: 0px;
        right: 8px;
        color: #8E9AA0;
    }
</style>

<body>
    @include('include.header')
    <script></script>


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('include.navbar')<br>

        <div class="container">
            <form id="search-form" action="" method="POST" enctype="multipart/form-data">
                <div class="row" id="search">
                    <div class="form-group col-9">
                        <input class="form-control" type="text" placeholder="Search" />
                    </div>
                    <div class="form-group col-3">
                        <button type="submit" class="btn btn-block btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <form>
                <div class="row" id="filter">
                    <div class="form-group col-sm-3 col-xs-6">
                        <select data-filter="name" class="filter-name filter form-control">
                            <option value="">Select Name</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-6">
                        <select data-filter="year" class="filter-year filter form-control">
                            <option value="">Select Year</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-6">
                        <select data-filter="status" class="filter-status filter form-control">
                            <option value="">Select Status</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-6">
                        <select data-filter="category" class="filter-category filter form-control">
                            <option value="">Select Category</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-6">
                        <select data-filter="projectManager" class="filter-projectManager filter form-control">
                            <option value="">Select Project Manager</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                </div>
            </form>

            {{-- Summary --}}
            <div class="mb-5 general-stat-grid  shadow p-4 general-stats justify-content-center row">
                <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                    <i style="color:#A04000" class="fas fa-database general-stat-icon me-3"></i>

                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="my-0 font-weight-bold" id="total-project">540</h1>
                        <h6 class="my-0">All Project</h6>
                    </div>
                </div>
                <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                    <i style="color:#2E86C1" class="bi bi-check2-circle general-stat-icon me-3"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="my-0 font-weight-bold" id="total-complete">145</h1>
                        <h6 class="my-0">Completed</h6>
                    </div>
                </div>
                <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                    <i style="color:#F5B041" class="bi bi-clock-history general-stat-ico me-3"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="my-0 font-weight-bold" id="total-progress">184</h1>
                        <h6 class="my-0">In Progress</h6>
                    </div>
                </div>
                <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                    <i style="color: #27AE60" class="bi bi-cash-stack general-stat-icon me-3"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="my-0 font-weight-bold" id="total-budget">130</h1>
                        <h6 class="my-0">Budget</h6>
                    </div>
                </div>

                <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                    <i style="color: #27AE60" class="bi bi-layers general-stat-icon me-3"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="my-0 font-weight-bold" id="total-newRelease">130</h1>
                        <h6 class="my-0">New Release</h6>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <table id="exampl" class="table cell-border " style="width:100%">
                        <thead class="TableHead">
                            <tr>
                                <th>Name</th>
                                <th>Year</th>
                                <th></th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Project Manager</th>
                            </tr>
                        </thead>
                        <tbody id="products">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
<style>

</style>

{{-- DataTable Script --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var data = @php echo $project_detail @endphp;

        var products = "",
            names = "",
            years = "",
            statusAll = "",
            projetManagers = "",
            projectCreator = "",
            categories = "";


        let totalProject = 0;
        let totalCompletedProject = 0;
        let totalInProjressProject = 0;
        let totalBudget = 0;
        let totalNewRelease = 0;

        for (var i = 0; i < data.length; i++) {

            let b = new Date(data[i].created_at);
            console.log(b.getFullYear())

            var name = data[i].NAME_PROJECT,
                year = b.getFullYear(),
                budget = data[i].BUDGET,
                category = data[i].category.NAME_CATEGORY,
                projetManager = data[i].project_manager.NAME,
                projectCreator = data[i].project_creator.NAME;

            var status;
            var statusColor;

            if (data[i].STATUS == 2) {
                status = "In Progress";
                statusColor = "text-bg-warning";
            } else if (data[i].STATUS == 3) {
                status = "Complete";
                statusColor = "text-bg-success";
            } else if (data[i].STATUS == 0) {
                status = "New Release";
                statusColor = "text-bg-secondary";
            } else if (data[i].STATUS == 1) {
                status = "In Progress";
                statusColor = "text-bg-warning";
            }


            totalBudget += parseInt(budget);
            //create product cards all
            products += " <tr class='firstRow projets col-sm-4 product' data-name='" + name + "' data-year='" +
                year + "' data-all='" + "all" + "' data-status='" +
                status + "' data-category = '" + category + "' data-projectManager='" + projetManager +
                "' data-budget='" + budget +
                "' ><div class='product-inner text-center'><td>" + name + "</td><td>" + year +
                "<td/><td><span class='badge rounded-pill " + statusColor + "'>" + status + "</span></td><td>" +
                category + "</td><td>" +
                budget + "&#3647</td><td>" +
                projetManager +
                "</td></div></tr>";



            if (years.indexOf("<option value='" + year + "'>" + year + "</option>") == -1) {
                years += "<option value='" + year + "'>" + year + "</option>";
            }

            if (names.indexOf("<option value='" + name + "'>" + name + "</option>") == -1) {
                names += "<option value='" + name + "'>" + name + "</option>";
            }

            if (statusAll.indexOf("<option value='" + status + "'>" + status + "</option>") == -1) {
                statusAll += "<option value='" + status + "'>" + status + "</option>";
            }

            if (categories.indexOf("<option value='" + category + "'>" + category + "</option>") == -1) {
                categories += "<option value='" + category + "'>" + category + "</option>";
            }

            if (projetManagers.indexOf("<option value='" + projetManager + "'>" + projetManager +
                    "</option>") == -1) {
                projetManagers += "<option value='" + projetManager + "'>" + projetManager + "</option>";
            }
        }

        //create dropdown of makes

        $("#products").html(products);
        console.log(data)
        getProjectSummary2(data)
        $(".filter-year").append(years);
        $(".filter-name").append(names);
        $(".filter-status").append(statusAll);
        $(".filter-category").append(categories);
        $(".filter-projectManager").append(projetManagers);

    }, false);


    var filtersObject = {};

    //on filter change
    $(".filter").on("change", function() {

        var filterName = $(this).data("filter"),
            filterVal = $(this).val();


        // if (filterVal == 'all')
        //     filterName = filterVal

        if (filterVal == "") {
            delete filtersObject[filterName];
        } else {
            filtersObject[filterName] = filterVal;
        }

        var filters = "";

        for (var key in filtersObject) {

            if (filtersObject.hasOwnProperty(key)) {
                filters += "[data-" + key + "='" + filtersObject[key] + "']";
            }
        }

        // console.log(filters)
        if (filters == "") {
            $(".product").show();
            getProjectSummaryFiltred($(".product"));

        } else {
            $(".product").hide();
            $(".product").hide().filter(filters).show();

            let filtredData = $(".product").filter(filters);
            getProjectSummaryFiltred(filtredData);
        }
    });

    //on search form submit
    $("#search-form").submit(function(e) {
        e.preventDefault();
        let results = [];
        var query = $("#search-form input").val().toLowerCase();

        if (query == "") {
            $(".product").show();
            getProjectSummaryFiltred($(".product"))
            return;
        }

        $(".product").hide();
        $(".product").each(function() {
            var name = $(this).data("name").toLowerCase(),
                status = $(this).data("status").toLowerCase(),
                year = $(this).data("year"),
                projetManager = $(this).data("projectmanager"),
                category = $(this).data("category").toLowerCase(),
                budget = toString($(this).data("budget"));


            year = year.toString();
            if (name.indexOf(query) > -1 || status.indexOf(query) > -1 || year.indexOf(query) > -1 ||
                projetManager.indexOf(query) > -1 || category.indexOf(query) > -1 || budget.indexOf(
                    query) > -1) {
                results.push($(this));
                $(this).show();
            }
        });
        let filtredData = results.map(element => {
            return element[0];
        });

        getProjectSummaryFiltred(filtredData)


    });

    function getProjectSummaryFiltred(filtredData) {
        let projectsData = filtredData;
        let totalBudgetFild = document.getElementById("total-budget");
        let totalProjectFild = document.getElementById("total-project");
        let totalCompleteFild = document.getElementById("total-complete");
        let totalProgresstFild = document.getElementById("total-progress");
        let totalNewReleaseFild = document.getElementById("total-newRelease");

        let totalBudget = 0;
        let totalComplete = 0;
        let totalInPronggress = 0;
        let totalApproved = 0;
        let totalNew = 0;

        for (var i = 0; i < projectsData.length; i++) {


            if (projectsData[i].dataset.status == "In Progress") {
                totalInPronggress++
            } else if (projectsData[i].dataset.status == "Complete") {
                totalComplete++;
            } else if (projectsData[i].dataset.status == "New Release") {
                totalNew++;
            } else if (projectsData[i].dataset.status == "Approved") {
                totalApproved++;
            }


            totalBudget += parseInt(projectsData[i].dataset.budget);


        }

        totalBudgetFild.innerHTML = totalBudget;
        totalProjectFild.innerHTML = projectsData.length;
        totalCompleteFild.innerHTML = totalComplete;
        totalProgresstFild.innerHTML = totalInPronggress;
        totalNewReleaseFild.innerHTML = totalNew;
    }

    function getProjectSummary2(filtredData) {
        let projectsData = filtredData;

        let totalBudgetFild = document.getElementById("total-budget");
        let totalProjectFild = document.getElementById("total-project");
        let totalCompleteFild = document.getElementById("total-complete");
        let totalProgresstFild = document.getElementById("total-progress");
        let totalNewReleaseFild = document.getElementById("total-newRelease");

        let totalBudget = 0;
        let totalComplete = 0;
        let totalInPronggress = 0;
        let totalApproved = 0;
        let totalNew = 0;

        for (var i = 0; i < projectsData.length; i++) {

            if (projectsData[i].STATUS == 2) {
                totalInPronggress++
            } else if (projectsData[i].STATUS == 3) {
                totalComplete++;
            } else if (projectsData[i].STATUS == 0) {
                totalNew++;
            } else if (projectsData[i].STATUS == 1) {
                totalApproved++;
            }

            totalBudget += parseInt(projectsData[i].BUDGET);


        }

        totalBudgetFild.innerHTML = totalBudget;
        totalProjectFild.innerHTML = projectsData.length;
        totalCompleteFild.innerHTML = totalComplete;
        totalProgresstFild.innerHTML = totalInPronggress;
        totalNewReleaseFild.innerHTML = totalNew;
    }

    $(document).ready(function() {
        $('#exampl').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
</script>
