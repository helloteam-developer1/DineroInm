<div class="card-container">
    <style>
        .card-container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
        .tarjeta {
            width: 300px;
            background-color: #4A9D22;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            color: white;
            font-family: Arial, sans-serif;
        }
        
        .banda-magnetica {
            height: 30px;
            background: linear-gradient(to right, #444444 0%, #444444 100%);
            margin-bottom: 20px;
        }

        .numero-tarjeta p {
            font-size: 18px;
            letter-spacing: 4px;
            font-weight: 600;
        }

        .info-tarjeta {
            display: flex;
            justify-content: space-between;
        }
        @media (min-width:560px){
            .tarjeta {
                width: 400px;
            }
            .numero-tarjeta p{
                font-size: 24px;
            }
        }
        
    </style>
    @isset($type)
    <div class="tarjeta">
        <div class="banda-magnetica"></div>
        <div class="numero-tarjeta">
            <p class="numero-tarjeta"> {{$card_number}}</p>
        </div>
        <div class="info-tarjeta">
            <div class="nombre">
                <label>Titular</label>
                <br />
                <strong>{{$holder_name}}</strong>
                <small>{{$bank_name}}</small>
            </div>
            <div class="fecha-expiracion">
                <label>Fecha de Expiración</label>
                <strong>{{$expiration_month}},{{$expiration_year}}</strong>
                <br />
                <strong>{{$type}}</strong>
            </div>
        </div>
    </div>  
    @else
        <p>Sin Conexión, 
            @isset($error)
                {{$error}}        
            @endisset
        </p>
    @endisset
        
    
    
    
    
   
</div>