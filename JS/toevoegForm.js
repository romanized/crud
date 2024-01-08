function validatePrioriteit() {
    var prioriteit = document.getElementById("prioriteitVeld");
    if (prioriteit.value > 5) {
        prioriteit.value = 5;
    }
}