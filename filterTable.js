let table = document.getElementById('table-jadwal');
let  tr = table.getElementsByTagName("tr");

let filterHari = document.getElementById('filter-hari');
let filterMatkul = document.getElementById('filter-mata-kuliah');
let filterDosen = document.getElementById('filter-dosen');
let filterKelas = document.getElementById('filter-kelas');

filterHari.addEventListener('change', ()=>{
    let td;
    for(i = 1; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[1];
        if(td){
            let txtValue = td.textContent || td.innerText;
            if(txtValue == filterHari.value){
                tr[i].style.display = "";
            } else if(filterHari.value == 'semua-hari'){
                tr[i].style.display = "";
            }else {
                tr[i].style.display = "none";
            }
        }
    }
});

filterMatkul.addEventListener('change', ()=>{
    let td;
    for(i = 1; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[3];
        if(td){
            let txtValue = td.textContent || td.innerText;
            if(txtValue == filterMatkul.value){
                tr[i].style.display = "";
            } else if(filterMatkul.value == 'semua-mata-kuliah'){
                tr[i].style.display = "";
            }else {
                tr[i].style.display = "none";
            }
        }
    }
});

filterDosen.addEventListener('change', ()=>{
    let td;
    for(i = 1; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[4];
        if(td){
            let txtValue = td.textContent || td.innerText;
            if(txtValue == filterDosen.value){
                tr[i].style.display = "";
            } else if(filterDosen.value == 'semua-dosen'){
                tr[i].style.display = "";
            }else {
                tr[i].style.display = "none";
            }
        }
    }
});

filterKelas.addEventListener('change', ()=>{
    let td;
    for(i = 1; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[6];
        if(td){
            let txtValue = td.textContent || td.innerText;
            if(txtValue == filterKelas.value){
                tr[i].style.display = "";
            } else if(filterKelas.value == 'semua-kelas'){
                tr[i].style.display = "";
            }else {
                tr[i].style.display = "none";
            }
        }
    }
});