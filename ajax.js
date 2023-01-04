var xhttp = new XMLHttpRequest();

if(window.XMLHttpRequest){
    xhttp = new XMLHttpRequest();
}else if(window.ActiveXObject){
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

function search(){
    xhttp.responseText;
    xhttp.abort();
    xhttp.onreadystatechange = () => {
        document.querySelector(".jadwal").innerHTML = xhttp.responseText;
    }

    var hari = document.getElementById("filter-hari").value;
    var matkul = document.getElementById("filter-mata-kuliah").value;
    var dosen = document.getElementById("filter-dosen").value;
    var kelas = document.getElementById("filter-kelas").value;

    xhttp.open("GET", "jadwalResponse.php?h=" + hari + "&m=" + matkul + "&d=" + dosen + "&k=" + kelas, true);
    xhttp.send(null);

}