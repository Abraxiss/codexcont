  <style>

    .form-container {
      max-width: 100%;
      padding: 1rem;
      margin: auto;
    }
    .form-box {
      background: white;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }
    .form-control::placeholder {
      text-align: right;
    }

    .input-group-text {
      min-width: 50px;
      font-weight: bold;
    }
    .bg-caja     { background-color: #8BC34A !important; color: white; }
    .bg-mercaderia { background-color: #EC268F !important; color: white; }
    .bg-bienes   { background-color: #FFEB3B !important; color: black; }
    .bg-pasivo   { background-color: #FF9800 !important; color: white; }
    .bg-capital  { background-color: #424242 !important; color: white; }
  </style>

<div class="container form-container mt-4">
  <div class="form-box">
    <h3 class="form-title">INVENTARIO INICIAL</h3>
    <form action="crud_inventario/create.php" method="GET">
      
      <div class="input-group mb-3">
        <span class="input-group-text bg-caja">CAJA</span>
        <input maxlength="1" oninput="this.value = this.value.slice(0, 1)" type="number" placeholder="0" class="form-control text-end fw-bold fs-5" name="caja" aria-label="Caja" required>
        <span class="input-group-text">.00</span>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text bg-mercaderia">MERCADERIA</span>
        <input maxlength="1" oninput="this.value = this.value.slice(0, 1)" type="number" placeholder="0" class="form-control text-end fw-bold fs-5" name="mercaderia" aria-label="Mercadería" required>
        <span class="input-group-text">.00</span>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text bg-bienes">BIENES</span>
        <input maxlength="1" oninput="this.value = this.value.slice(0, 1)" type="number" placeholder="0" class="form-control text-end fw-bold fs-5" name="bienes" aria-label="Bienes" required>
        <span class="input-group-text">.00</span>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text bg-pasivo">PASIVO</span>
        <input maxlength="1" oninput="this.value = this.value.slice(0, 1)" type="number" placeholder="0" class="form-control text-end fw-bold fs-5" name="pasivo" aria-label="Pasivo" required>
        <span class="input-group-text">.00</span>
      </div>

      <div class="input-group mb-4">
        <span class="input-group-text bg-capital">CAPITAL</span>
        <input maxlength="1" oninput="this.value = this.value.slice(0, 1)" type="number" placeholder="0" class="form-control text-end fw-bold fs-5" name="capital" aria-label="Capital" required>
        <span class="input-group-text">.00</span>
      </div>

      <button type="submit" placeholder="0" class="btn btn-primary w-100">REGISTRAR</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
