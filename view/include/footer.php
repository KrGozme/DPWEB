</body>

<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const links = document.querySelectorAll('.sidebar a');

    links.forEach(l => l.addEventListener('click', () => localStorage.setItem('activo', l.href)));

    const activo = localStorage.getItem('activo');
    if (activo) links.forEach(l => l.classList.toggle('active', l.href === activo));
</script>

</html>