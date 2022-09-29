function getDataNKK(el)
{
    $NKK = el.options[el.options.selectedIndex].value;
    $.ajax({
        url: 'http://localhost/yusnani/koneksi.php?getdatankk=' + $NKK,
        dataType: 'json',
        success: function(response) {
            // console.log(response.data);
            const keys = Object.keys(response.data);
            const tbody = document.getElementById('table_data_by_nik');
            
            tbody.innerHTML = '';
            
            keys.forEach(function (k) {
                // console.log(response.data[k]);
                const tr = document.createElement('tr');

                const td_nik = document.createElement('td');
                const td_nama = document.createElement('td');
                
                const tdtext_nama = document.createTextNode(response.data[k].nama);
                const tdtext_nik = document.createTextNode(response.data[k].nik);
                
                td_nik.append(tdtext_nik);
                td_nama.append(tdtext_nama);

                tr.appendChild(td_nik);
                tr.appendChild(td_nama);

                tbody.appendChild(tr);

            });

        }
    });
}
