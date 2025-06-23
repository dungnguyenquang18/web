document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('invoiceForm');
    const productsTable = document.querySelector('table tbody');
    const addProductBtn = document.querySelector('.btn-outline-primary');
    
    // Add new product row
    addProductBtn.addEventListener('click', function() {
        const newRow = `
            <tr>
                <td>
                    <select class="form-select product-select">
                        <option value="">-- Chọn sản phẩm --</option>
                        ${products.map(p => `<option value="${p.id}">${p.name}</option>`).join('')}
                    </select>
                </td>
                <td><input type="number" class="form-control quantity" value="1" min="1"></td>
                <td><input type="text" class="form-control price" value="0"></td>
                <td class="subtotal">0 đ</td>
                <td>
                    <button type="button" class="btn btn-link text-danger p-0 remove-row">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
        productsTable.insertAdjacentHTML('beforeend', newRow);
    });

    // Calculate subtotal when quantity or price changes
    productsTable.addEventListener('input', function(e) {
        if (e.target.classList.contains('quantity') || e.target.classList.contains('price')) {
            calculateTotal();
        }
    });

    // Remove product row
    productsTable.addEventListener('click', function(e) {
        if (e.target.closest('.remove-row')) {
            e.target.closest('tr').remove();
            calculateTotal();
        }
    });

    // Submit form
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Collect products data
        const products = [];
        document.querySelectorAll('tbody tr').forEach(row => {
            const product = {
                id: row.querySelector('.product-select').value,
                quantity: row.querySelector('.quantity').value,
                price: row.querySelector('.price').value
            };
            if (product.id) products.push(product);
        });

        const formData = {
            providerId: document.querySelector('[name="providerId"]').value,
            createDate: document.querySelector('[name="createDate"]').value,
            des: document.querySelector('[name="des"]').value,
            products: JSON.stringify(products),
            total: document.querySelector('.total').textContent,
            paid: document.querySelector('[name="paid"]').value
        };

        try {
            const response = await fetch('/public/index.php?route=invoice-store', {
                method: 'POST',
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();
            if (result.success) {
                alert(result.message);
                window.location.href = '/public/index.php?route=invoice';
            } else {
                alert(result.message);
            }
        } catch (error) {
            alert('Có lỗi xảy ra khi tạo hóa đơn');
        }
    });

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('tbody tr').forEach(row => {
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const price = parseFloat(row.querySelector('.price').value) || 0;
            const subtotal = quantity * price;
            row.querySelector('.subtotal').textContent = formatMoney(subtotal);
            total += subtotal;
        });
        document.querySelector('.total').textContent = formatMoney(total);
    }

    function formatMoney(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
    }
});