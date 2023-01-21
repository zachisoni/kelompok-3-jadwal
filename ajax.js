var xhttp = new XMLHttpRequest();

const filters = document.getElementsByClassName("form-select");

function filter(url){
    xhttp.responseText;
    xhttp.abort();
    xhttp.onreadystatechange = () => {
        document.querySelector(".jadwal").innerHTML = xhttp.responseText;
    }

    let hari = document.getElementById("filter-hari").value;
    let matkul = document.getElementById("filter-mata-kuliah").value;
    let dosen = document.getElementById("filter-dosen").value;
    let kelas = document.getElementById("filter-kelas").value;

    xhttp.open("GET", url + "?h=" + hari + "&m=" + matkul + "&d=" + dosen + "&k=" + kelas, true);
    xhttp.send(null);

}


function changePage(pageno, url){
    xhttp.responseText;
    xhttp.abort();
    xhttp.onreadystatechange = () => {
        document.querySelector(".jadwal").innerHTML = xhttp.responseText;
    }

    let hari = document.getElementById("filter-hari").value;
    let matkul = document.getElementById("filter-mata-kuliah").value;
    let dosen = document.getElementById("filter-dosen").value;
    let kelas = document.getElementById("filter-kelas").value;

    xhttp.open("GET", url + "?h=" + hari + "&m=" + matkul + "&d=" + dosen + "&k=" + kelas + "&pageno=" + pageno, true);
    xhttp.send(null);

}