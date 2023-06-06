let boxes = document.getElementsByName("select-box");
let credits = document.getElementsByName("select-credit");
let chosenCredits = 0;
let checkedBoxes = new Array(boxes.length).fill(false);

let countCredits = () => {
    for (let i = 0; i < boxes.length; ++i){
        if (boxes[i].checked && !checkedBoxes[i]){
            chosenCredits += parseInt(credits[i].value);
            checkedBoxes[i] = true;
        }
        else if (!boxes[i].checked && checkedBoxes[i]){
            chosenCredits -= parseInt(credits[i].value);
            checkedBoxes[i] = false;
        }
    }

    document.getElementById("credit-counter").value = chosenCredits;
}

let toggleDiv = (year) => {
    let id = "table-div-" + year;
    let divStyle = document.getElementById(id).style;
    
    if (divStyle.display !== "flex")
        divStyle.display = "flex";
    else
        divStyle.display = "none";
}