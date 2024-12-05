let submitButton = document.querySelector("#sub");
let deleteButton = document.querySelector("#del");
let infoTextarea = document.querySelector("#show");
let selectedClassInput = document.querySelector("#classname");
let selectUpdate = document.querySelector("#classupdate");
let classIdInput = document.querySelector("#classid");

const correctPassword = "labaccess"; // Define correct password once

submitButton.style.display = "none";
deleteButton.style.display = "none";

// Function to display class information when a class is selected
function showInfo(className, item) {
    deleteButton.style.display = "block";
    
    // Set class name and ID in the input fields
    selectedClassInput.value = item.textContent;
    let classInfoElement = document.getElementById(className);
    let classId = classInfoElement.previousElementSibling.textContent.trim();
    classIdInput.value = classId;
    
    // Get class date and content from the PHP table structure
    let classDate =classInfoElement.nextElementSibling.textContent.trim();
    selectUpdate.value = classDate;
    
    // Display class content in the textarea
    infoTextarea.value = classInfoElement.textContent;
}

// Function to handle the delete action
function deleteInfo() {
    let password = prompt("Please enter the password:");
    
    if (password === correctPassword) {
        deleteButton.style.display = "none";
        submitButton.style.display = "block";

        // Enable the textarea for editing
        infoTextarea.removeAttribute("readonly");
        
    } else {
        alert("Incorrect password");
    }
}
