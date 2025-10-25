</body>

<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const ruta = location.pathname.replace(/\/$/, "");
    document.querySelectorAll('.sidebar a').forEach(a => {
        a.classList.toggle('active', a.pathname.replace(/\/$/, "") === ruta);
        a.onclick = () => {
            document.querySelectorAll('.sidebar a').forEach(l => l.classList.remove('active'));
            a.classList.add('active');
        };
    });
</script>

</html>