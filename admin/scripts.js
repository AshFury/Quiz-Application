// Get references to the form, the number input, and the checkbox table
var checkboxForm = document.getElementById("checkboxForm");
var numberInput = document.getElementById("numberInput");
var checkboxTable = document.getElementById("checkboxTable");

// Add an event listener to the form's submit event
checkboxForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting and refreshing the page

    var number = parseInt(numberInput.value);

    if (isNaN(number)) {
        alert("Please enter a valid number.");
        return;
    }

    var checkboxes = checkboxTable.querySelectorAll("input[type='checkbox']");
    var checkboxCount = checkboxes.length;

    // Reset all checkboxes to unchecked state
    for (var i = 0; i < checkboxCount; i++) {
        checkboxes[i].checked = false;
    }

    // Select and check a random number of checkboxes
    var randomCheckboxIndices = getRandomIndices(number, checkboxCount);
    for (var j = 0; j < randomCheckboxIndices.length; j++) {
        checkboxes[randomCheckboxIndices[j]].checked = true;
    }
});

// Helper function to generate an array of unique random indices
function getRandomIndices(count, max) {
    var indices = [];
    for (var i = 0; i < count; i++) {
        var randomIndex;
        do {
            randomIndex = Math.floor(Math.random() * max);
        } while (indices.includes(randomIndex));
        indices.push(randomIndex);
    }
    return indices;
}
