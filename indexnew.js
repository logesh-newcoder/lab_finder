var a = document.getElementById("show");
var deleteButton = document.getElementById("right");
deleteButton.style.display = "none"; 

var rows = {
    a: ["arowa", "arowb", "arowc", "arowd", "arowe"],
    b: ["browa", "browb", "browc", "browd", "browe"],
    c: ["crowa", "crowb", "crowc", "crowd", "crowe"],
    d: ["drowa", "drowb", "drowc", "drowd", "drowe"],
    e: ["erowa", "erowb", "erowc", "erowd", "erowe"],
    f: ["frowa", "frowb", "frowc", "frowd", "frowe"]
};

function deliver(content) {
    a.value = content.textContent; 
    deleteButton.style.display = "block";
}

function deleteContent() {
    a.value = ""; 
    deleteButton.style.display = "none"; 
    checkPassword();
}

function checkPassword() {
    var val = prompt("Please enter the password:");
    var pas = "edit";    
    if (val === pas) {
        console.log("edit");
        var text=prompt("");
        a.value=text;
        localStorage.setItem("content",a.innerText)
    } else {
        alert("Password is wrong");
    }
}

function createRowFunctions(row) {
    rows[row].forEach(id => {
        window[id] = function() {
            deliver(document.getElementById(id));
        };
    });
}

for (let row in rows) {
    createRowFunctions(row);
}

deleteButton.addEventListener("click", function(event) {
    event.preventDefault(); 
    deleteContent();
});

a.addEventListener("dblclick", checkPassword); 
