document.addEventListener('DOMContentLoaded', function() {
    const toggleStatusBtn = document.getElementById('toggleStatusBtn');
    const statusBadge = document.querySelectorAll('.badge')[1];
    let isActive = true;

    toggleStatusBtn.addEventListener('click', function() {
        if (isActive) {
            // Suspend supplier
            statusBadge.className = 'badge bg-warning';
            statusBadge.textContent = 'Tạm dừng';
            toggleStatusBtn.innerHTML = '<i class="fas fa-play me-2"></i>Kích hoạt lại';
            toggleStatusBtn.classList.replace('btn-warning', 'btn-success');
        } else {
            // Reactivate supplier
            statusBadge.className = 'badge bg-success';
            statusBadge.textContent = 'Đang hoạt động';
            toggleStatusBtn.innerHTML = '<i class="fas fa-pause me-2"></i>Tạm dừng';
            toggleStatusBtn.classList.replace('btn-success', 'btn-warning');
        }
        isActive = !isActive;
    });

    
});