<style>
    .nav-bar {
        position: fixed;
        bottom: 0;
        width: 100%;
        display: flex;

            background-color: #121212;

        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    }

    .nav-btn {
        flex: 1;
        text-align: center;
        padding: 0.7rem 0;
        color: #2196F3;
        text-decoration: none;
        font-size: 0.85rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .nav-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.2rem;
    }

    .nav-btn.active {
        background-color: #2196F3;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .nav-btn.active i {
        color: #fff;
    }

    .nav-btn:not(.active) i {
        color: #2196F3;
    }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<nav class="nav-bar">
    <a href="1balance.php" class="nav-btn"><i class="fas fa-balance-scale"></i><span>Balance</span></a>
    <a href="2resultados.php" class="nav-btn"><i class="fas fa-cash-register"></i><span>Resultado</span></a>
    <a href="3flujo.php" class="nav-btn"><i class="fas fa-chart-line"></i><span>Flujo</span></a>
    <a href="4patrimonio.php" class="nav-btn"><i class="fas fa-file-invoice"></i><span>Patrimonio</span></a>
    <a href="5ratios.php" class="nav-btn"><i class="fa-solid fa-newspaper"></i><span>Ratios</span></a>    
</nav>

<script>
    // Detectar automáticamente qué botón está activo
    document.querySelectorAll('.nav-btn').forEach(btn => {
        const href = btn.getAttribute('href');
        if (window.location.href.includes(href)) {
            btn.classList.add('active');
        }
    });
</script>
