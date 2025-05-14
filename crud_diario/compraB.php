 <style type="text/css">
   
    .bodyform {
      
      color: black;
      font-family: sans-serif;
      text-align: center;
    }

    .contenedor {
      border: 2px solid #E6E7E8;
      border-radius: 10px;
      padding: 10px;
      margin: 10px auto;
      width: 300px;
      background-color: white;
    }


    .seccion {
      margin-bottom: 5px;
    }

    .opciones {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 10px;
    }

    .opcion {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
    }

    .opcion input[type="radio"] {
      display: none;
    }

    .opcion img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      filter: grayscale(100%);
      transition: filter 0.3s ease;
    }

    .opcion input[type="radio"]:checked + img {
      filter: grayscale(0%);
    }

    .opcion span {
      margin-top: 3px;
      font-size: 10px;
      color: black;
    }

    .cantidad-btns {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .cantidad label {
      background: #888;
      color: white;
      padding: 5px 10px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .cantidad input[type="radio"] {
      display: none;
    }

    .cantidad input[type="radio"]:checked + label {
      background: #007bff;
    }

    .btn-registrar {
      background: #007bff;
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 15px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 20px;
    }

    h5 {
  font-size: 12px; /* o más pequeño si deseas */
}

    h3 {
  font-size: 16px; /* o más pequeño si deseas */
}
    .tituloop {
  margin-top: 5px; 
}


   
 </style>

  

<div class="bodyform">
  <form action="crear.php" method="POST" >

  <img class="tituloop" src="img/nregistro/B.png" width="50" alt="logo">
  <h3>COMPRA DE BIENES</h3>
 
  <div class="contenedor">
    <!-- PRODUCTO -->


    <!-- CONDICIÓN -->
    <div class="seccion">
      <h5>CONDICIÓN DE PAGO</h5>
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="condicion" value="contado">
          <img src="img/nregistro/S.png" alt="Contado">
          <span>CONTADO</span>
        </label>
        <label class="opcion">
          <input type="radio" name="condicion" value="credito">
          <img src="img/nregistro/D.png" alt="Crédito">
          <span>CREDITO</span>
        </label>
      </div>
    </div>

    <!-- CANTIDAD -->
    <div class="seccion cantidad">
      <h5>CANTIDAD COMPRADA</h5>
      <div class="cantidad-btns">
        <input type="radio" name="cantidad" id="cant1" value="1">
        <label for="cant1">1</label>

        <input type="radio" name="cantidad" id="cant2" value="2">
        <label for="cant2">2</label>

        <input type="radio" name="cantidad" id="cant3" value="3">
        <label for="cant3">3</label>
      </div>
    </div>
</div>
    <!-- BOTÓN -->

     <button type="submit" class="btn btn-primary  " id="guardar" name="guardar">REGISTRAR</button>

  </form>

  </div>

