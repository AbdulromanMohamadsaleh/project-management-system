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
                        <select data-filter="projetManager" class="filter-projetManager filter form-control">
                            <option value="">Select Project Manager</option>
                            {{-- <option value="all">Show All</option> --}}
                        </select>
                    </div>
                </div>
            </form>

            {{-- Summary --}}
            <div class="mb-5 general-stat-grid  shadow p-4 general-stats  row">
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
            </div>


            <div class="row" id="products">

            </div>
        </div>
    </div>
</body>

<style>
    body {
        padding-top: 30px;
    }

    .product {
        margin-bottom: 30px;
    }

    .product-inner {
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        padding: 10px;
    }

    .product img {
        margin-bottom: 10px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var data = @php echo $project_detail @endphp;

        var products = "",
            names = "",
            years = "",
            statusAll = "",
            projetManagers = "",
            categories = "";


        // console.log(data);

        // const d = new Date(projectData[0].DATE_END);
        // console.log(d.getFullYear())




        let totalProject = 0;
        let totalCompletedProject = 0;
        let totalInProjressProject = 0;
        let totalBudget = 0;


        for (var i = 0; i < data.length; i++) {

            let b = new Date(data[i].created_at);
            console.log(b.getFullYear())

            var name = data[i].NAME_PROJECT,
                year = b.getFullYear(),
                budget = data[i].BUDGET,
                status = data[i].STATUS,
                category = data[i].category.NAME_CATEGORY,
                // rawPrice = price.replace("$", ""),
                // rawPrice = parseInt(rawPrice.replace(",", "")),
                // rawPrice = parseInt(rawPrice.replace(",", "")),
                projetManager = data[i].project_manager.NAME,
                project_creator = data[i].project_creator.NAME;

            totalBudget += parseInt(budget);
            //create product cards all
            products += "<div class='projets col-sm-4 product' data-name='" + name + "' data-year='" +
                year + "' data-all='" + "all" + "' data-status='" +
                status + "' data-category = '" + category + "' data-projetManager='" + projetManager +
                "' data-budget='" + budget +
                "' ><div class='product-inner text-center'>Name: " + name + "<br />Created at: " + year +
                "<br />Status: " + status + "<br />Category: " +
                category + "<br />Budget: " +
                budget + "<br />projet Manager: " +
                projetManager +
                "</div></div>";



            // //create dropdown of models
            // if (models.indexOf("<option value='" + model + "'>" + model + "</option>") == -1) {
            //     models += "<option value='" + model + "'>" + model + "</option>";
            // }

            // //create dropdown of types
            // if (types.indexOf("<option value='" + type + "'>" + type + "</option>") == -1) {
            //     types += "<option value='" + type + "'>" + type + "</option>";
            // }


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


        console.log(totalBudget)

        $("#products").html(products);
        $(".filter-year").append(years);
        $(".filter-name").append(names);
        $(".filter-status").append(statusAll);
        $(".filter-category").append(categories);
        $(".filter-projetManager").append(projetManagers);

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

        console.log(filters)
        if (filters == "") {
            $(".product").show();
            getProjectSummary($(".product").show());

        } else {
            $(".product").hide();
            $(".product").hide().filter(filters).show();

            let filtredData = $(".product").filter(filters);
            getProjectSummary(filtredData);
        }
    });

    //on search form submit
    $("#search-form").submit(function(e) {
        e.preventDefault();
        var query = $("#search-form input").val().toLowerCase();

        $(".product").hide();
        $(".product").each(function() {
            var make = $(this).data("make").toLowerCase(),
                model = $(this).data("model").toLowerCase(),
                type = $(this).data("type").toLowerCase();

            if (make.indexOf(query) > -1 || model.indexOf(query) > -1 || type.indexOf(query) > -1) {
                $(this).show();
            }
        });
    });

    function getProjectSummary(filtredData) {
        let projectsData = filtredData;

        let totalBudgetFild = document.getElementById("total-budget");
        let totalProjectFild = document.getElementById("total-project");
        let totalCompleteFild = document.getElementById("total-complete");
        let totalProgresstFild = document.getElementById("total-progress");

        let totalBudget = 0;
        for (var i = 0; i < projectsData.length; i++) {


            totalBudget += parseInt(projectsData[i].dataset.budget);


        }

        totalBudgetFild.innerHTML = totalBudget;
        totalProjectFild.innerHTML = projectsData.length;
        // totalCompleteFild.innerHTML =
        //     totalProgresstFild.innerHTML =
    }
</script>
