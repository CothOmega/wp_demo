<?php
/**
 * Plugin Name:       PG Google Fonts
 * Plugin URI:        https://prospergroupcorp.com
 * Description:       Choose Google Fonts to include sitewide.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            PG Dev Team
 * Author URI:        https://prospergroupcorp.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/* 
    Add support for italics, regular & italic without #s, add a table showing what's been selected, and prevent duplicate font families, overwriting it instead
*/

defined('ABSPATH') or die('Oops! You probably got here by mistake. Log in to access this plugin.');

add_option('pg_google_font_link', '');
add_option('pg_google_font_obj', '');
add_option('pg_google_font_force', '');
add_option('pg_google_font_primary', '');

// save form options to WP database
if (isset($_POST['submit'])) {
    update_option('pg_google_font_link', $_POST['gfont-link']);
    update_option('pg_google_font_obj', $_POST['gfont-obj']);
    update_option('pg_google_font_primary', $_POST['gfont-primary']);
    if ($_POST['force-font'] == 'on') {
        update_option('pg_google_font_force', 'checked');
    } else {
        update_option('pg_google_font_force', '');
    }
}

if (get_option('pg_google_font_link') !== '') {
    function pg_google_font_styles() {
        wp_enqueue_style( 'pg-google-fonts', get_option('pg_google_font_link') );
    }
    add_action( 'wp_enqueue_scripts', 'pg_google_font_styles' );
}

if (get_option('pg_google_font_force') == 'checked') {
    function force_font_family() {
echo '<style>
        * {
            font-family: ' . get_option('pg_google_font_primary') . ';
        }
    </style>';
}

    add_action('wp_head', 'force_font_family', 100);
}

function pg_google_fonts_admin() {
    $admin_page_style = '<style>
    #gFontCont p {
        font-size: 18px;
    }
    #gFontCont #fontWeights span {
        margin-right: 5px;
        background-color: rgba(10, 70, 173, 0);
        border: 1px solid #0a46ad;
        padding: 5px 11px;
        color: #0a46ad;
        border-radius: 5px;
        display: inline-block;
        user-select: none;
        cursor: pointer;
        margin-bottom: 5px;
        transition: 300ms;
    }    
    #gFontCont #fontWeights span:hover {
        background-color: rgba(10, 70, 173, .1);
    }
    #gFontCont #fontWeights span.active {
        border: 1px solid #0a46ad;
        background-color: rgba(10, 70, 173, 1);
        color: white;
        transition: 300ms;
    }
    #gFontCont code {
        background-color: #262626;
        color: white;
        border-radius: 5px;
        padding: 5px 11px;
        width: 100%;
        display: none;
    }
    #gFontCont button,
    #gFontCont input[type="submit"] {
        background-color: rgba(10, 70, 173, 1);
        color: white;
        border-radius: 5px;
        padding: 8px 10px;
        font-size: 14px;
        border: none;
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: .05em;
        cursor: pointer;
        margin-right: 5px;
        transition: 300ms;
    }
    #gFontCont button:hover,
    #gFontCont input[type="submit"]:hover {
        background-color: #073075;
        transition: 300ms;
    }
    #gFontCont .button-cont {
        font-size: 0;
        margin: 15px 0;
    }
    select, input[type="text"] {
        border: 1px solid #0a46ad!important;
        border-radius: 5px!important;
        height: 35px;
        font-size: 18px!important;
        position: relative;
    }
    input[type="text"] {
        position: relative;
        min-width: 225px;
        top: 2px;
    }
    .browse-container {
        display: none;
    }
    .autocomplete-container {
        position: relative;
        display: inline-block;
        font-size: 18px;
    }
    .autocomplete-container ul {
        position: absolute;
        left: 1px;
        top: 25px;
        min-width: 224.5px;
        border: 1px solid #0a46ad;
        border-radius: 5px;
        padding: 5px;
        box-sizing: border-box;
        background-color: rgba(255, 255, 255, .95);
        display: none;
    }
    .autocomplete-container ul li {
        margin: 3px 3px;
        user-select: none;
        cursor: pointer;
        transition: 100ms;
        padding: 3px;
    }
    .autocomplete-container ul li:hover {
        background-color: rgba(0, 0, 0, .1);
        transition: 100ms;
    }
    .pg-google-fonts-intro {
        max-width: 750px;
    }
    .save-message {
        font-weight: 700;
        border: 2px solid #16a83d;
        color: #16a83d;
        max-width: 750px;
        padding: 5px 10px;
        display: inline-block;
    }
    #gFontCont button.clear {
        background-color: #cc1414;
        transition: 300ms;
    }
    #gFontCont button.clear:hover {
        background-color: #8f0e0e;
    }
    #gFontCont div#fontWeightCont {
        background-color: rgba(255, 255, 255, .8);
        max-width: 750px;
        border: 1px solid #0a46ad;
        padding: 0 8px;
        border-radius: 8px;
        display: none;
    }
    #gFontCont div#fontWeightCont p {
        margin: 8px 0 3px 0;
    }
    #gFontCont table.selected-fonts {
        background-color: rgba(255, 255, 255, .8);
        width: 768px;
        border: 1px solid #0a46ad;
        padding: 8px 8px;
        border-radius: 8px;
        font-size: 18px;
        margin-top: 15px;
        display: none;
        border-collapse: collapse;
    }
    #gFontCont table tr {

    }
    #gFontCont table td {
        width: 250.6px;
        padding: 8px;
        text-align: center;
        font-size: 14px;
    }
    #gFontCont table th {
        background-color: rgba(10, 70, 173, 1);
        color: white;
        padding: 11px 0;
        text-transform: uppercase;
        letter-spacing: .06em;
    }
    #fontWeightTitle {
        display: none;
    }
    #fontSelectedTitle {
        display: none;
    }
    #gFontCont .svg-inline--fa.fa-trash-alt.fa-w-14 {
        height: 20px;
        cursor: pointer;
    }
    #gFontCont .svg-inline--fa.fa-trash-alt.fa-w-14 path {
        fill: rgba(10, 70, 173, 1);
    }
    #gFontCont .svg-inline--fa.fa-trash-alt.fa-w-14:hover path {
        fill: rgba(10, 70, 173, .7);
    }
</style>';
    $existing_link = '';
    if (get_option("pg_google_font_link") !== '') {
        $existing_link = "&lt;link href='" . get_option('pg_google_font_link') . "' rel='stylesheet' /&gt;";
    }
    $save_message = '';
    if (isset($_POST['gfont-link'])) {
        $save_message = "<p class='save-message'>Fonts and weights have been saved and are active sitewide.</p>";
    }
    $admin_page_body = "<div id='gFontCont'>
    <h1>PG Google Fonts</h1>
    <p class='pg-google-fonts-intro'>Easily add Google Fonts to your site. Choose a font family along with weights and styles which will be applied throughout the site. You will still need to define font styling in the theme, unless you check the \"Attempt to force font everywhere\" box.</p>
    <p>
    </p>
    <span class='autocomplete-container'>
        <input id='autoComplete' type='text' oninput='autoComplete();' autocomplete='off' onfocusout='clearAuto();' placeholder='Type font family name...' />
        <ul id='autocomplete-list'></ul>
        &nbsp;or&nbsp;&nbsp;<button onclick='modeToggle();'>Browse All</button>
    </span>
    <p class='browse-container'>
        Sort by:&nbsp;
        <select id='fontSort'>
            <option>POPULARITY</option>
            <option>ALPHA</option>
            <option>DATE</option>
            <option>TRENDING</option>
        </select>
        &nbsp;Font Families:&nbsp;
        <select id='fontFamilies'>
        </select>&nbsp;or&nbsp;
        <button onclick='modeToggle();'>Search</button>
    </p>
    <h3 id='fontWeightTitle'>Font Weights and Styles:</h3>
    <div id='fontWeightCont'>
        <p id='fontWeights'></p>
    </div>
    <p class='button-cont'>
        <button onclick='fontLinkAdd();'>Add</button>
        <button onclick='fontLinkClear();' class='clear'>Clear All</button>
    </p>
    <h3 id='fontSelectedTitle'>Selected Fonts</h3>
    <table class='selected-fonts'></table>
    <form method='post' action='/wp-admin/admin.php?page=pg-google-fonts'>
        <p class='button-cont'>
            <input type='hidden' id='gfont-link' name='gfont-link' value='" . get_option('pg_google_font_link') . "' />
            <input type='hidden' id='gfont-obj' name='gfont-obj' value='" . get_option('pg_google_font_obj') . "' />
            <input type='hidden' id='gfont-primary' name='gfont-primary' value='" . get_option('pg_google_font_primary') . "' />
            <p>
                <label for='force-font'>Attempt to force font on all elements </label>
                <input type='checkbox' id='force-font' name='force-font' " . get_option('pg_google_font_force') . "/>
            </p>
            <input type='submit' name='submit' value='SAVE' class='save' />
        </p>
    </form>
    " . $save_message . "
    <code id='fontLink'>" . $existing_link . "</code>
    <p id='debugMessage'></p>
</div>";
    $outputHTML = $admin_page_style . $admin_page_body;
    echo $outputHTML;
}

function pg_google_font_register_admin() {
    add_menu_page('Google Fonts', 'Google Fonts', 'update_themes', 'pg-google-fonts', 'pg_google_fonts_admin', 'dashicons-editor-textcolor', null);
}

add_action('admin_menu', 'pg_google_font_register_admin');

function my_admin_add_js() {
    echo "<script>
if (document.querySelector('#gFontCont')) {
    var googleFonts;
    var currentLink = '" . get_option('pg_google_font_obj') . "';
    if (currentLink == '') {
        currentLink = [];
    } else if (typeof(currentLink) == 'string') {
        currentLink = JSON.parse(currentLink);
    }
    var chosenFonts = currentLink;
    var mode = 'search';
    
    function fontLinkBuild() {
        if (chosenFonts.length < 1) {
            document.querySelector('#fontLink').innerHTML = '';
        } else {
            var linkString = `<link href='https://fonts.googleapis.com/css2?`;
            var hrefString = '';
            for (i = 0; i < chosenFonts.length; i++) {
                var prefix = '';
                if (chosenFonts.length > 1 && i !== 0) {
                    prefix = '&'
                }
                var ital = '';
                for (k = 0; k < chosenFonts[i].variants.length; k++) {
                    if (chosenFonts[i].variants[k].includes('Italic')) {
                        ital = 'ital,';
                    }
                }
                hrefString += prefix + `family=` + chosenFonts[i].family.replace(/ /gi, '+') + `:` + ital;
                for (j = 0; j < chosenFonts[i].variants.length; j++) {
                    if (j == 0) {
                        hrefString += 'wght@';
                    }
                    var semi = '';
                    if (chosenFonts[i].variants.length > 1 && j !== (chosenFonts[i].variants.length -1)) {
                        semi = ';';
                    }
                    var binPrefix = '';
                    if (ital == 'ital,' && chosenFonts[i].variants[j].includes(' Italic')) {
                        binPrefix = '1,';
                    }
                    if (ital == 'ital,' && chosenFonts[i].variants[j].includes(' Regular')) {
                        binPrefix = '0,';
                    }
                    var tempVariant = chosenFonts[i].variants[j].slice(0, 3);
                    hrefString += binPrefix + tempVariant + semi;
                }
            }
            hrefString += '&display=swap';
            linkString += hrefString + `' rel='stylesheet' />`;
            // sends link to hidden input field
            document.querySelector('#gfont-link').value = 'https://fonts.googleapis.com/css2?' + hrefString;
            // strips tag endings and replaces with URL encoded version for <code> (debugging only)
            linkString = linkString.replace(/</gi, '&lt;');
            linkString = linkString.replace(/>/gi, '&gt;');
            document.querySelector('#fontLink').innerHTML = linkString;
            // sends chosenFonts object to hidden input gfont-obj
            document.querySelector('#gfont-obj').value = JSON.stringify(chosenFonts);
        }
    }

    function fontTableBuild() {
        let trashIcon = `<svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='trash-alt' class='svg-inline--fa fa-trash-alt fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z'></path></svg>`;
        document.querySelector('.selected-fonts').innerHTML = '';
        let tempHeaderRow = document.createElement('tr');
        let tempTH1 = document.createElement('th');
        tempTH1.innerHTML = 'Font Family';
        let tempTH2 = document.createElement('th');
        tempTH2.innerHTML = 'Font Styles';
        let tempTH3 = document.createElement('th');
        tempTH3.innerHTML = 'Remove';
        tempHeaderRow.appendChild(tempTH1);
        tempHeaderRow.appendChild(tempTH2);
        tempHeaderRow.appendChild(tempTH3);
        document.querySelector('.selected-fonts').appendChild(tempHeaderRow);
        for (i = 0; i < chosenFonts.length; i++) {
            let tempRow = document.createElement('tr');
            let tempCol1 = document.createElement('td');
            let tempCol2 = document.createElement('td');
            let tempCol3 = document.createElement('td');
            tempCol3.innerHTML = trashIcon;
            tempCol3.children[0].dataset.index = i;
            tempCol3.children[0].addEventListener('click', (event) => {
                removeFont(event);
            });
            tempCol1.innerHTML = chosenFonts[i].family;
            for (j = 0; j < chosenFonts[i].variants.length; j++) {
                tempCol2.innerHTML += chosenFonts[i].variants[j] + ' ';
            }
            tempRow.appendChild(tempCol1);
            tempRow.appendChild(tempCol2);
            tempRow.appendChild(tempCol3);
            document.querySelector('.selected-fonts').appendChild(tempRow);
        }
        if (chosenFonts.length > 0) {
            showSelectedFonts();
        }
    }

    fontTableBuild();
    
    function fontLinkAdd() {
        let fontFamily;
        if (document.querySelector('#autoComplete').value !== '') {
            fontFamily = document.querySelector('#autoComplete').value;
        } else if (document.querySelector('#fontFamilies').value !== '') {
            fontFamily = document.querySelector('#fontFamilies').value;           
        }
        var fontObjTemp = {
            family: fontFamily,
            variants: []
        };
        for (i = 0; i < document.querySelector('#fontWeights').children.length; i++) {
            if (document.querySelector('#fontWeights').children[i].classList.contains('active')) {
                fontObjTemp.variants.push(document.querySelector('#fontWeights').children[i].innerHTML);
            }
        }
        if (fontObjTemp.variants.length > 0) {
            chosenFonts.push(fontObjTemp);
            document.querySelector('#gfont-primary').value = chosenFonts[0].family;
            fontTableBuild();
            fontLinkBuild();
            showFontWeights();
            showSelectedFonts();
        } else {
            alert('You must select at least one font variant!');
        }
    }

    function removeFont(e) {
        chosenFonts.splice(e.target.dataset.index, 1);
        if (chosenFonts.length > 0) {
            fontLinkBuild();
            fontTableBuild();
            document.querySelector('#gfont-primary').value = chosenFonts[0].family;
        } else {
            fontLinkClear();
        }
    }
    
    function fontLinkClear() {
        chosenFonts = [];
        fontLinkBuild();
        hideFontWeights();
        document.querySelector('.selected-fonts').innerHTML = '';
        document.querySelector('#gfont-link').value = '';
        document.querySelector('#gfont-obj').value = '';
        document.querySelector('#gfont-primary').value = '';
        document.querySelector('#force-font').checked = false;
        document.querySelector('#autoComplete').value = '';
        hideSelectedFonts();
    }
    
    function loadFonts(data) {
        var blankOption = document.createElement('option');
        document.querySelector('#fontFamilies').appendChild(blankOption);
        for (i = 0; i < data.items.length; i++) {
            var tempOption = document.createElement('option');
            tempOption.innerHTML = data.items[i].family;
            document.querySelector('#fontFamilies').appendChild(tempOption);
        }
    }
    
    function sortChange() {
        gFontList(document.querySelector('#fontSort').value);
    }
    
    function fwToggle(t) {
        if (t.target.classList.contains('active')) {
            t.target.classList.remove('active');
        } else {
            t.target.classList.add('active');
        }
    }
    
    function familyChange() {
        document.querySelector('#fontWeights').innerHTML = '';
        for (i = 0; i < googleFonts.items.length; i++) {
            if (document.querySelector('#fontFamilies').value == googleFonts.items[i].family) {
                for (j = 0; j < googleFonts.items[i].variants.length; j++) {
                    var tempEl = document.createElement('span');
                    tempEl.innerHTML = googleFonts.items[i].variants[j];
                    if (tempEl.innerHTML == 'italic') {
                        tempEl.innerHTML = tempEl.innerHTML.replace('italic', '400 Italic');
                    }
                    if (tempEl.innerHTML == 'regular') {
                        tempEl.innerHTML = tempEl.innerHTML.replace('regular', '400 Regular');
                    }
                    if (tempEl.innerHTML !== 'regular' && tempEl.innerHTML !== 'italic') {
                        if (tempEl.innerHTML.includes('italic')) {
                            tempEl.innerHTML = tempEl.innerHTML.replace('italic', ' Italic');
                        }
                        if (tempEl.innerHTML.length == 3) {
                            tempEl.innerHTML += ' Regular';
                        }
                    }
                    tempEl.addEventListener('click', function() {
                        fwToggle(event);
                    });
                    document.querySelector('#fontWeights').appendChild(tempEl);                      
                }
                showFontWeights();
            } else if (document.querySelector('#autoComplete').value == googleFonts.items[i].family) {
                for (j = 0; j < googleFonts.items[i].variants.length; j++) {
                    var tempEl = document.createElement('span');
                    tempEl.innerHTML = googleFonts.items[i].variants[j];
                    if (tempEl.innerHTML == 'italic') {
                        tempEl.innerHTML = tempEl.innerHTML.replace('italic', '400 Italic');
                    }
                    if (tempEl.innerHTML == 'regular') {
                        tempEl.innerHTML = tempEl.innerHTML.replace('regular', '400 Regular');
                    }
                    if (tempEl.innerHTML !== 'regular' && tempEl.innerHTML !== 'italic') {
                        if (tempEl.innerHTML.includes('italic')) {
                            tempEl.innerHTML = tempEl.innerHTML.replace('italic', ' Italic');
                        }
                        if (tempEl.innerHTML.length == 3) {
                            tempEl.innerHTML += ' Regular';
                        }
                    }
                    tempEl.addEventListener('click', function() {
                        fwToggle(event);
                    });
                    document.querySelector('#fontWeights').appendChild(tempEl);                      
                }
                showFontWeights();
            }
        }
    }
    
    function gFontList(sort) {
        document.querySelector('#fontFamilies').innerHTML = '';
        fetch('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAQLun4w2QjzTiPnAGpAbmWh2RvaDAOt6c&sort=' + sort)
        .then(
            res => res.json()
        ).then(
            data => {
                loadFonts(data);
                googleFonts = data;
                // familyChange();
            }
        )
    }
    
    gFontList('POPULARITY');
    
    document.querySelector('#fontSort').addEventListener('change', function() {
        sortChange();
    })
    
    document.querySelector('#fontFamilies').addEventListener('change', function() {
        familyChange();
    })

    function modeToggle() {
        if (mode == 'search') {
            mode = 'browse';
            document.querySelector('.autocomplete-container').style.display = 'none';
            document.querySelector('.browse-container').style.display = 'block';
        } else {
            mode = 'search';
            document.querySelector('.autocomplete-container').style.display = 'block'; 
            document.querySelector('.browse-container').style.display = 'none';           
        }
        clearAuto();
        clearBrowse();
        unsetAutoValue();
        hideFontWeights();
    }

    // autocomplete based on googleFonts array, which is pulled upon init
    let autoArr = [];
    function autoComplete() {
        autoArr = [];
        document.querySelector('#autocomplete-list').innerHTML = '';
        // push relevant, unordered font families into an array
        for (i = 0; i < googleFonts.items.length; i++) {
            if (googleFonts.items[i].family.toUpperCase().includes(document.querySelector('#autoComplete').value.toUpperCase())) {
                autoArr.push(googleFonts.items[i].family);
            }
        }
        // sort the array by how close the typed phrase is to the beginning of the array string
        // output strings as li elements to autocomplete-list ul
        for (j = 0; j < autoArr.length; j++) {
            if (document.querySelector('#autoComplete').value !== '') {
                let tempEl = document.createElement('li');
                tempEl.innerHTML = autoArr[j];
                tempEl.addEventListener('click', (event) => {
                    document.querySelector('#autoComplete').value = event.target.innerText;
                    document.querySelector('#autocomplete-list').style.display = 'none';
                    document.querySelector('#autocomplete-list').innerHTML = '';
                    autoArr = [];
                    familyChange();
                });
                document.querySelector('#autocomplete-list').appendChild(tempEl);
                if (j == 4) {
                    break;
                }
            }
        }
        // display the autocomplete-list ul
        if (document.querySelector('#autoComplete').value !== '' && autoArr.length > 0) {
            document.querySelector('#autocomplete-list').style.display = 'block';
        } else {
            document.querySelector('#autocomplete-list').style.display = 'none';
        }
    }

    function clearAuto() {
        setTimeout(() => {
            document.querySelector('#autocomplete-list').innerHTML = '';
            document.querySelector('#autocomplete-list').style.display = 'none';
            autoArr = [];
        }, 150);
    }

    function unsetAutoValue() {
        document.querySelector('#autoComplete').value = '';
    }

    function clearBrowse() {
        document.querySelector('#fontFamilies').value = '';
        document.querySelector('#fontWeights').innerHTML = '';
    }

    function hideFontWeights() {
        document.querySelector('#fontWeightCont').style.display = 'none';
        document.querySelector('#fontWeightTitle').style.display = 'none';
    }

    function showFontWeights() {
        document.querySelector('#fontWeightCont').style.display = 'block';
        document.querySelector('#fontWeightTitle').style.display = 'block';
    }

    function hideSelectedFonts() {
        document.querySelector('#fontSelectedTitle').style.display = 'none';
        document.querySelector('.selected-fonts').style.display = 'none';       
    }

    function showSelectedFonts() {
        document.querySelector('#fontSelectedTitle').style.display = 'block';
        document.querySelector('.selected-fonts').style.display = 'block';        
    }
} // condition checking to see if we're on pg google fonts page
    </script>";
}

add_action('admin_footer', 'my_admin_add_js');