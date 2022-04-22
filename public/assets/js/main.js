function password1() {
    var x = document.getElementById("password_lama");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function password2() {
    var x = document.getElementById("password_baru");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function password3() {
    var x = document.getElementById("konfirm_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$(document).ready(function() {
    $('#table_barang').DataTable();
    $('#table_barangmasuk').DataTable();
    $('#table_barangkeluar').DataTable();
    $('#table_supplier').DataTable();
} );