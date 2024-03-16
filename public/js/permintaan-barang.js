$(document).ready(function(){

    // VARIABLE DEFINITIONS
    let dataPermintaanInsert = []

    let dataTempPermintaanBarang = {
        id_barang: 0,
        id_employee: 0,
        kuantiti: 0,
        keterangan: null,
        status: '',
        tgl_minta: ''
    }

    // FUNCTION CALLED
    getListNikPeminta()
    getListBarang()

    // ALL EVENTS

    $('#btn-tambah-barang').click(function(){
        
        if(validateNIKAndTanggal()){
            // addRowForm()
            if(validateDataPermintaanBarang()){
                dataPermintaanInsert.push(dataTempPermintaanBarang)
                console.log(dataPermintaanInsert.length + ' Barang ditambah')
                console.log(dataPermintaanInsert)

                resetDataTempPemintaan()
                addRowForm()
                console.log('valid tambah form')
            }
        }
        
    })

    $('#employee-id').change(function(){
        const selectedNIK = $(this).val()

        $.ajax({
            method: 'GET',
            url: 'http://127.0.0.1:8000/employee/pemintabynik',
            dataType: 'json',
            data: {nik: selectedNIK},
            success: function(response) {
                const dataSingleNik = response.data

                $('#employee-name').val(dataSingleNik.nama)
                $('#employee-department').val(dataSingleNik.nama_department)
                
            },
        })
    })

    $('#tanggal-minta').change(function(){
        // dataTempPermintaanBarang.tgl_minta = formatDate($(this).val())
    })

    $(document).on('change', '.pilih-barang', function() {
        var id_barang = $(this).val()
        var currentRow = $(this).closest('tr')

        // dataTempPermintaanBarang.id_barang = $(this).val()
        
        $.ajax({
            method: 'GET',
            url: 'http://127.0.0.1:8000/stokbarang/getdetailbarang',
            dataType: 'json',
            data: {id_barang},
            success: function(response) {
                const detailBarang = response.data

                if(detailBarang.tersedia === 0){
                    alert('Barang ini stoknya kosong, pilih yang lain!')
                    currentRow.find('.lokasi').val('')
                    currentRow.find('.tersedia').val('')
                    currentRow.find('.satuan').val('')
                }else{
                    currentRow.find('.lokasi').val(detailBarang.nama_lokasi)
                    currentRow.find('.tersedia').val(detailBarang.tersedia)
                    currentRow.find('.satuan').val(detailBarang.satuan)
                }
            },
        })
    });

    $(document).on('input', '.kuantiti', function() {
    
        const currentRow = $(this).closest('tr')
        const kuantiti = parseInt($(this).val())
        const tersedia = parseInt(currentRow.find('.tersedia').val())

        // dataTempPermintaanBarang.kuantiti = $(this).val()

        const tersediaDiviceTwo = tersedia / 2

        if(kuantiti < tersedia && kuantiti < tersediaDiviceTwo){
            currentRow.find('.status').text('Terpenuhi')
        } else if(kuantiti >= tersediaDiviceTwo && kuantiti < tersedia) {
            currentRow.find('.status').text('Sebagian')
        } else {
            // currentRow.find('.status').text('Kosong')
            alert('Kuantiti tidak boleh kosong atau lebih dari stok!')
            $(this).val('')
        }

        // dataTempPermintaanBarang.status = currentRow.find('.status').text()
    });

    $('#btn-proses').click(function(){
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        const idEmployee = $('#employee-id').val()
        const tanggalMinta = $('#tanggal-minta').val()

        dataTempPermintaanBarang.id_employee = idEmployee
        dataTempPermintaanBarang.tgl_minta = formatDate(tanggalMinta)
        
        if(validateDataPermintaanBarang()) {
            dataPermintaanInsert.push(dataTempPermintaanBarang)
            dataPermintaanInsert = dataPermintaanInsert.filter(obj => obj.id_barang !== undefined)

            console.log(dataPermintaanInsert)

            $.ajax({
                method: 'post',
                url: 'http://127.0.0.1:8000/permintaanbarang/insertpermintaan',
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: JSON.stringify(dataPermintaanInsert),
                success: function(response){
                    console.log("==============")
                    console.log(response.data)

                    if(response.data){
                        alert(dataPermintaanInsert.length + ' Permintaan barang berhasil tersimpan!')
                    }

                    resetDataTempPemintaan()

                    dataPermintaanInsert = []
                },
            })
        }
    })

    $('#remove-form').click(function(){
        removeForm();
    })

    $(document).on('click', '.remove-last-row-form', function() {
        const currentRow = $(this).closest('tr')
        currentRow.remove()
    })


    // ALL FUNCTIONS

    function getListNikPeminta(){
        $.ajax({
            method: 'GET',
            url: 'http://127.0.0.1:8000/employee/nikpeminta',
            dataType: 'json',
            success: function(response) {
                $.each(response.data, function(index, item){
                    $('#employee-id').append($('<option>', {
                        value: item.nik,
                        text: item.nik
                    }));
                })
            },
        })
    }

    function getListBarang(){
        return new Promise(function(resolve, reject) {
            $.ajax({
                method: 'GET',
                url: 'http://127.0.0.1:8000/stokbarang/listnamabarang',
                dataType: 'json',
                success: function(response) {
                    $.each(response.data, function(index, item){
                        $('#pilih-barang').append($('<option>', {
                            value: item.id_barang,
                            text: item.id_barang + ' - ' + item.nama_barang
                        }));
                    })

                    resolve(response.data)
                },
            })
        });
        
    }

    // format tanggal menjadi YYYY-MM-DD
    function formatDate(tanggal){
        let tanggalInput = tanggal
        
        let date = new Date(tanggalInput)
        let formattedDate = date.getFullYear() + '-' + pad((date.getMonth() + 1), 2) + '-' + pad(date.getDate(), 2)
        

        return formattedDate;
    }

    //  menambahkan leading zero (nol di depan)
    function pad(number, length) {
        var str = '' + number
        while (str.length < length) {
            str = '0' + str
        }
        return str;
    }

    function resetDataTempPemintaan() {
        dataTempPermintaanBarang = {
            id_barang: 0,
            id_employee: 0,
            kuantiti: 0,
            keterangan: null,
            status: '',
            tgl_minta: ''
        }
    }

    function validateNIKAndTanggal(){
        const idEmployee = $('#employee-id').val()
        const tanggalMinta = $('#tanggal-minta').val()

        if(idEmployee === '' || tanggalMinta === ''){
            alert('Pilih NIK Karyawan dan Tanggal dahulu!')
            return false
        } 

        dataTempPermintaanBarang.id_employee = idEmployee
        dataTempPermintaanBarang.tgl_minta = formatDate(tanggalMinta)
    
        return true
    }

    function validateDataPermintaanBarang(){
        let lastRow = $('#daftar-barang tr:last')

      
        const idBarang = lastRow.find('.pilih-barang').val()
        const kuantiti = lastRow.find('.kuantiti').val()
        const keterangan = lastRow.find('.keterangan').val()
        const status = lastRow.find('.status').text()

        if(idBarang === '' || kuantiti === '' || keterangan === '') {
            alert('Isi semua field Daftar Barang yang kosong!')
            return false
        }   

        dataTempPermintaanBarang.id_barang = idBarang
        dataTempPermintaanBarang.kuantiti = kuantiti
        dataTempPermintaanBarang.keterangan = keterangan
        dataTempPermintaanBarang.status = status

        return true
    }

    function addRowForm(){
         getListBarang().then(function(data) {
            const options = data.map(function(item) {
                return '<option value="' + item.id_barang + '">' + item.id_barang + ' - ' + item.nama_barang + '</option>';
            }).join('');

            const newRowForm = '<tr id="tr-form">' + 
                '<td width="300">' + 
                    '<select name="pilih-barang" id="" class="form-control pilih-barang"><option value=""></option>' + options +' </select>' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="lokasi" id="" class="form-control lokasi" readonly>' + 
                '</td>' + 
                '<td>' + 
                    '<input type="text" name="tersedia" id="" class="form-control tersedia" readonly>' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="kuantiti" id="" class="form-control kuantiti">' +
                '</td>' +
                '<td>' +
                ' <input type="text" name="satuan" id="" class="form-control satuan" readonly>' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="keterangan" id="" class="form-control keterangan">' +
                '</td>' +
                '<td>' +
                    '<p class="status">Status</p>' +
                '</td>' +
                '<td>' +
                    '<a href="#" class="btn btn-danger remove-last-row-form">X</a>' +
                '</td>' +
            '</tr>'

            $("#form-input-barang").append(newRowForm)
        })
    }

    function removeForm() {
        $('#form-input-barang').remove()
        $('#employee-id').val('')
        $('#tanggal-minta').val('')
        $('#employee-name').val('');
        $('#employee-department').val('')

        dataPermintaanInsert = []
    }
})