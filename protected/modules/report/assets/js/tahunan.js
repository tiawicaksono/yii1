function cetak(urlAct) {
    var thn = $('#thn_search').val();
    window.location.href = urlAct + "?thn=" + thn;
    return false;
}