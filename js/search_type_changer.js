let textTypeSelected = true;
let boxElement = document.getElementById("search_box");

function changeToCalendar() {
    if (textTypeSelected) {
        boxElement.type = "date";
        textTypeSelected = false;
    }
}

function changeToText() {
    if (!textTypeSelected) {
        boxElement.type = "text";
        boxElement.value = "";
        textTypeSelected = true;
    }
}

// add event listeners
document.getElementById("projects_button").onclick = changeToText;
document.getElementById("authors_button").onclick = changeToText;

let dateButton = document.getElementById("date_button");
dateButton.onclick = changeToCalendar;

// Check the date button
document.addEventListener('readystatechange', event => {
    if (dateButton.checked === 'checked' || dateButton.checked === true) {
        if (event.target.readyState === "complete") {
            changeToCalendar();
        }
    }
}, false);
