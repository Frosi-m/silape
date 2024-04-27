document.getElementById('rectangle_19').addEventListener('change', function() {
    var rectangle19Value = this.value;
    var jenis_laporan = document.getElementById('jenis_laporan');
    var group_13 = document.getElementById('group_13');


    if (rectangle19Value === 'pelayanan' && !document.getElementById('rectangle_27')) {
        var rectangle_27_Select = document.createElement('select');
        rectangle_27_Select.setAttribute('name', 'jenis_laporan');
        rectangle_27_Select.setAttribute('id', 'rectangle_27');

        // Tambahkan option ke dalam select Rectangle 27
        var option_1 = document.createElement('option');
        option_1.value = 'rawat jalan';
        option_1.textContent = 'Rawat jalan';
        rectangle_27_Select.appendChild(option_1);

        var option_2 = document.createElement('option');
        option_2.value = 'rawat inap';
        option_2.textContent = 'Rawat inap';
        rectangle_27_Select.appendChild(option_2);
        
        var option_3 = document.createElement('option');
        option_3.value = 'admisi';
        option_3.textContent = 'admisi';
        rectangle_27_Select.appendChild(option_3);

        var option_4 = document.createElement('option');
        option_4.value = 'farmasi';
        option_4.textContent = 'Farmasi';
        rectangle_27_Select.appendChild(option_4);

        var option_5 = document.createElement('option');
        option_5.value = 'lab';
        option_5.textContent = 'Lab';
        rectangle_27_Select.appendChild(option_5);

        var option_6 = document.createElement('option');
        option_6.value = 'radiologi';
        option_6.textContent = 'Radiologi';
        rectangle_27_Select.appendChild(option_6);

        // Tambahkan select Rectangle 19 ke dalam container
        group_13.appendChild(rectangle_27_Select)

        jenis_laporan.style.display = 'block';
    } else if (rectangle19Value === 'fasilitas' && document.getElementById('rectangle_27')) {
        var ambil_elemen = document.getElementById('rectangle_27');
        ambil_elemen.parentNode.removeChild(ambil_elemen);
        jenis_laporan.style.display = 'none';

    } else {
        jenis_laporan.style.display = 'none';
    }
});