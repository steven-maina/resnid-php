<!DOCTYPE HTML>

<html>

<head>
  <title>Registration</title>

      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
  .custom-element {
    padding-left: 50px;
    color: blue;
    font-weight: 15;
    align-content: center;
  }
  .panel-heading{
    padding-left: 30px;
    color: blue;
    font-weight: 30;
    align-content: center; 
  }
  .container {
    align-content: center;
    padding-top: 10px;
  }
  .right{
    align-items: flex-end;
  }
</style>

</head>

<body>



<?php
include "database.php";

if(isset($_POST['op'])) {
    $op = $_POST['op'];

if ($op == "save") {
        $name = mysqli_real_escape_string($link, $_POST['name'] ?? '');
        $email = mysqli_real_escape_string($link, $_POST['email'] ?? '');
        $phone = mysqli_real_escape_string($link, $_POST['phone'] ?? '');
        $contact_person = mysqli_real_escape_string($link, $_POST['contact_person'] ?? '');
        $contact_phone = mysqli_real_escape_string($link, $_POST['contact_phone'] ?? '');
        $currentCountry = mysqli_real_escape_string($link, $_POST['current_country'] ?? '');
        $currentAddress = mysqli_real_escape_string($link, $_POST['current_address'] ?? '');
        $homeAddress = mysqli_real_escape_string($link, $_POST['home_address'] ?? '');
        $homeState = mysqli_real_escape_string($link, $_POST['home_state'] ?? '');
        $pass = mysqli_real_escape_string($link, $_POST['pass1'] ?? '');
        $pass2 = mysqli_real_escape_string($link, $_POST['pass2'] ?? '');
        $id = mysqli_real_escape_string($link, $_POST['id'] ?? '');
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);    
    $role="client";
    if (empty($name)) {
        $errorFields[] = 'Full Name';
    }
    if (empty($email)) {
        $errorFields[] = 'Email';
    }
    if (empty($phone)) {
        $errorFields[] = 'Phone';
    }
    if (empty($contact_person)) {
        $errorFields[] = 'Contact Person';
    }
    if (empty($contact_phone)) {
        $errorFields[] = 'Contact person Phone';
    }
    if (empty($currentCountry)) {
        $errorFields[] = 'Current Country';
    }
    if (empty($currentAddress)) {
        $errorFields[] = 'Current Country';
    }
    if (empty($homeAddress)) {
        $errorFields[] = 'Home Address';
    }
    if (empty($pass)) {
        $errorFields[] = 'Password';
    }
    if (empty($id)) {
        $errorFields[] = 'ID Number';
    }
    if (!empty($errorFields)) {
        ?>
        <div class="container p-3" id="errorPanel" style="<?php echo $error ? 'display: block;' : 'display: none;'; ?>">
            <div class="panel panel-danger" style="position: relative;">
                <button type="button" class="btn btn-danger" style="position: absolute; top: 5px; right: 5px;" onclick="closeErrorPanel()">X</button>
                <div class="panel-heading">Error!</div>
                <div class="panel-body">Your failed registration. The following fields are empty: <?php echo implode(', ', $errorFields); ?>. Please fill in all required fields.</div>
            </div>
        </div>
        <?php
    }
    elseif($pass!==null && $pass!==$pass2){
        ?>
                <div class="container p-3" id="errorPanel" style="<?php echo $error ? 'display: block;' : 'display: none;'; ?>">
            <div class="panel panel-danger" style="position: relative;">
                <button type="button" class="btn btn-danger" style="position: absolute; top: 5px; right: 5px;" onclick="closeErrorPanel()">X</button>
                <div class="panel-heading">Error!</div>
                <div class="panel-body">Your Password and Confirm Password fields Do not match!.</div>
            </div>
        </div>
    <?php 
    }    
    else{
    // Check if the user with the given email, phone, or ID already exists
    $checkUserQuery = "SELECT * FROM users WHERE email = ? OR phone = ? OR id = ?";
    $stmt = mysqli_prepare($link, $checkUserQuery);

    mysqli_stmt_bind_param($stmt, "sss", $email, $phone, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        ?>
        <div class="container p-3">
            <div class="panel panel-danger">
                <div class="panel-heading">Error: !</div>
                <div class="panel-body">Error: User with this email, phone, or ID already exists.</div>
            </div>
        </div>
        <?php
    } else {

        $insertQuery = "INSERT INTO users (name, email, phone, current_resindent_country, current_address, home_address, home_state, password, id_no, role, contact_person, contact_phone)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
            $insertStmt = mysqli_prepare($link, $insertQuery);    
            mysqli_stmt_bind_param($insertStmt, "ssssssssssss", $name, $email, $phone, $currentCountry, $currentAddress, $homeAddress, $homeState, $hashedPassword, $id, $role, $contact_person, $contact_phone);
            mysqli_stmt_execute($insertStmt);

       if (mysqli_error($link)) {
        ?>
        <div class="container p-3" id="errorPanel" style="<?php echo $error ? 'display: block;' : 'display: none;'; ?>">
    <div class="panel panel-danger" style="position: relative;">
        <button type="button" class="btn btn-danger" style="position: absolute; top: 5px; right: 5px;" onclick="closeErrorPanel()">X</button>
        <div class="panel-heading">Error!</div>
        <div class="panel-body">Your failed registration. Please try again later.</div>
    </div>
</div>
        <?php
    } else {
        ?>
        <!-- <div class="container p-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Success!</div>
                <div class="panel-body">Your registration was successful.</div>
            </div>
        </div> -->

        <script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Your registration was successful.',
    });
</script>
        <?php
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($insertStmt);
    header("Location:login.php");
}
}
}
}
?>
<br/>
<br/>
<div class="container">
    <div class="panel panel-default">
                <div class="panel-heading">Registration form</div>
        <div class="panel-body">
            <form id="registrationForm" method="POST" action="registration.php">
                <div id="step1">
                    <h4 class="custom-element"> Personal Information </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label> Full Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Full Name as Per ID" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"  required />
                            </div>

                            <div class="form-group mb-2">
                                <label>National ID:</label>
                                <input type="number" class="form-control"  name="id" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>"  required />
                            </div>

                            <div class="form-group mb-2">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />
                            </div>

                            <div class="form-group mb-2">
                                <label>Phone:</label>
                                <input type="text" class="form-control" name="phone" autocomplete="off" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Contact person Full Name:</label>
                                <input type="text" class="form-control" name="contact_person" placeholder="Full Name as Per ID" autocomplete="off" value="<?php echo isset($_POST['contact_person']) ? htmlspecialchars($_POST['contact_person']) : ''; ?>" required />
                            </div>

                            <div class="form-group mb-2">
                                <label>Contact person Phone:</label>
                                <input type="text" class="form-control" name="contact_phone" autocomplete="off" value="<?php echo isset($_POST['contact_phone']) ? htmlspecialchars($_POST['contact_phone']) : ''; ?>"  required />
                            </div>

                            <div class="form-group mb-2">
                            <label>Password:</label>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control" name="pass1" autocomplete="off" value="<?php echo isset($_POST['pass1']) ? htmlspecialchars($_POST['pass1']) : ''; ?>" required />
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                            <div class="form-group mb-2">
                            <label>Password confirmation:</label>
                            <div class="input-group">
                                <input type="password" id="passwordConfirmation" class="form-control" name="pass2" autocomplete="off" value="<?php echo isset($_POST['pass2']) ? htmlspecialchars($_POST['pass2']) : ''; ?>" required />
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        

                        <style>
                            .input-group {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            }
                        </style>


                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary p-20" onclick="nextStep()">Next</button>                
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Have an account already? &nbsp;<a href="../auth/login.php" class="active">Login</a>                    
                    
                </div>

                <!-- Step 2: Address Information -->

                <div id="step2" style="display: none;">
                    <h5 class="custom-element">Address Information</h5>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                        <label>Current Country</label>
                        <select id="country" name="current_country" class="form-control" value="<?php echo isset($_POST['current_country']) ? htmlspecialchars($_POST['current_country']) : ''; ?>"  required>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                        <label>Current location Address</label>
                        <input type="text" class="form-control" name="current_address" value="<?php echo isset($_POST['current_address']) ? htmlspecialchars($_POST['current_address']) : ''; ?>"  required />
                        </div><br/>
                        <div class="col-md-6">
                        <label>Nigerian Home address</label>
                        <input type="text" class="form-control" name="home_address" value="<?php echo isset($_POST['home_address']) ? htmlspecialchars($_POST['home_address']) : ''; ?>"  required />
                        </div>
                        <br/>
                        <div class="col-md-6">
                        <label>Nigerian Home State</label>
                            <select class="form-control"  name="home_state" value="<?php echo isset($_POST['home_state']) ? htmlspecialchars($_POST['home_state']) : ''; ?>"  required>
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
                    </div>
                    <br/>
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                    <input type="submit" class="btn btn-primary" onclick="submitForm()" value="Save data" />

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Have an account already? &nbsp;<a href="../auth/login.php" class="active">Login</a>
                </div>

                <input type="hidden" name="op" value="save" />
            </form>
        </div>
    </div>
</div>


<script>
    function nextStep() {
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';
    }
    function submitForm() {
        console.log("Submit form called");
        document.getElementById('registrationForm').submit();
    }

        function closeErrorPanel() {
            document.getElementById('errorPanel').style.display = 'none';
        }
   
        document.getElementById('togglePassword').addEventListener('click', function() {
        togglePasswordVisibility('password', 'eyeIcon');
    });

    document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
        togglePasswordVisibility('passwordConfirmation', 'eyeIconConfirmation');
    });

    function togglePasswordVisibility(inputId, eyeIconId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = document.getElementById(eyeIconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<!-- Include SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
