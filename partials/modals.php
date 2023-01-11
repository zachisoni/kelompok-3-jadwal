<!-- UPDATE MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #A2E8CF;">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="database/crud.php" method="POST">
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">ID Jadwal</label>
                                <input required class="form-control" name="no_jadwal" id="id-jadwal" type="text"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hari</label>
                                <input required type="text" name="hari" class="form-control" id="hari">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dosen</label>
                                <input required type="text" name="dosen" class="form-control" id="dosen">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input required type="text" name="kelas" class="form-control" id="kelas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Ajaran</label>
                                <input required type="text" name="tahun_ajaran" class="form-control" id="tahun-ajaran">
                            </div>
                        </div>
                        <div class="col-8 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Slot Waktu</label>
                                <input required type="text" name="slot_waktu" class="form-control" id="slot-waktu">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mata Kuliah</label>
                                <input required type="text" name="mata_kuliah" class="form-control" id="mata-kuliah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang</label>
                                <input required type="text" name="ruang" class="form-control" id="ruang">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Durasi Kelas</label>
                                <input required type="number" name="jumlah_jam" class="form-control" id="durasi-kelas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Semester</label>
                                <input required type="text" name="semester" class="form-control" id="semester">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary" id="ubah">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="database/crud.php" method="post">
                <div class="modal-body">
                    Hapus Data Jadwal No <label id="id-label"></label> ?
                    <input type="hidden" name="id" id="id-input">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).on("click", "#edit", function() {
    let id = $(this).data('id');
    let slot_waktu = $(this).data('slot-waktu');
    let hari = $(this).data('hari');
    let mata_kuliah = $(this).data('mata-kuliah');
    let dosen = $(this).data('dosen');
    let ruang = $(this).data('ruang');
    let kelas = $(this).data('kelas');
    let jumlah_jam = $(this).data('jumlah-jam');
    let tahun_ajaran = $(this).data('tahun-ajaran');
    let semester = $(this).data('semester');
    $(".modal-body #id-jadwal").val(id);
    $(".modal-body #slot-waktu").val(slot_waktu);
    $(".modal-body #hari").val(hari);
    $(".modal-body #mata-kuliah").val(mata_kuliah);
    $(".modal-body #dosen").val(dosen);
    $(".modal-body #ruang").val(ruang);
    $(".modal-body #kelas").val(kelas);
    $(".modal-body #durasi-kelas").val(jumlah_jam);
    $(".modal-body #tahun-ajaran").val(tahun_ajaran);
    $(".modal-body #semester").val(semester);
})

$(document).on("click", "#ubah", function(){
    alert("Data berhasil diupdate");
})

$(document).on("click", "#delete", function() {
    let id = $(this).data('id');
    $("#id-label").text(id)
    $("#id-input").val(id)
})
</script>