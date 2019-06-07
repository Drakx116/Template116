<!-- VUE DE L'AJOUT DE COMPTES -->

<body>
    <div class="main-container">
        <h2> Add </h2>

        <button class="btn-add-choice" id="new-user"> NEW USER </button>
        <button class="btn-add-choice" id="new-admin"> NEW ADMIN </button>

        <?php
            if($data["error"])
            { ?>
                    <div class="error-message">
                        <?php foreach($data as $info){ echo $info; } ?>
                    </div>
              <?php
            }
        ?>

        <div class="new-form-container" id="add-user-form">
            <form method="POST" class="form-registration">
                <h3> New User </h3>
                <label> Gender </label>

                <div class="radio-container">
                    <div class="radio-content">
                        <input type="radio" name="gender" id="male" value="male" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "male") { echo "checked"; } ?> >
                        <label for="male"> Male </label>
                    </div>

                    <div class="radio-content">
                        <input type="radio" name="gender" id="female" value="female" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "female") { echo "checked"; } ?>>
                        <label for="female"> Female </label>
                    </div>
                </div>


                <label for="first-name"> First Name </label>
                <input type="text" name="first-name" id="first-name" placeholder="First Name" value=<?php if(isset($_POST["first-name"])){echo htmlspecialchars($_POST["first-name"]);} ?>>

                <label for="last-name"> Last Name </label>
                <input type="text" name="last-name" id="last-name" placeholder="Last Name" value=<?php if(isset($_POST["last-name"])){echo htmlspecialchars($_POST["last-name"]);} ?>>

                <label for="birthdate"> Birthdate </label>
                <input type="date" name="birthdate" id="birthdate"  min="1900-01-01" max="<?= date("Y-m-d") ?>" value=<?php if(isset($_POST["birthdate"])){echo htmlspecialchars($_POST["birthdate"]);} ?>>

                <label for="job"> Job </label>
                <select name="job" id="job">
                    <option value="">  ------  </option>
                    <option value="Aeronautic"> Aeronautic </option>
                    <option value="Agriculture - Agribusiness"> Agriculture - Agribusiness </option>
                    <option value="Audiovisual - Cinema"> Audiovisual - Cinema </option>
                    <option value="Audit - Accounting"> Audit - Accounting - Management </option>
                    <option value="Automobile">Automobile</option>


                    <option value="Bank">Bank</option>
                    <option value="Building Public Works"> Building Public Works </option>
                    <option value="Biology - Chemistry - Pharmacy">  Biology - Chemistry - Pharmacy </option>

                    <option value="Cleanliness"> Cleanliness </option>
                    <option value="Commerce - Distribution"> Commerce - Distribution </option>
                    <option value="Communication "> Communication  </option>
                    <option value="Craft"> Craft </option>
                    <option value="Creation"> Creation </option>
                    <option value="Culture"> Culture </option>

                    <option value="Defense - Security - Army"> Defense - Security - Army </option>
                    <option value="Documentation - Library"> Documentation - Library </option>

                    <option value="Editon - Book"> Edition - Book </option>
                    <option value="Education"> Education </option>
                    <option value="Environment"> Environment </option>

                    <option value="Fashion - Textile"> Fashion - Textile </option>

                    <option value="Hotel - Catering"> Hotel -Catering </option>
                    <option value="Human Ressources"> Human Ressources </option>
                    <option value="Humanitarian"> Humanitarian </option>
                    <option value="Humanities and Social Sciences"> Humanities and Social Sciences </option>

                    <option value="Immovable"> Immovable </option>
                    <option value="Industry"> Industry </option>
                    <option value="IT - Telecom - Web"> IT - Telecom - Web </option>

                    <option value="Journalism"> Journalism </option>

                    <option value="Languages"> Languages </option>
                    <option value="Law"> Law </option>

                    <option value="Marketing - Advertising"> Marketing - Advertising </option>
                    <option value="Medical"> Medical </option>

                    <option value="Paramedic"> Paramedic </option>
                    <option value="Psychology"> Psychology </option>
                    <option value="Public Function"> Public Function </option>

                    <option value="Railway"> Railway </option>

                    <option value="Trade Fairs - Shows - Congresses"> Trade Fairs - Shows - Congresses </option>

                    <option value="Secreteriat"> Secreteriat </option>
                    <option value="Show"> Show </option>
                    <option value="Social"> Social </option>
                    <option value="Sport"> Sport </option>

                    <option value="Tourism"> Tourism </option>
                    <option value="Transport"> Transport </option>
                </select>


                <h3> Localization </h3>

                <label for="region"> Region </label>
                <input type="text" placeholder="Region" name="region" id="region" value="<?php if(isset($_POST["region"])){echo htmlspecialchars($_POST["region"]);} ?>">

                <label for="country"> Country </label>
                <input type="text" placeholder="Country" name="country" id="country" value="<?php if(isset($_POST["country"])){echo htmlspecialchars($_POST["country"]);} ?>">


                <h3> Account Settings </h3>

                <label for="email"> E-Mail Address </label>
                <input type="text" name="email" id="email" placeholder="E-Mail Address" value=<?php if(isset($_POST["email"])){echo htmlspecialchars($_POST["email"]);} ?>>

                <label for="password"> Password </label>
                <input type="password" name="password" id="password" placeholder="Password">

                <label for="confirm_password"> Confirm Password </label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">

                <input type="submit" name="validateUserAdd" value="Add a new User">
            </form>
        </div>
        <div class="new-form-container" id="add-admin-form">
            <form method="POST" class="form-registration">
                <h3> New Admin </h3>

                <label for="username"> Username </label>
                <input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($_POST["username"])){echo htmlspecialchars($_POST["username"]);} ?>">

                <label for="email"> E-Mail Address </label>
                <input type="text" name="email" id="email" placeholder="E-Mail Address" value=<?php if(isset($_POST["email"])){echo htmlspecialchars($_POST["email"]);} ?>>

                <label for="password"> Password </label>
                <input type="password" name="password" id="password" placeholder="Password">

                <label for="confirm_password"> Confirm Password </label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">

                <input type="submit" name="validateAdminAdd" value="Add a new Admin">
            </form>
        </div>
    </div>
</body>