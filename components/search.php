<?php
include('auth/database.php');
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conditions = array();
    $params = array();

    $stype = isset($_POST["stype"]) ? $_POST["stype"] : "any";
    if ($stype != "any") {
        $conditions[] = "stype = ?";
        $params[] = $stype;
    }

    $type = isset($_POST["type"]) ? $_POST["type"] : "any";
    if ($type != "any") {
        $conditions[] = "type = ?";
        $params[] = $type;
    }

    $location = isset($_POST["location"]) ? $_POST["location"] : "any";
    if ($location != "any") {
        $conditions[] = "state = ?";

        $conditions[] = "state = ?";
        $params[] = $location;
    }

    $bedrooms = isset($_POST["bedrooms"]) ? $_POST["bedrooms"] : "any";
    if ($bedrooms != "any") {
        $conditions[] = "bedroom = ?";
        $params[] = $bedrooms;
    }

    $bathrooms = isset($_POST["bathrooms"]) ? $_POST["bathrooms"] : "any";
    if ($bathrooms != "any") {
        $conditions[] = "bathroom = $bathrooms";

        $conditions[] = "bathroom = ?";
        $params[] = $bathrooms;
    }

    $size = isset($_POST["size"]) ? $_POST["size"] : "";
    if (!empty($size)) {
        $conditions[] = "size = ?";
        $params[] = $size;
    }

    $min_price = isset($_POST["min-price"]) ? $_POST["min-price"] : "";
    if (!empty($min_price)) {
        $conditions[] = "price = ?";
        $params[] = $min_price;
    }

    $max_price = isset($_POST["max-price"]) ? $_POST["max-price"] : "";
    if (!empty($max_price)) {
        $conditions[] = "price = ?";
        $params[] = $max_price;
    }
        $sql = "SELECT pid, title, size, bathroom, bedroom, price, feature, pimage FROM property";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $stmt = mysqli_prepare($link, $sql);

        if (!empty($params)) {
            $types = str_repeat('s', count($params));  // Assuming all parameters are strings
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

}
        try {
            ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="search-section">
                <div class="container">
                        <div class="select-wrapper select-smaill" id='stype' name="stype">
                            <p>
                                Rent or Sale
                            </p>
                            <select class='elselect'>
                                <option value="any">any</option>
                                <option value="potato-chips">Rent</option>
                                <option value="chips-and-salsa">Sale</option>
                            </select>
                        </div>
                        <div class="select-wrapper select-big" id='type' name="type">
                            <p>
                                Property type
                            </p>
                            <select class='elselect'>
                                <option value="any">any</option>
                                <option value="bunglow">Bunglow</option>
                                <option value="flat">Flat</option>
                                <option value="apartment">Apartment</option>
                                <option value="office">Office</option>
                            </select>
                        </div>
                        <div class="select-wrapper select-big">
                            <p>
                                locations
                            </p>
                            <select class='elselect' id="state" name="state">
                                    <option disabled selected>--Select State--</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="FCT">Federal Capital Territory</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                </select>
                        </div>
                        <div class="select-wrapper select-medium">
                            <p>
                                Bedrooms
                            </p>
                            <select class='elselect'>
                                <option value="any">any</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>
                        </div>
                        <div class="select-wrapper select-medium">
                            <p>
                                Bathrooms
                            </p>
                            <select class='elselect'>
                                <option value="any">any</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>
                        </div>
                        <div class="select-wrapper select-small">
                            <p>
                                Sq ft
                            </p>
                          <input type="number" name="size" id="size" />
                        </div>
                        <div class="select-wrapper select-small">
                            <p>
                                Min Price
                            </p>
                            <input type="number" name="min-price" id="min-price"/>
                        </div>
                        <div class="select-wrapper select-small">
                            <p>
                                Max price
                            </p>
                            <input type="number" name="max-price" id="max-price"/>
                        </div>
                        <input type="submit" value="search" class='yellow-btn'/>
                    </form>
   <?php if (isset($_GET['search']) && isset($result)) { ?>
<div class="recent-listings">
    <div class="container">
        <div class="title-box">
            <h3>Search Results Listing</h3>
            <div class="bordered"></div>
        </div>
        <div class="row">
            <?php
            // Assuming $result contains the search results
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-12 listing-single-item">';
                echo '<div class="card mt-3">';
// Featured Label
                if ($row['feature']) {
                    echo '<a href="#" class="featured mt-1 mb-2 ml-1"><i class="fa fa-star"></i>featured</a>';
                }
                // Property Image
                $imageSource = isset($row['pimage']) ? $row['pimage'] : 'img/default-property-image.jpg';
                echo '<img class="card-img-top" src="' . $imageSource . '" alt="' . $row['title'] . '">';

                echo '<div class="card-body">';

                // Property Type Icon
                echo '<a href="#" class="fa fa-home property-type-icon"></a>';



                // Property Title
                echo '<h4 class="card-title"><a href="#">' . $row['title'] . '</a></h4>';

                // Property Features
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"><span class="fa fa-arrows-alt"></span>' . $row['size'] . ' Sq Ft</li>';
                echo '<li class="list-group-item"><span class="fa fa-male"></span>' . $row['bathroom'] . ' bathrooms</li>';
                echo '<li class="list-group-item"><span class="fa fa-inbox"></span>' . $row['bedroom'] . ' bedrooms</li>';
                echo '</ul>';

                // Price and Details Buttons
                echo '<div class="buttons-wrapper">';
                echo '<a href="#" class="yellow-btn">$' . $row['price'] . '</a>';
                echo '<a href="property-details.php?pid=' . $row['pid'] . '" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>';
                echo '</div>';

                echo '</div>'; // Closing card-body
                echo '</div>'; // Closing card
                echo '</div>'; // Closing col-md-4
            }
//            mysqli_close($link);
            ?>
            </div>
          </div>
        </div>
    <?php }?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <?php
        } finally {
            mysqli_close($link);
        }
        ?>