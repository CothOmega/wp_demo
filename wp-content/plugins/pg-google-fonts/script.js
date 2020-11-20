var googleFonts;
var chosenFonts = [];

function fontLinkBuild() {
    if (chosenFonts.length < 1) {
        document.querySelector('#fontLink').innerHTML = '';
    } else {
        var linkString = `<link href="https://fonts.googleapis.com/css2?`;
        var hrefString = '';
        for (i = 0; i < chosenFonts.length; i++) {
            var prefix = '';
            if (chosenFonts.length > 1 && i !== 0) {
                prefix = "&"
            }
            var ital = '';
            for (k = 0; k < chosenFonts[i].variants.length; k++) {
                if (chosenFonts[i].variants[k].includes('italic')) {
                    ital = "ital,";
                }
            }
            hrefString += prefix + `family=` + chosenFonts[i].family.replace(/ /gi, "+") + `:` + ital;
            for (j = 0; j < chosenFonts[i].variants.length; j++) {
                if (j == 0) {
                    hrefString += 'wght@';
                }
                var semi = '';
                if (chosenFonts[i].variants.length > 1) {
                    semi = ';';
                }
                var tempVariant = chosenFonts[i].variants[j].replace(/italic/gi, "");
                hrefString += tempVariant + semi;
            }
            hrefString += "&display=swap";
        }
        linkString += hrefString + `" rel='stylesheet' />`;
        linkString = linkString.replace(/</gi, '&lt;');
        linkString = linkString.replace(/>/gi, '&gt;');
        document.querySelector('#fontLink').innerHTML = linkString;
    }
}

function fontLinkAdd() {
    var fontObjTemp = {
        family: document.querySelector('#fontFamilies').value,
        variants: []
    };
    for (i = 0; i < document.querySelector('#fontWeights').children.length; i++) {
        if (document.querySelector('#fontWeights').children[i].classList.contains('active')) {
            fontObjTemp.variants.push(document.querySelector('#fontWeights').children[i].innerHTML);
        }
    }
    if (fontObjTemp.variants.length > 0) {
        chosenFonts.push(fontObjTemp);
        fontLinkBuild();
    } else {
        alert("You must select at least one font variant!");
    }
}

function fontLinkClear() {
    chosenFonts = [];
    fontLinkBuild();
}

function loadFonts(data) {
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
                if (googleFonts.items[i].variants[j] !== 'italic' && googleFonts.items[i].variants[j] !== 'regular') {
                    var tempEl = document.createElement('span');
                    tempEl.innerHTML = googleFonts.items[i].variants[j];
                    tempEl.addEventListener('click', function() {
                        fwToggle(event);
                    });
                    document.querySelector('#fontWeights').appendChild(tempEl);                      
                }
            }
        }
    }
}

function gFontList(sort) {
    document.querySelector('#fontFamilies').innerHTML = '';
    fetch('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC_9GgDaQJDkbYJ7WJ7oJYNKky3gjbcahE&sort=' + sort)
    .then(
        res => res.json()
    ).then(
        data => {
            loadFonts(data);
            googleFonts = data;
            familyChange();
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