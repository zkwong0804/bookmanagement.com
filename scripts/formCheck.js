let clForm = document.querySelector("#createLibrarianForm");
let cmForm = document.querySelector("#createMemberForm");
let rmForm = document.querySelector("#renewMemberForm");
let bbForm = document.querySelector("#borrowBookForm");
let rbForm = document.querySelector("#returnBookForm");
let exForm = document.querySelector("#extendExpireForm");
let ppForm = document.querySelector("#payPanaltyForm");

clForm.onsubmit = function(e) {
    const pass1 = document.querySelector("#newLibPass1");
    const pass2 = document.querySelector("#newLibPass2");

    if (pass1.value !== pass2.value) {
        e.preventDefault();
        pass1.value = "";
        pass2.value = "";
        alert("Make sure your password are consistent");
    }
}

cmForm.onsubmit = function(e) {
    const pass1 = document.querySelector("#newMemPass1");
    const pass2 = document.querySelector("#newMemPass2");

    if (pass1.value !== pass2.value) {
        e.preventDefault();
        pass1.value = "";
        pass2.value = "";
        alert("Make sure your password are consistent");
    }
}

rmForm.onsubmit = function(e) {
    const memID = document.querySelector("#rm-memID").value;
    ajax(
        "http://localhost:8000/checkMemberExistence.php", 
        `memID=${encodeURIComponent(memID)}`
    ).then(result => {
        if (!result.exist) {
            e.preventDefault();
            alert("member does not exist in database");
        }
    })
    .catch(err => alert(err));
}

bbForm.onsubmit = function(e) {
    const memID = document.querySelector("#bb-memID").value;
    const memPass = document.querySelector("#bb-memPass").value;
    ajax(
        "http://localhost:8000/checkMemberExistence.php",
        `memID=${encodeURIComponent(memID)}&memPass=${encodeURIComponent(memPass)}`
    ).then(result => {   
        if (!result.exist) {
            e.preventDefault();
            alert("member does not exist in database");
        }
    })
    .catch(err => alert(err));
}

rbForm.onsubmit = function(e) {
    const returnID = document.querySelector("#rb-returnID").value;
    ajax(
        "http://localhost:8000/checkReturnID.php", 
        `returnID=${encodeURIComponent(returnID)}`
    ).then(result => {
        if (!result.exist) {
            e.preventDefault();
            alert("Return ID is not exist!");
        }
    })
    .catch(err => {
        alert(err);
    })
}

exForm.onsubmit = function(e) {
    const returnID = document.querySelector("#ex-returnID").value;
    ajax(
        "http://localhost:8000/checkReturnID.php",
        `returnID=${encodeURIComponent(returnID)}`
    ).then(result => {
        console.log(result)
        if(!result.exist) {
            e.preventDefault();
            alert("Return ID is not exist!");
        }
    })
    .catch(err => {
        alert(err)
    })
}

ppForm.onsubmit = function(e) {
    let pList = document.querySelector("#penaltiesList");
    let pClass = document.querySelector(".pClass:checked");
    console.log(pClass)
    if (pList.innerHTML === "" || pClass == null) {
        e.preventDefault();
        ajax(
            "http://localhost:8000/getPenalties.php",
            `memID=${encodeURIComponent(
                document.querySelector('#pp-memID').value)}`
        ).then(result => {
            pList.innerHTML = "";
            pList.appendChild(createTable(result.result));
        }).catch(err => alert(err));
    }
}

function createTable(list) {
    let table = document.createElement("table");
    table.className = "penaltiesTable mdl-data-table mdl-js-data-table mdl-shadow--2dp";
    let thr = document.createElement("tr");
    const thList = [
        "pID", "book", "reason", "fees", ""
    ];
    let txt = null;
    let th = null;
    for (let e of thList) {
        txt = document.createTextNode(e);
        th = document.createElement("th");
        th.appendChild(txt);
        thr.appendChild(th);
    }

    table.appendChild(thr);
    let tbr = null;
    let cbCounter = 1;
    for (let e of list) {
        tbr = document.createElement("tr");
        tbr.appendChild(createTD(e.id));
        tbr.appendChild(createTD(e.book));
        tbr.appendChild(createTD(e.reason));
        tbr.appendChild(createTD(e.fees));

        let cbTD = document.createElement("td");
        let cb = document.createElement("input");
        cb.type = "checkbox";
        cb.value = e.id;
        cb.name = "penalties[]";
        cb.className= "pClass mdl-checkbox__input";
        cb.id = "checkbox-"+cbCounter;
        cb.setAttribute("data-fees", e.fees);
        cb.onclick = function() {
            let total = document.querySelector("#totalPenalty");
            let totalPenalties = 
                parseFloat(total.getAttribute("data-total"));
            let fees = parseFloat(cb.getAttribute("data-fees"));
            let newTotal = (cb.checked) ? 
                (totalPenalties + fees) : (totalPenalties - fees);

            newTotal = newTotal.toFixed(2);

            total.setAttribute("data-total", newTotal);
            total.innerHTML = "RM " + newTotal; 
            console.log(total.getAttribute("data-total"));
        };
        let cbLabel = document.createElement("label");
        let cbSpan = document.createElement("span");
        cbLabel.className = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect";
        cbLabel.setAttribute("for", "checkbox-"+cbCounter);
        cbSpan.className = "mdl-checkbox__label";
        cbLabel.appendChild(cb);
        cbLabel.appendChild(cbSpan);
        cbTD.appendChild(cbLabel);
        tbr.appendChild(cbTD);
        table.appendChild(tbr);
        cbCounter++;
    }

    function createTD(text) {
        let textNode = document.createTextNode(text);
        let td = document.createElement("td");
        td.appendChild(textNode);
        return td;
    }
    
    let totalTR = document.createElement("tr");

    let totalTD = document.createElement("td");
    let totalHeading = document.createElement("h3");
    let totalTxt = document.createTextNode("Total");

    let totalTD2 = document.createElement("td");
    let totalHeading2 = document.createElement("h3");
    totalHeading2.id = "totalPenalty";
    totalHeading2.setAttribute("data-total", 0);
    let totalTxt2 = document.createTextNode("RM 0.00");


    totalHeading.appendChild(totalTxt);
    totalHeading2.appendChild(totalTxt2);
    totalTD.appendChild(totalHeading);
    totalTD2.appendChild(totalHeading2);
    
    totalTR.appendChild(totalTD);
    totalTR.appendChild(totalTD2);
    table.appendChild(totalTR);
    return table;
}

function ajax(url, data) {
    let httpRequest = new XMLHttpRequest();

    return new Promise((resolve, reject) => {
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if(httpRequest.status === 200) {
                    resolve(JSON.parse(httpRequest.responseText));
                } else {
                    reject("Failed to retrieve data from API");
                }
            }
    
        }
        httpRequest.open(
            "POST", 
            url, 
            false
        );
        httpRequest.setRequestHeader(
            'Content-Type', 'application/x-www-form-urlencoded'
        );
        httpRequest.send(data);
    });
}