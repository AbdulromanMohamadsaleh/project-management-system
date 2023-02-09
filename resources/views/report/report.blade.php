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
@include('include.header')
<body>
    @include('include.sidebar')
    <br>
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
                    <select data-filter="make" class="filter-make filter form-control">
                        <option value="">Select Make</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="model" class="filter-model filter form-control">
                        <option value="">Select Model</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="type" class="filter-type filter form-control">
                        <option value="">Select Type</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="price" class="filter-price filter form-control">
                        <option value="">Select Price Range</option>
                        <option value="">Show All</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="row" id="products">

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
    var data = [{
            "make": "Gibson",
            "model": "Les Paul",
            "type": "Electric",
            "price": "$3,000",
            "image": "http://www.sweetwater.com/images/items/120/LPST5HTHDCH-medium.jpg?9782bd"
        },
        {
            "make": "Gibson",
            "model": "SG",
            "type": "Electric",
            "price": "$1,500",
            "image": "http://www.sweetwater.com/images/items/120/SGSEBCH-medium.jpg?e69cfe"
        },
        {
            "make": "Fender",
            "model": "Telecaster",
            "type": "Electric",
            "price": "$2,000",
            "image": "http://www.sweetwater.com/images/items/120/TelePLMPHB-medium.jpg?28e48b"
        },
        {
            "make": "Fender",
            "model": "Stratocaster",
            "type": "Electric",
            "price": "$2,000",
            "image": "http://www.sweetwater.com/images/items/120/StratAMM3SB2-medium.jpg?dfd0a9"
        },
        {
            "make": "Gretsch",
            "model": "White Falcon",
            "type": "Electric",
            "price": "$5,000",
            "image": "http://www.sweetwater.com/images/items/120/G613655GE-medium.jpg?9bfb0e"
        },
        {
            "make": "Paul Reed Smith",
            "model": "Custom 24",
            "type": "Electric",
            "price": "$5,000",
            "image": "http://www.sweetwater.com/images/items/120/HBII10BGWB-medium.jpg?982763"
        },
        {
            "make": "Gibson",
            "model": "Hummingbird",
            "type": "Acoustic",
            "price": "$2,500",
            "image": "http://www.sweetwater.com/images/items/120/SSHBHCNP-medium.jpg?11fbea"
        }
    ];

    var products = "",
        makes = "",
        models = "",
        types = "";

    for (var i = 0; i < data.length; i++) {
        var make = data[i].make,
            model = data[i].model,
            type = data[i].type,
            price = data[i].price,
            rawPrice = price.replace("$", ""),
            rawPrice = parseInt(rawPrice.replace(",", "")),
            image = data[i].image;

        //create product cards
        products += "<div class='col-sm-4 product' data-make='" + make + "' data-model='" + model + "' data-type='" +
            type + "' data-price='" + rawPrice + "'><div class='product-inner text-center'><img src='" + image +
            "'><br />Make: " + make + "<br />Model: " + model + "<br />Type: " + type + "<br />Price: " + price +
            "</div></div>";

        //create dropdown of makes
        if (makes.indexOf("<option value='" + make + "'>" + make + "</option>") == -1) {
            makes += "<option value='" + make + "'>" + make + "</option>";
        }

        //create dropdown of models
        if (models.indexOf("<option value='" + model + "'>" + model + "</option>") == -1) {
            models += "<option value='" + model + "'>" + model + "</option>";
        }

        //create dropdown of types
        if (types.indexOf("<option value='" + type + "'>" + type + "</option>") == -1) {
            types += "<option value='" + type + "'>" + type + "</option>";
        }
    }

    $("#products").html(products);
    $(".filter-make").append(makes);
    $(".filter-model").append(models);
    $(".filter-type").append(types);

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

        if (filters == "") {
            $(".product").show();
        } else {
            $(".product").hide();
            $(".product").hide().filter(filters).show();
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
</script>