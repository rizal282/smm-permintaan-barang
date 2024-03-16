$(document).ready(function(){
    inquiryPermintaanBarang()

    function inquiryPermintaanBarang() {
        $.ajax({
            method: 'get',
            url: 'http://127.0.0.1:8000/permintaanbarang/inquirypermintaanbarang',
            dataType: 'json',
            success: function(response) {
                
                let nomor = 1
                let inquiry_data = '';
                const data_barang = response.data
                
                for(let i = 0; i < data_barang.length; i++){
                    inquiry_data += '<tr>'+
                        '<td>'+nomor+'</td>'
                        + '<td>'+data_barang[i].nama+'</td>'
                        + '<td>'+data_barang[i].nama_department+'</td>'
                        + '<td>'+data_barang[i].nama_barang+'</td>'
                        + '<td>'+data_barang[i].nama_lokasi+'</td>'
                        + '<td>'+data_barang[i].tersedia+'</td>'
                        + '<td>'+data_barang[i].kuantiti+'</td>'
                        + '<td>'+data_barang[i].keterangan+'</td>'
                        + '<td>'+data_barang[i].status+'</td>'
                        +'</tr>'

                    nomor++
                }


                $('#inquiry-barang').append(inquiry_data)
            }
        });
    }
})