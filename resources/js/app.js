import "./bootstrap";
import Alpine from "alpinejs";
import toastr from "toastr"; // Import toastr
import "toastr/build/toastr.min.css"; // Import CSS toastr

window.Alpine = Alpine;
window.toastr = toastr; // Daftarkan toastr ke window agar bisa diakses global

Alpine.start();

// Konfigurasi default toastr (optional)
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};
