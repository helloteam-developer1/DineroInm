<?php

namespace Database\Seeders;

use App\Models\Amortizacion;
use App\Models\Empresas;
use App\Models\Pagos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $empresas = [
            'ABC CAPITAL', 
            'ACTINVER',
            'ACCIVAL', 
            'AFIRME',
            'AKALA',
            'AMERICAN EXPRESS',
            'ASEA',
            'AUTOFIN', 
            'AZTECA' ,
            'BANAMEX',
            'BANCOMEXT',
            'BANOBRAS',
            'BBVA BANCOMER', 
            'BANJERCITO', 
            'BAJIO' ,
            'BANREGIO',
            'BANSI' ,
            'BANORTE',
            'BAMSA' ,
            'BMONEX', 
            'BARCLAYS',
            'BANCO FAMSA', 
            'BMULTIVA',
            'BANCOPPEL',
            'BBASE' ,
            'BANSEFI',
            'B&B',
            'BULLTICK CB', 
            'CREDIT SUISSE',
            'COMPARTAMOS', 
            'CONSUBANCO', 
            'CIBANCO',
            'CB ACTINVER', 
            'CBDEUTSCHE', 
            'CB INTERCAM', 
            'CI BOLSA',
            'CB JPMORGAN', 
            'CLS' ,
            'DEUTSCHE',
            'ESTRUCTURADORES',
            'EVERCORE',
            'FINAMEX', 
            'FINCOMUN', 
            'GBM', 
            'HSBC', 
            'HIPOTECARIA FEDERAL',
            'HDI SEGUROS',
            'IXE', 
            'INBURSA', 
            'INTERACCIONES', 
            'INVEX', 
            'ING', 
            'INTERBANCO', 
            'INDEVAL', 
            'JP MORGAN',
            'KUSPIT', 
            'LIBERTAD', 
            'MIFEL', 
            'MONEXCB', 
            'MASARI', 
            'MERRILL LYNCH', 
            'MAPFRE', 
            'NAFIN', 
            'OACTIN',
            'ORDER', 
            'PROFUTURO', 
            'REFORMA', 
            'SANTANDER', 
            'SCOTIABANK', 
            'SKANDIA', 
            'SU CASITA', 
            'STERLING', 
            'STP', 
            'SKANDIA', 
            'SEGMTY', 
            'SOFIEXPRESS', 
            'THE ROYAL BANK', 
            'TOKYO', 
            'TIBER', 
            'TELECOMM', 
            'UNICA', 
            'UNAGRA', 
            'VOLKSWAGEN', 
            'VALUE', 
            'VECTOR', 
            'VALMEX', 
            'WAL-MART', 
            'ZURICH', 
            'ZURICHVI'
        ];
        foreach($empresas as $e){
            Empresas::create(['name'=>$e]);
        }
        $carpeta = public_path('posts'); 
    
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
        
        //Registro super administradores 
        \App\Models\User::create([
            'nombre' => 'Super Administrador',
            'curp'=> 'HEYU020731MUWSHN04',
            'fecha_nacimiento'=> '2001-07-31',
            'empresa_trabajo'=> 'Uber México',
            'rama_empresa'=> 'Comercio al por mayor de carbón mineral y otros combustibles sólidos.',
            'antiguedad'=> 'de 6 a 12 meses',
            'banco_nomina'=> 'BANORTE',
            'email'=> 'helloteam.developer8@gmail.com',
            'password'=> '$2y$10$yLOQiOutBO0w9jQP0ZciW.zs1RsXhMBSlw2mnQbtp4blqNhuTF6uK',
            'telefono_contacto'=> '9897654567',
            'direccion'=> null,
            'ine_frente'=> '/posts/INE_FRENTE-developer-daniel-rivera.jpg',
            'ine_reverso'=> '/posts/INE_REVERSO-developer-daniel-rivera.jpg',
            'comp_dom'=> '/posts/COMP_COM-developer-daniel-rivera.jpg',
            'foto_cine'=> '/posts/FOTO_CON_INE-developer-daniel-rivera.jpg',
            'prestamo'=> '1464',
            'tiempo'=> '1',
            'trabajo'=> 'Uber',
            'ingreso'=> '$3,000.00',
            'nomina'=> 'si',
            'credito'=> 'no',
            'tarjeta_reg'=> null,
            'num_cliente'=> null,
            'openpay_id'=> null,
            'rol'=> 1,
            'remember_token'=> null,
            'created_at'=> '2023-10-12 20:33:39',
            'updated_at'=> '2023-10-12 20:33:39'
        ]);
        \App\Models\User::create([
            'nombre'=> 'Super Administrador 1',
            'curp'=> 'SETJ990923HDFGRN10',
            'fecha_nacimiento'=> '1999-09-23',
            'empresa_trabajo'=> 'Hello México',
            'rama_empresa'=> 'Comercio al por menor de alimentos y bebidas en tiendas de abarrotes, ultramarinos y misceláneas.',
            'antiguedad'=> 'de 3 a 5 años',
            'banco_nomina'=> 'SEGMTY',
            'email'=> 'developer@hellomexico.mx',
            'password'=> '$2y$10$e1JLhQfM85e2QkIUOnGGUeQzdk7hDQpmBQbdNC1B/bas3CH36PPpK',
            'telefono_contacto'=> '5558790283',
            'direccion'=> null,
            'ine_frente'=> null,
            'ine_reverso'=> null,
            'comp_dom'=> null,
            'foto_cine'=> null,
            'prestamo'=> '3000',
            'tiempo'=> '6',
            'trabajo'=> 'Developer Back-End',
            'ingreso'=> '$60,000.00',
            'nomina'=> 'si',
            'credito'=> 'si',
            'tarjeta_reg'=> null,
            'num_cliente'=> null,
            'openpay_id'=> null,
            'rol'=> 1,
            'remember_token'=> null,
            'created_at'=> '2023-09-19 21:16:08',
            'updated_at'=> '2023-10-10 19:11:43'
        ]);
        \App\Models\User::create([
            'nombre'=> 'Juan Carlos Segura Torres',
            'curp'=> 'SETJ990923HDFNGR10',
            'fecha_nacimiento'=> '1999-09-23',
            'empresa_trabajo'=> 'Hello México',
            'rama_empresa'=> 'Comercio al por mayor de materias primas agropecuarias y forestales.',
            'antiguedad'=> 'de 1 a 3 años',
            'banco_nomina'=> 'AZTECA',
            'email'=> 'helloteam.developer1@gmail.com',
            'password'=> '$2y$10$9fv02GZOHFKm1tmMLTxtJeEd19SEzo088IeTcCFzrXi0ZZNaHbXqW',
            'telefono_contacto'=> '5557510760',
            'direccion'=> null,
            'ine_frente'=> '/posts/INE_FRENTE-juan-carlos-segura-torres.png',
            'ine_reverso'=> '/posts/INE_REVERSO-juan-carlos-segura-torres.png',
            'comp_dom'=> '/posts/COMP_COM-juan-carlos-segura-torres.jpg',
            'foto_cine'=> '/posts/FOTO_CON_INE-juan-carlos-segura-torres.png',
            'prestamo'=> '3000',
            'tiempo'=> '3',
            'trabajo'=> 'developer Backend',
            'ingreso'=> '$7,000.00',
            'nomina'=> 'si',
            'credito'=> 'si',
            'tarjeta_reg'=> null,
            'num_cliente'=> null,
            'openpay_id'=> null,
            'rol'=> 0,
            'remember_token'=> null,
            'created_at'=> '2023-10-10 19:31:09',
            'updated_at'=> '2023-10-10 19:31:09'
        ]);
    }
}
