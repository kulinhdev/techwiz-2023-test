import Swal from "sweetalert2";

function SweetAlert(message) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 1500,
    });
}

export default SweetAlert;
