
let orderPlaced = false;

document.getElementById('closeModalBtn').addEventListener('click', function () {
    const modal = document.getElementById('checkoutModal');
    modal.style.animation = 'fadeOut 0.3s ease-out';
    setTimeout(() => {
        modal.style.display = 'none';
        modal.style.animation = '';
        if (orderPlaced) {
            location.reload();
        }
    }, 300);
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('cartForm');

    // Remove confirmation
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('data-url');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to remove this book from your cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
    // Close modal outside click
    document.getElementById('checkoutModal').addEventListener('click', function (e) {
        const modal = document.getElementById('checkoutModal');
        const content = document.querySelector('.modal-content');

        if (!content.contains(e.target)) {
            modal.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                modal.style.display = 'none';
                modal.style.animation = '';
                if (orderPlaced) {
                    location.reload();
                }
            }, 300);
        }
    });

    // Open modal
    document.getElementById('checkoutBtn').addEventListener('click', function () {
        const checkboxes = form.querySelectorAll('input[name="selected_books[]"]:checked');
        if (checkboxes.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No books selected',
                text: 'Please select at least one book before checking out.',
            });
            return;
        }

        const books = Array.from(checkboxes).map(cb => {
            return {
                title: cb.dataset.title,
                image: cb.dataset.image
            };
        });

        const htmlList = `
                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px;">
                            ${books.map(book => `
                                        <div style="width: 100px; text-align: center;">
                                            <img src="${book.image}" alt="${book.title}" style="height: 80px; width: 60px; object-fit: cover; border-radius: 4px;"><br>
                                            <span style="font-size: 12px;">${book.title}</span>
                                        </div>
                                    `).join('')}
                        </div>
                    `;

        document.getElementById('bookList').innerHTML = htmlList;
        document.getElementById('qrCodeContainer').innerHTML = '';
        document.getElementById('downloadQrBtn').style.display = 'none';
        document.getElementById('loading').style.display = 'none';
        document.getElementById('checkoutModal').style.display = 'flex';
    });


    // Place order via AJAX
    const placeOrderBtn = document.getElementById('placeOrderBtn');
    placeOrderBtn.addEventListener('click', function () {
        const checkboxes = form.querySelectorAll('input[name="selected_books[]"]:checked');
        const bookIds = Array.from(checkboxes).map(cb => cb.value);

        if (bookIds.length === 0) return;

        placeOrderBtn.disabled = true;
        placeOrderBtn.textContent = 'Placing order...';

        document.getElementById('loading').style.display = 'block';

        fetch(cartProcessUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                selected_books: bookIds
            })
        })
            .then(res => res.json())
            .then(data => {
                document.getElementById('loading').style.display = 'none';

                const qrData = JSON.stringify({
                    order_code: data.order_code,
                    book_ids: data.book_ids
                });

                const qrDiv = document.createElement("div");
                qrDiv.id = "qr";
                document.getElementById('qrCodeContainer').innerHTML = '';
                document.getElementById('qrCodeContainer').appendChild(qrDiv);

                const qrCode = new QRCode(qrDiv, {
                    text: qrData,
                    width: 200,
                    height: 200
                });

                setTimeout(() => {
                    const canvas = qrDiv.querySelector('canvas');
                    const image = canvas.toDataURL("image/png").replace("image/png",
                        "image/octet-stream");
                    const downloadBtn = document.getElementById('downloadQrBtn');
                    downloadBtn.href = image;
                    downloadBtn.style.display = 'inline-block';

                    placeOrderBtn.textContent = 'Successfully ordered above book/s';
                    placeOrderBtn.classList.remove('btn-success');
                    placeOrderBtn.classList.add('btn-secondary');
                    placeOrderBtn.disabled = true;
                }, 500);

                orderPlaced = true;
            })
            .catch(error => {
                document.getElementById('loading').style.display = 'none';
                placeOrderBtn.disabled = false;
                placeOrderBtn.textContent = 'Place Order';
                Swal.fire('Oops', 'Something went wrong.', 'error');
            });
    });

});
