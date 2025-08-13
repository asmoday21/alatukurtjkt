<div>
    <!-- Fallback jika komponen WireUI gagal publish -->
    <script>
        window.addEventListener('notification', event => {
            alert(event.detail.title + "\n" + event.detail.description);
        });
    </script>
</div>
