window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesUsers = document.getElementById('datatablesUsers');
    const datatablesPosts = document.getElementById('datatablesPosts');
    
    if (datatablesUsers) {
        new simpleDatatables.DataTable(datatablesUsers);
    }
    
    if (datatablesPosts) {
        new simpleDatatables.DataTable(datatablesPosts);
    }
});
