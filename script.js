const insertButton = document.getElementById('ins');
const deleteButton = document.getElementById('del');
const infoTextarea = document.getElementById('show');
const selectclass = document.getElementById('classname');

function showInfo(className) {
    selectclass.value=className;
    selectclass.setAttribute('name', 'classname');
    console.log(selectclass.value);
    infoTextarea.value = `Information about ${className}`;
    deleteButton.style.display = 'block';
    insertButton.style.display = 'none'; 
}

function deleteInfo(receiver) {
    var val = prompt("Please enter the password:");
    var pas = "edit";    
    if (val === pas) {
        console.log("edit");
        deleteButton.style.display = 'none';     
        insertButton.style.display = 'block'; 
        infoTextarea.removeAttribute('readonly');
        selectclass.setAttribute('name', 'classname');
    } else {
        alert("Password is wrong");
    }
}

function insertInfo(){
    console.log(selectclass.value);
    console.log(infoTextarea.value);
    insertButton.style.display = 'none'; 
}
