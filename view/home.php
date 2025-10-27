<main class="main home-main">
    <!-- Cabecera -->
    <div class="home-header">
        <h1>Panel de Control</h1>
    </div>

    <!-- Saludo / Información -->
    <div class="home-welcome">
        <h2>Hola, Kilder 👋</h2>
        <p>Hoy es: <span id="fecha"></span></p>
    </div>

    <!-- Tarjetas de resumen -->
    <div class="home-cards">
        <div class="home-card">
            <h3><i class="bi bi-people-fill"></i> Usuarios</h3>
            <p>Total de usuarios: <strong>35</strong></p>
            <div class="graph-wrapper">
                <div class="graph-label">
                    <span>Activos</span>
                    <span>25</span>
                </div>
                <div class="graph-bar" style="width:70%"></div>

                <div class="graph-label">
                    <span>Inactivos</span>
                    <span>10</span>
                </div>
                <div class="graph-bar" style="width:30%; background:#ef4444"></div>
            </div>
        </div>

        <div class="home-card">
            <h3><i class="bi bi-box-seam"></i> Productos</h3>
            <p>Total de productos: <strong>120</strong></p>
            <div class="graph-wrapper">
                <div class="graph-label">
                    <span>En stock</span>
                    <span>90</span>
                </div>
                <div class="graph-bar" style="width:75%"></div>

                <div class="graph-label">
                    <span>Agotados</span>
                    <span>30</span>
                </div>
                <div class="graph-bar" style="width:25%; background:#ef4444"></div>
            </div>
        </div>

        <div class="home-card">
            <h3><i class="bi bi-currency-dollar"></i> Ventas</h3>
            <p>Ventas este mes: <strong>45</strong></p>
            <div class="graph-wrapper">
                <div class="graph-label">
                    <span>Completadas</span>
                    <span>40</span>
                </div>
                <div class="graph-bar" style="width:88%"></div>

                <div class="graph-label">
                    <span>Canceladas</span>
                    <span>5</span>
                </div>
                <div class="graph-bar" style="width:12%; background:#ef4444"></div>
            </div>
        </div>

        <div class="home-card">
            <h3><i class="bi bi-person-badge-fill"></i> Clientes</h3>
            <p>Clientes activos: <strong>80</strong></p>
            <div class="graph-wrapper">
                <div class="graph-label">
                    <span>Nuevos</span>
                    <span>30</span>
                </div>
                <div class="graph-bar" style="width:38%"></div>

                <div class="graph-label">
                    <span>Frecuentes</span>
                    <span>50</span>
                </div>
                <div class="graph-bar" style="width:62%; background:#10b981"></div>
            </div>
        </div>
    </div>

    <!-- Accesos rápidos -->
    <h2 style="margin-bottom:1rem;">Accesos Rápidos</h2>
    <div class="quick-access">
        <div class="quick-card" onclick="location.href='<?= BASE_URL ?>users'">
            <i class="bi bi-people-fill"></i>
            <p>Usuarios</p>
        </div>
        <div class="quick-card" onclick="location.href='<?= BASE_URL ?>products'">
            <i class="bi bi-box-seam"></i>
            <p>Productos</p>
        </div>
        <div class="quick-card" onclick="location.href='<?= BASE_URL ?>clients'">
            <i class="bi bi-person-badge-fill"></i>
            <p>Clientes</p>
        </div>
        <div class="quick-card" onclick="location.href='<?= BASE_URL ?>sales'">
            <i class="bi bi-currency-dollar"></i>
            <p>Ventas</p>
        </div>
    </div>

    <script>
        document.getElementById('fecha').textContent = new Date().toLocaleDateString();
    </script>
</main>
</div>