let boxes = document.getElementsByName("select-box[]");
let credits = document.getElementsByName("select-credit");
let chosenCredits = 0;
let checkedBoxes = new Array(boxes.length).fill(false);
let maxAllowedCredits = document.getElementById("max-allowed-credits").value;

const arrowButtons = document.querySelectorAll(".arrow-buttons");

let countCredits = () => {
    for (let i = 0; i < boxes.length; ++i){
        let thisCredits = parseInt(credits[i].value);
        if (boxes[i].checked && !checkedBoxes[i]){
            if (thisCredits + chosenCredits <= maxAllowedCredits){
                chosenCredits += thisCredits;
                checkedBoxes[i] = true;
            }
            else{
                boxes[i].checked = false;
            }
        }
        else if (!boxes[i].checked && checkedBoxes[i]){
            chosenCredits -= parseInt(credits[i].value);
            checkedBoxes[i] = false;
        }
    }

    document.getElementById("credit-counter").value = "Credits: " + chosenCredits;
}

//keep track of which optional courses were chosen in each group
let checkedOptional = {
    "1": new Array(document.getElementsByName("optional-box-1[]").length).fill(false),
    "2": new Array(document.getElementsByName("optional-box-2[]").length).fill(false),
    "3": new Array(document.getElementsByName("optional-box-3[]").length).fill(false),
    "4": new Array(document.getElementsByName("optional-box-4[]").length).fill(false),
    "5": new Array(document.getElementsByName("optional-box-5[]").length).fill(false),
    "6": new Array(document.getElementsByName("optional-box-6[]").length).fill(false)
};

//keep track of the amount of credits that has been chosen in each group
let groupChosenCredits = {
    "1": 0,
    "2": 0,
    "3": 0,
    "4": 0,
    "5": 0,
    "6": 0
};

let optionalCourseCreditCounter = (group) => {
    let optionalCourses = document.getElementsByName("optional-box-" + group + "[]");
    let optionalCredits = document.getElementsByName("optional-credit-" + group);
    let maxCredits = document.getElementById("max-credits-" + group).value;

    for (let i = 0; i < optionalCourses.length; ++i){
        let thisCredit = parseInt(optionalCredits[i].value);
        if (optionalCourses[i].checked && !checkedOptional[group][i]){
            if (groupChosenCredits[group] + thisCredit <= maxCredits && groupChosenCredits[group] + thisCredit <= maxAllowedCredits){
                groupChosenCredits[group] += thisCredit;
                chosenCredits += thisCredit;
                checkedOptional[group][i] = true;
            }
            else{
                optionalCourses[i].checked = false;
            }
        }
        else if (!optionalCourses[i].checked && checkedOptional[group][i]){
            chosenCredits -= thisCredit;
            checkedOptional[group][i] = false;
            groupChosenCredits[group] -= thisCredit
        }
    }

    document.getElementById("credit-counter").value = "Credits: " + chosenCredits;
}

let toggleDiv = (year) => {
    let id = "table-div-" + year;
    let divStyle = document.getElementById(id).style;
    
    if (divStyle.display !== "flex")
        divStyle.display = "flex";
    else
        divStyle.display = "none";

}


//function to rotate arrow buttons
arrowButtons.forEach((button) => {
    button.addEventListener("click", () => {
        if(button.classList.contains("rotate-button"))
            button.classList.remove("rotate-button");
        else
            button.classList.add("rotate-button"); 
    })
})