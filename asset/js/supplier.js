
document.addEventListener('DOMContentLoaded', function() {
    // Show/hide provider details when checkbox is clicked
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const details = this.closest('.provider-item').querySelector('.provider-details');
            if (this.checked) {
                details.style.display = 'block';
            } else {
                details.style.display = 'none';
            }
        });
    });
})  ;

// document.addEventListener('DOMContentLoaded', function() {
//     // Xử lý nút Hủy
//     const cancelButton = document.querySelector('.modal-footer .btn-outline-secondary');
//     cancelButton.addEventListener('click', function() {
//         // Đóng modal
//         const modal = bootstrap.Modal.getInstance(document.getElementById('supplierModal'));
//         modal.hide();
        
//         // Reset form
//         document.getElementById('supplierForm').reset();
//     });

//     // Xử lý nút Lưu
//     const saveButton = document.querySelector('.modal-footer .btn-add');
//     saveButton.addEventListener('click', function() {
//         // Xử lý logic lưu form ở đây
//         console.log('Saving supplier...');
//     });
// });