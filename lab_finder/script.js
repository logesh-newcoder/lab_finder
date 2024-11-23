let submitButton = document.querySelector("#sub");
let deleteButton = document.querySelector("#del");
let infoTextarea = document.querySelector("#show");
let selectedClassInput = document.querySelector("#classname");
let classIdInput = document.querySelector("#classid");

submitButton.style.display = "none";
deleteButton.style.display = "none";

// Function to display class information when a class is selected
function showInfo(className,item) {
    // Show delete button and set class name in the input
    deleteButton.style.display = "block";
    let items=item.textContent;
    selectedClassInput.value = items;

    // Get the class information and class ID from the DOM
    let classInfoElement = document.getElementById(className);
    let classId = classInfoElement.previousElementSibling.textContent.trim();
    classIdInput.value = classId;

    // Display class content in the textarea
    infoTextarea.value = classInfoElement.textContent;
}

// Function to handle the delete action
function deleteInfo() {
    // Prompt user for password to allow editing
    let password = prompt("Please enter the password:");
    const correctPassword = "labaccess"; // Correct password for editing

    if (password === correctPassword) {
        // Hide delete button and show submit button to allow update
        deleteButton.style.display = "none";
        submitButton.style.display = "block";

        // Enable the textarea for editing
        infoTextarea.removeAttribute("readonly");
    } else {
        alert("Incorrect password"); // Show error if password is wrong
    }
}
