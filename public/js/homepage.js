let photoCardsAll = document.querySelectorAll(".photoCard");

for (let i = 0; i < photoCardsAll.length; i++) {
    photoCardsAll[i].addEventListener("click", setModalContentPhotoView);
}

// DROP DOWN JS
function toggleClass(elem, className) {
    if (elem.className.indexOf(className) !== -1) {
        elem.className = elem.className.replace(className, "");
    } else {
        elem.className = elem.className.replace(/\s+/g, " ") + " " + className;
    }

    return elem;
}

function toggleDisplay(elem) {
    const curDisplayStyle = elem.style.display;

    if (curDisplayStyle === "none" || curDisplayStyle === "") {
        elem.style.display = "block";
    } else {
        elem.style.display = "none";
    }
}

function toggleMenuDisplay(e) {
    const dropdown = e.currentTarget.parentNode;
    const menu = dropdown.querySelector(".menu");
    const icon = dropdown.querySelector(".fa-caret-down");

    toggleClass(menu, "hide");
    toggleClass(icon, "rotate-180");
}

function handleOptionSelected(e) {
    toggleClass(e.target.parentNode.parentNode, "hide");

    const id = e.target.id;
    const newValue = e.target.textContent + " ";
    const titleElem = document.querySelector(".dropdown .title");
    const icon = document.querySelector(".dropdown .title .fa-caret-down");

    titleElem.textContent = newValue;
    titleElem.appendChild(icon);

    //trigger custom event
    document
        .querySelector(".dropdown .title")
        .dispatchEvent(new Event("change"));
    //setTimeout is used so transition is properly shown
    setTimeout(() => toggleClass(icon, "rotate-180", 0));
}

function handleTitleChange(e) {
    const result = document.getElementById("result");

    result.innerHTML = "The result is: " + e.target.textContent;
}

//get elements
const dropdownTitle = document.querySelector(".dropdown .title");
const dropdownOptions = document.querySelectorAll(".dropdown .option");

//bind listeners to these elements
dropdownTitle.addEventListener("click", toggleMenuDisplay);

dropdownOptions.forEach((option) =>
    option.addEventListener("click", handleOptionSelected)
);

document
    .querySelector(".dropdown .title")
    .addEventListener("change", handleTitleChange);
