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
        "http://10.0.24.13:6006/checkMemberExistence.php", 
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
        "http://10.0.24.13:6006/checkMemberExistence.php",
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
        "http://10.0.24.13:6006/checkReturnID.php", 
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
        "http://10.0.24.13:6006/checkReturnID.php",
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
    e.preventDefault();
    const pID = document.querySelector("#penaltyID").value;
    if (pID === "") {
        ajax(
            "http://10.0.24.13:6006/getPenalties.php",
            `memID=${encodeURIComponent(
                document.querySelector('#pp-memID').value)}`
        ).then(result => {
            console.log(result);
            document.querySelector("#penaltiesList")
                .appendChild(createTable(result.result));
        }).catch(err => alert(err));
    } else  {
        console.log(pID)
    }
    // const penaltyID = document.querySelector("penaltyID").value;
    // ajax(
    //     "http://10.0.24.13:6006/checkPenaltyID.php",
    //     `penaltyID=${encodeURIComponent(penaltyID)}`
    // ).then(result => {
    //     if(!result.exist) {
    //         e.preventDefault();
    //         alert("Penalty ID is not exist!");
    //     }
    // })
    // .catch(err => alert(err));
}

function createTable(list) {
    let table = document.createElement("table");
    table.className = "penaltiesTable";
    let thr = document.createElement("tr");
    const thList = [
        "pID", "book", "reason", "fees"
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
    for (let e of list) {
        console.log(e);
        tbr = document.createElement("tr");
        tbr.appendChild(createTD(e.id));
        tbr.appendChild(createTD(e.book));
        tbr.appendChild(createTD(e.reason));
        tbr.appendChild(createTD(e.fees));
        table.appendChild(tbr);
    }

    function createTD(text) {
        let textNode = document.createTextNode(text);
        let td = document.createElement("td");
        td.appendChild(textNode);
        return td;
    }

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