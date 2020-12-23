var link = window.location.pathname.split('/');

$(document).ready(function () {
    show_dt();
    cek_data_form_add();
});

function cek_data_form_add() { 
    var myForm = document.getElementById('form_add');
    //Extract Each Element Value
    for (var i = 0; i < myForm.elements.length; i++) {
       var elm = myForm.elements[i];
       var ok = elm.getAttribute('data_url');
       
       if (ok) {
           get_select(ok,'',elm.name);
       }
    }   
}

function cek_data_form_up(id='',key='') { 
    var myForm = document.getElementById('form_up');
    //Extract Each Element Value
    for (var i = 0; i < myForm.elements.length; i++) {
       var elm = myForm.elements[i];
       var ok = elm.getAttribute('data_url');
       if (ok) {
           if (elm.getAttribute('data_key') == key) {
               get_select(ok,id,elm.name);
           }
       }
    }   
}

$('#form_add').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: link[4]+'?ax=in',
        data: $(this).serialize(),
        dataType: "json",
        success: function (r) {
            if (r.status) {
                alert(r.msg);
                document.getElementById("form_add").reset();
                show_dt();
                $('#myModal').modal('hide');
            }else{
                Swal.fire(
                    'Gagal',
                    r.msg,
                    'error'
                  );
            } 
        }
    });
});


$('#form_up').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: link[4]+'?ax=up',
        data: $(this).serialize(),
        dataType: "json",
        success: function (r) {
            if (r.status) {
                alert(r.msg);
                document.getElementById("form_up").reset();
                show_dt();
                $('#myModal2').modal('hide');
            }else{
                Swal.fire(
                    'Gagal',
                    r.msg,
                    'error'
                  );
            } 
        }
    });
});

$('#btn_del').click(function (e) { 
    e.preventDefault();
    var r = confirm("Apakah anda yakin ingin menghapus data ini ?");
    if (r == true) {
        $.ajax({
            type: "POST",
            url: link[4]+'?ax=de',
            data: $('#form_up').serialize(),
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    alert(r.msg);
                    document.getElementById("form_up").reset();
                    show_dt();
                    $('#myModal2').modal('hide');
                }else{
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                    );
                } 
            }
        });
    }
});

function get_data_id(id='') { 
    $.ajax({
        type: "GET",
        url: link[4]+'?ax=get&u_rowid='+id,
        dataType: "json",
        success: function (r) {
            for (const prop in r) {
                console.log(`obj.${prop} = ${r[prop]}`);
                $('#u_'+prop).val(r[prop]);
                cek_data_form_up(r[prop],prop);
            }
        }
    });
}

function deAnggota(id='') { 
    if (id != '') {
        var r = confirm("Apakah anda yakin ingin menghapus data ini ?");
        if (r == true) {
            txt = "You pressed OK!";
            $.ajax({
                type: "POST",
                url: "deAnggota",
                data: {id : id},
                dataType: "json",
                success: function (r) {
                    if (r.status) {
                        Swal.fire(
                            'Berhasil',
                            r.msg,
                            'success'
                          );
                          showAnggota();
                     }else{
                         Swal.fire(
                             'Gagal',
                             r.msg,
                             'error'
                           );
                     }
                }
            });
        } else {
          txt = "You pressed Cancel!";
        }
    }
 }

function get_select(url='',id='',name='') { 
    if(name == '') name = 'customer';
    $('select[name="'+name+'"]').html('');
    $.ajax({
        type: "get",
        url:url,
        dataType: "json",
        success: function (res) {
            $('select[name="'+name+'"]').html('<option value="">-- Select --</option>');
            $.each( res, function( key, value ) {
                if (value.nilai == id) {
                    $('select[name="'+name+'"]').append("<option selected value='"+value.nilai+"'>"+value.nama+"</option>");
                }else{
                    $('select[name="'+name+'"]').append("<option value='"+value.nilai+"'>"+value.nama+"</option>");
                }
            });
        }
    });
}

 function show_dt() {
    $('#tabel').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": link[4]+'?ax=dt',
            "type": "POST",
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            // "targets": [0],
            "orderable": false
        }]
    });
}