<!-- VUE DE L'EDITION DE COMPTES DE LA SECTION ADMINISTRATION -->

<?php
    $user = "";
    foreach($data as $infos) { $user = $infos; }
?>
<body>
    <div class="main-container">
        <h2> Edit User #<?= $user->getId() ?> </h2>

        <form class="form-registration" method="POST">
            <label> Gender </label>

            <div class="radio-container">
                <div class="radio-content">
                    <input type="radio" name="gender" id="male" value="male" <?php if($user->getGender() == "male") { echo "checked"; } ?> >
                    <label for="male"> Male </label>
                </div>

                <div class="radio-content">
                    <input type="radio" name="gender" id="female" value="female" <?php if($user->getGender() == "female") { echo "checked"; } ?>>
                    <label for="female"> Female </label>
                </div>
            </div>


            <label for="first-name"> First Name </label>
            <input type="text" name="first-name" id="first-name" placeholder="First Name" value=<?= $user->getFirstName() ?>>

            <label for="last-name"> Last Name </label>
            <input type="text" name="last-name" id="last-name" placeholder="Last Name" value=<?= $user->getLastName() ?>>

            <label for="birthdate"> Birthdate </label>
            <input type="date" name="birthdate" id="birthdate"  min="1900-01-01" max="<?= date("Y-m-d") ?>" value=<?= $user->getBirthdate() ?>>

            <br>
            <input type="checkbox" id="check-job" name="check-job">
            <label id="checkbox-label" for="check-job"> Check to select a new job. </label>

            <div id="hide-select">
                <label for="job"> New Job </label>
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
            </div>
            <input type="text" name="current-job" hidden value="<?= $user->getJob() ?>">

            <label for="region"> Region </label>
            <input type="text" name="region" id="region" value="<?= $user->getRegion() ?>">

            <label for="country"> Country </label>
            <input type="text" name="country" id="country" value="<?= $user->getCountry() ?>">

            <input type="submit" name="validateUserEdit" value="Update">
        </form>
    </div>
</body>