/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function submitForm(urlAct, idForm) {
    $.ajax({
        url: urlAct,
        type: 'POST',
        data: $("#" + idForm).serialize(),
        success: function (data) {
            return false;
        }
    });
}