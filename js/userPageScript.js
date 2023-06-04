let toggleDiv = (year) => {
    let id = "table-div-" + year;
    let divStyle = document.getElementById(id).style;

    if (divStyle.display == "none")
        divStyle.display = "flex";
    else
        divStyle.display = "none";
}