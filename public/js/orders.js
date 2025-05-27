document.querySelectorAll('.generate-qr').forEach(button => {
    button.addEventListener('click', function () {
        const data = JSON.parse(this.dataset.order);
        const qrContainer = this.closest('td').querySelector('.qr-output');
        const downloadBtn = this.closest('td').querySelector('.download-qr');

        qrContainer.innerHTML = '';
        const div = document.createElement('div');
        qrContainer.appendChild(div);

        const qr = new QRCode(div, {
            text: JSON.stringify(data),
            width: 200,
            height: 200,
        });

        setTimeout(() => {
            const canvas = div.querySelector('canvas');
            const imgData = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            downloadBtn.href = imgData;
            downloadBtn.style.display = 'inline-block';
        }, 500);
    });
});

document.querySelectorAll('.cancel-order').forEach(button => {
    button.addEventListener('click', function () {
        const orderId = this.dataset.id;

        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to cancel this order.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/orders/${orderId}/cancel`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Cancelled!', 'Your order has been cancelled.', 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Failed to cancel order.', 'error');
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire('Oops!', 'Something went wrong.', 'error');
                });
            }
        });
    });
});
