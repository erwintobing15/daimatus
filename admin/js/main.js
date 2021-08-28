function passId(user_id, elmnt_id) {
  document.getElementById(elmnt_id).value = user_id;
}

function revalueAddModal(username) {
    document.getElementById('addModalLabel').value = 'Ubah Data User';
    document.getElementById('username').value = username;
}
