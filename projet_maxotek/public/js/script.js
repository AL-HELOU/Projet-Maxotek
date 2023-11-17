function submitformdeleteadmin(form){
    Swal.fire({
        title: "Êtes vous sûr de vouloir supprimer l'administrateur?",
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        });
        return false;
    }