@extends('layouts.master')

<style>
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



    @media only screen and (min-width: 992px) {
        .general-stat-icon {
            height: 60px;
        }
    }


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



    .firstRow {
        box-sizing: border-box;

        height: 55px;

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

    tr td {
        vertical-align: middle;
    }
</style>

@section('content')
    <div class="container p-5">
        <h1 class="fw-bold text-center fs-4 mb-5">Report Projects</h1>
        <form id="search-form">
            <div class="row" id="search">
                <div class="form-group col-9">
                    <input class="form-control" type="text" placeholder="Search" />
                </div>
                <div class="form-group col-3 d-grid">
                    <button class="btn btn-block btn-primary">Search</button>
                </div>
            </div>
        </form>
        <form class="mt-4">
            <div class="row" id="filter">
                <div class="form-group col-sm-3 col-xs-6 mb-4">
                    <span for="from" class="label-left form-label fw-bold" for="">From:</span>
                    <input id="from" type="date" class="form-control">
                </div>
                <div class="form-group col-sm-3 col-xs-6 mb-4">
                    <span for="to" class="label-left form-label fw-bold" for="">To:</span>
                    <input id="to" type="date" class="form-control">
                </div>

                <div class="form-group col-sm-3 col-xs-6 mb-4">
                    <span class="label-left form-label fw-bold" for="">Name:</span>
                    <select data-filter="name" class="filter-name filter form-control">
                        <option value="">All Name</option>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-6  mb-4">
                    <span class="label-left form-label fw-bold" for="">Start Status:</span>
                    <select data-filter="status" class="filter-status filter form-control">
                        <option value="">All Status</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6  mb-4">
                    <span class="label-left form-label fw-bold" for="">Category:</span>
                    <select data-filter="category" class="filter-category filter form-control">
                        <option value="">All Category</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6  mb-4">
                    <span class="label-left form-label fw-bold" for="">Project Manager:</span>
                    <select data-filter="projectManager" class="filter-projectManager filter form-control">
                        <option value="">All Project Manager</option>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-6  mb-4">
                    <span class="label-left form-label fw-bold" for="">Start Year:</span>
                    <select data-filter="year" class="filter-year filter form-control">
                        <option value="">All Start Year</option>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-6  mb-4">
                    <span class="label-left form-label fw-bold" for="">End Year:</span>
                    <select data-filter="end" class="filter-end filter form-control">
                        <option value="">All End Year</option>
                    </select>
                </div>
            </div>
        </form>

        {{-- Summary --}}
        <div class="mb-5 general-stat-grid  shadow p-2 general-stats justify-content-center row">
            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color:#A04000" class="fas fa-database general-stat-icon me-3"></i>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-project">0</h1>
                    <h6 class="my-0 fw-semibold">All Project</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color:#0d649e" class="bi bi-shield-check general-stat-icon me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-approved">0</h1>
                    <h6 class="my-0 fw-semibold">Approved</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color: #27AE60" class="bi bi-layers general-stat-icon me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-newRelease">0</h1>
                    <h6 class="my-0 fw-semibold">New Release</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color:#F5B041" class="bi bi-clock-history general-stat-ico me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-progress">0</h1>
                    <h6 class="my-0 fw-semibold">In Progress</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color:#2E86C1" class="bi bi-check2-circle general-stat-icon me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-complete">0</h1>
                    <h6 class="my-0 fw-semibold">Completed</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color: #dc3545" class="bi bi-x-circle general-stat-icon me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-Canceled">0</h1>
                    <h6 class="my-0 fw-semibold">Canceled</h6>
                </div>
            </div>

            <div class="mb-md-4 col-sm-6 col-lg-3 stat-group d-flex justify-content-center align-items-center">
                <i style="color: #27AE60" class="bi bi-cash-stack general-stat-icon me-3"></i>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="my-0 fw-bold" id="total-budget">0</h1>
                    <h6 class="my-0 fw-semibold">Total Budget</h6>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th></th>
                            <th>End Date</th>
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
@endsection


@section('script')
    @include('include.scrip');
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- DataTable Script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var data = @php echo $project_detail @endphp;

            console.log(data);

            var products = "",
                names = "",
                years = "",
                endYears = "",
                statusAll = "",
                projetManagers = "",
                projectCreator = "",
                categories = "";


            let totalProject = 0;
            let totalCompletedProject = 0;
            let totalInProjressProject = 0;
            let totalBudget = 0;
            let totalNewRelease = 0;
            let totalCanceled = 0;

            for (var i = 0; i < data.length; i++) {

                let b = new Date(data[i].DATE_START);
                let end = new Date(data[i].DATE_END);

                var prjId = data[i].DETAIL_ID,
                    name = data[i].NAME_PROJECT,
                    year = b.getFullYear(),
                    endYear = end.getFullYear(),
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
                    status = "Approved";
                    statusColor = "text-bg-primary";
                } else if (data[i].STATUS == 4) {
                    status = "Canceled";
                    statusColor = "text-bg-danger";
                }


                totalBudget += parseInt(budget);
                //create product cards all
                products += " <tr class='firstRow projets col-sm-4 product' data-name='" + name + "' data-id='" +
                    prjId + "' data-year='" +
                    year + "'" + "data-end='" + endYear + "'" + "data-date='" + data[i].DATE_START +
                    "' data-all='" +
                    "all" + "' data-status='" +
                    status + "'data-category = '" + category + "' data-projectManager='" + projetManager +
                    "' data-budget='" + budget +
                    "' ><div class='product-inner text-center'><td><b>" + prjId + "</b></td><td>" + name +
                    "</td><td>" +
                    data[i].DATE_START +
                    "<td/><td>" + data[i].DATE_END + "</td><td><span class='badge rounded-pill " + statusColor +
                    "'>" + status + "</span></td><td>" +
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

                if (endYears.indexOf("<option value='" + endYear + "'>" + endYear +
                        "</option>") == -1) {
                    endYears += "<option value='" + endYear + "'>" + endYear + "</option>";
                }
            }

            //create dropdown of makes

            $("#products").html(products);
            getProjectSummary2(data)
            $(".filter-year").append(years);
            $(".filter-name").append(names);
            $(".filter-status").append(statusAll);
            $(".filter-category").append(categories);
            $(".filter-projectManager").append(projetManagers);
            $(".filter-end").append(endYears);


        }, false);


        var filtersObject = {};

        //on filter change
        $(".filter").on("change", function() {

            var filterName = $(this).data("filter"),
                filterVal = $(this).val();

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

            let fromValue = document.getElementById("from").value;
            let toValue = document.getElementById("to").value;

            if (filters == "") {
                let filtredData = filterBetweenTwoDate($(".product"), fromValue, toValue);

                $(".product").hide().filter(filtredData).show();
                getProjectSummaryFiltred(filtredData);

            } else {
                $(".product").hide();

                let filtredData = $(".product").filter(filters);

                filtredData = filterBetweenTwoDate(filtredData, fromValue, toValue);
                $(".product").hide().filter(filtredData).show();
                getProjectSummaryFiltred(filtredData);
            }
        });

        //on search form submit
        $("#search-form").submit(function(e) {
            e.preventDefault();
            let results = [];
            var query = $("#search-form input").val().toLowerCase().trim();

            let filterd;
            var filterss = "";

            let fromValue = document.getElementById("from").value;
            let toValue = document.getElementById("to").value;

            for (var key in filtersObject) {
                if (filtersObject.hasOwnProperty(key)) {
                    filterss += "[data-" + key + "='" + filtersObject[key] + "']";
                }
            }

            if (filterss == "") {
                filterd = $(".product");
            } else {
                filterd = $(".product").filter(filterss);
            }

            if (query == "") {
                let filters = filterBetweenTwoDate(filterd, fromValue, toValue);
                $(".product").hide().filter(filters).show();
                getProjectSummaryFiltred(filters)
                return;
            }


            $(".product").hide();
            filterd.each(function() {
                var name = $(this).data("name").toLowerCase(),
                    id = $(this).data("id").toString(),
                    status = $(this).data("status").toLowerCase(),
                    year = $(this).data("year"),
                    projetManager = $(this).data("projectmanager").toLowerCase(),
                    category = $(this).data("category").toLowerCase(),
                    budget = toString($(this).data("budget"));


                year = year.toString();
                if (name.indexOf(query) > -1 || id.indexOf(query) > -1 || status.indexOf(query) > -1 || year
                    .indexOf(query) > -1 ||
                    projetManager.indexOf(query) > -1 || category.indexOf(query) > -1 || budget.indexOf(
                        query) > -1) {
                    if (fromValue == "" && fromValue == "") {
                        $(this).show();
                        results.push($(this));
                    } else {
                        if (checkDateIsInclude(fromValue, toValue, $(this).data('date'))) {
                            console.log("here")
                            $(this).show();
                            results.push($(this));
                        }
                    }

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
            let totalCanceledFild = document.getElementById("total-Canceled");
            let totalApprovedFild = document.getElementById("total-approved");




            let totalBudget = 0;
            let totalComplete = 0;
            let totalInPronggress = 0;
            let totalApproved = 0;
            let totalNew = 0;
            let totalCanceled = 0;

            for (var i = 0; i < projectsData.length; i++) {
                if (projectsData[i].dataset.status == "In Progress") {
                    totalInPronggress++
                } else if (projectsData[i].dataset.status == "Complete") {
                    totalComplete++;
                } else if (projectsData[i].dataset.status == "New Release") {
                    totalNew++;
                } else if (projectsData[i].dataset.status == "Approved") {
                    totalApproved++;
                } else if (projectsData[i].dataset.status == "Canceled") {
                    totalCanceled++;
                }

                totalBudget += parseInt(projectsData[i].dataset.budget);


            }

            totalBudgetFild.innerHTML = totalBudget;
            totalProjectFild.innerHTML = projectsData.length;
            totalCompleteFild.innerHTML = totalComplete;
            totalProgresstFild.innerHTML = totalInPronggress;
            totalNewReleaseFild.innerHTML = totalNew;
            totalCanceledFild.innerHTML = totalCanceled;
            totalApprovedFild.innerHTML = totalApproved;
        }


        function getProjectSummary2(filtredData) {
            let projectsData = filtredData;

            let totalBudgetFild = document.getElementById("total-budget");
            let totalProjectFild = document.getElementById("total-project");
            let totalCompleteFild = document.getElementById("total-complete");
            let totalProgresstFild = document.getElementById("total-progress");
            let totalNewReleaseFild = document.getElementById("total-newRelease");
            let totalCanceledFild = document.getElementById("total-Canceled");
            let totalApprovedFild = document.getElementById("total-approved");


            let totalBudget = 0;
            let totalComplete = 0;
            let totalInPronggress = 0;
            let totalApproved = 0;
            let totalNew = 0;
            let totalCanceled = 0;
            for (var i = 0; i < projectsData.length; i++) {

                if (projectsData[i].STATUS == 2) {
                    totalInPronggress++
                } else if (projectsData[i].STATUS == 3) {
                    totalComplete++;
                } else if (projectsData[i].STATUS == 0) {
                    totalNew++;
                } else if (projectsData[i].STATUS == 4) {
                    totalCanceled++;
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
            totalCanceledFild.innerHTML = totalCanceled;
            totalApprovedFild.innerHTML = totalApproved;
        }


        function filterBetweenTwoDate(data, from, to) {
            if (from == "" && to == "")
                return data;

            // console.log(data)
            let afterFilter = [];

            for (var i = 0; i < data.length; i++) {
                // console.log("Check: " + data[i].dataset.date,"From: "+ from,"To: "+ to);
                // console.log(checkDateIsInclude(from, to, data[i].dataset.date))
                if (checkDateIsInclude(from, to, data[i].dataset.date)) {
                    console.log("here");
                    afterFilter.push(data[i]);
                }
            }
            // console.log(afterFilter)
            return afterFilter;
        }

        function checkDateIsInclude(from, to, check) {
            if (from == "") {
                from = "1-12-1990";
            } else if (to == "") {
                to = "1-12-2999";
            }
            var fDate, lDate, cDate;
            fDate = Date.parse(from);
            lDate = Date.parse(to);
            cDate = Date.parse(check);

            if ((cDate <= lDate && cDate >= fDate)) {
                return true;
            }
            return false;
        }


        let from = document.getElementById("from");
        let to = document.getElementById("to");

        from.addEventListener("change", (e) => {
            let fromValue = e.target.value;
            let toValue = document.getElementById("to").value;

            let filterd;
            var filterss = "";

            for (var key in filtersObject) {
                if (filtersObject.hasOwnProperty(key)) {
                    filterss += "[data-" + key + "='" + filtersObject[key] + "']";
                }
            }

            if (filterss == "") {
                filterd = $(".product");
            } else {
                filterd = $(".product").filter(filterss);
            }

            let filters = filterBetweenTwoDate(filterd, fromValue, toValue);
            getProjectSummaryFiltred(filters)
            $(".product").hide().filter(filters).show();
        })

        to.addEventListener("change", (e) => {
            let toValue = e.target.value;
            let FromValue = document.getElementById("from").value;

            let filterd;
            var filterss = "";

            for (var key in filtersObject) {
                if (filtersObject.hasOwnProperty(key)) {
                    filterss += "[data-" + key + "='" + filtersObject[key] + "']";
                }
            }

            if (filterss == "") {
                filterd = $(".product");
            } else {
                filterd = $(".product").filter(filterss);
            };

            let filters = filterBetweenTwoDate(filterd, FromValue, toValue);
            getProjectSummaryFiltred(filters)
            $(".product").hide().filter(filters).show();

        })


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
@endsection
