var a = document.getElementById("show");
var deleteButton = document.getElementById("right");
deleteButton.style.display = "none";

var selectedElement = null;

function arowa() {
    updateInputValue('arowa');
}
function arowb() {
    updateInputValue('arowb');
}
function arowc() {
    updateInputValue('arowc');
}
function arowd() {
    updateInputValue('arowd');
}
function arowe() {
    updateInputValue('arowe');
}

function browa() {
    updateInputValue('browa');
}
function browb() {
    updateInputValue('browb');
}
function browc() {
    updateInputValue('browc');
}
function browd() {
    updateInputValue('browd');
}
function browe() {
    updateInputValue('browe');
}

function crowa() {
    updateInputValue('crowa');
}
function crowb() {
    updateInputValue('crowb');
}
function crowc() {
    updateInputValue('crowc');
}
function crowd() {
    updateInputValue('crowd');
}
function crowe() {
    updateInputValue('crowe');
}

function drowa() {
    updateInputValue('drowa');;
}
function drowb() {
    updateInputValue('drowd');
}
function drowc() {
    updateInputValue('drowc');
}
function drowd() {
    updateInputValue('drowd');
}
function drowe() {
    updateInputValue('drowe');
}

function erowa() {
    updateInputValue('erowa');
}
function erowb() {
    updateInputValue('erowb');
}
function erowc() {
    updateInputValue('erowc');
}
function erowd() {
    updateInputValue('erowd');
}
function erowe() {
    updateInputValue('erowe');
}

function frowa() {
    updateInputValue('frowa');
}
function frowb() {
    updateInputValue('frowb');
}
function frowc() {
    updateInputValue('frowc');
}
function frowd() {
    updateInputValue('frowd');
}
function frowe() {
    updateInputValue('frowe');
}

function deliver(content) {
    a.value = content.textContent;
    deleteButton.style.display = "block";
    selectedElement = content;
}

function dele() {
    a.value = "";
    deleteButton.style.display = "none";
    selectedElement = null;
}

function checkPassword() {
    var val = prompt("Please enter the password:");
    var pas = "edit";
    if (val === pas) {
        console.log("edit");
        var newText = prompt("Enter new text:");
        a.value = newText;

        if (selectedElement) {
            selectedElement.textContent = newText;
        }
        
        localStorage.setItem("a", newText);
    } else {
        alert("Password is wrong");
    }
}

deleteButton.addEventListener("click", function(event) {
    event.preventDefault();
    dele();
});

window.onload = function() {
    const storedContent = localStorage.getItem("a");
    if (storedContent) {
        a.value = storedContent;
        deleteButton.style.display = "block";
    }
};


let currentSelectedElement = null;

function updateInputValue(elementId) {
    currentSelectedElement = document.getElementById(elementId);
    document.getElementById('show').value = currentSelectedElement.innerText;
}

function updateClassContent() {
    if (currentSelectedElement) {
        currentSelectedElement.innerText = document.getElementById('show').value;
    }
}

document.getElementById('show').addEventListener('change', updateClassContent);

document.getElementById('show').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        updateClassContent();
        event.preventDefault();
    }
});
